<?php
session_start();

$id=$_SESSION['id'];

if ($_SESSION['loginOK'] == true) {

include('connexion_SQL.php');

mysql_query("DELETE FROM trajets WHERE ID='$id'");

mysql_query("DELETE FROM conducteurs WHERE ID='$id'");

mysql_close();

$_SESSION = array();

session_destroy();

include('index2.php');
}


	