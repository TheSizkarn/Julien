<?php
session_start();
include("connect.php"); // On se connecte à la BDD.
include("menu.php");

if (isset($_SESSION['mdp'])) 
{
	include("edit.php");
}
else {
	echo "<p>Erreur</p>";
}

?>