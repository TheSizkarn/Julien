<?php

	include("connect.php");

	$id_commentaire = $_GET['id'];
	$req = $bdd->exec('UPDATE commentaires SET signalement = 1 WHERE id = '.$id_commentaire.'');

	if ($req == 0)
	{
		echo "Une erreur s'est produite";
	}
	else
	{
		echo "Le commentaire a été signalé avec succès";
	}

?>