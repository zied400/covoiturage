<?php

// J'ai trouvé un pb avec ce compteur : il se remet à  0 aprés 1000 visites 

/*
* Si le fichier où l'on stock,
* les données n'existe pas encore
* on le crée.
*/
$fichier = '.htcompteur';
if( !file_exists($fichier) ) {
$fp = fopen($fichier, "w");
fwrite($fp, serialize(array()));
fclose($fp);
}

/*
* Définition de variables
* nécessaire au compteur :
* - deux termes constants,
* - l'ip du visiteur,
* - la date et l'heure.
*/
$argument_visites = 'visites';
$argument_requêtes = 'requêtes';
$ip = $_SERVER['REMOTE_ADDR'];
$time = date('YmdGis');

/*
* Récupération des données du
* compteur précédemment stockées.
*/
$lignes = file($fichier);
$donnees = unserialize($lignes[0]);

/*
* Pour chaque clés du tableau de données
* qui ne soit pas attribuée aux visite et aux requêtes
* si la valeur correspond à une date antérieur
* au même jour, on supprime l'ip du visiteur.
*/
foreach( $donnees as $cle => $valeur )
{
if( substr($valeur, 0, 8) != substr($time, 0, 8) &&
$cle != $argument_visites &&
$cle != $argument_requêtes ) {
unset($donnees[$cle]);
}
}
/*
* On incrémente ( ajoute +1 ) la valeur
* du nombre de requêtes.
* Si l'ip n'est pas encore enregistrée,
* on incrémente la valeur du nombre de visites
* et on ajoute l'ip dans le tableau accompagné
* de la date et de l'heure de l'exécution.
*/
$donnees[$argument_requêtes]++;

/*if( !$donnees[$ip] ) {
$donnees[$argument_visites]++;
$donnees[$ip] = $time;
}*/

/*
* On effectue un petit report de variable
* pour une utilisation ultérieur plus aisée.
*/
$nb_visiteurs = $donnees[$argument_visites];
$nb_aujourdhui = count($donnees)-2;
$nb_requêtes = $donnees[$argument_requêtes];

/*
* On stock le tableau dans le fichier de données
* en écrasant sa valeur précédente.
*/
$fp = fopen($fichier,"w");
fwrite($fp, serialize($donnees));
fclose($fp);

/*
* On affiche les résultats du compteur.
*/
$nb_visiteurs=$nb_visiteurs+"1000";
echo $nb_visiteurs." visiteurs dont ".$nb_aujourdhui." aujourd'hui.";
?>
