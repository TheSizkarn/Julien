<?php
session_start();
include("connect.php");
include("securite.php");

$id = Securite::bdd($_GET['id']);
$auteur = Securite::bdd($_POST['auteur']);
$commentaire = Securite::bdd($_POST['commentaire']);

$_SESSION['error_auteur'] = 0;
$_SESSION['error_commentaire'] = 0;

if (isset($id) && is_numeric($id) && $id!="") // On vérifie si l'id est indiqué, qu'il n'est pas vide et que c'est bien un nombre.
	{
		if (isset($auteur) && !empty($auteur))
		{
			if (isset($commentaire) && !empty($commentaire))
			{
				$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(:id_billet, :auteur, :commentaire, NOW())');
				$req->execute(array(
					':id_billet' => $id,
					':auteur' => $auteur,
					':commentaire' => $commentaire
					));
			}
			else
			{
				$_SESSION['error_commentaire'] = 1;
				header('location:chapitre.php?id='. $id);
			}
		}
		else 
		{
				$_SESSION['error_auteur'] = 1;
				header('location:chapitre.php?id='. $id);
		}
	}
header('location:chapitre.php?id='. $id);
?>