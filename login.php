<?php
session_start();
if ($_POST['mdp']) {
	$_SESSION['mdp'] = $_POST['mdp'];
}

if (isset($_SESSION['mdp']) AND $_SESSION['mdp'] == "test")
{
	header('Location: administration.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
include("connect.php"); // On se connecte à la BDD.
include("menu.php");
?>

	<form action="login.php" method="post">
		<input type="password" name="mdp" />
		<input type="submit" value="Valider" />
	</form>

<?php

if (isset($_POST['mdp']) AND $_POST['mdp'] != "test") 
{
	echo "<p>Mot de passe incorrect.</p>";
}

?>

<footer>
	<p>Copyright Jean Forteroche - Tous droits réservés</p>
</footer>

</body>
</html>