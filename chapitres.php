<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog de Jean Forteroche - Les chapitres</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
include("connect.php"); // On se connecte à la BDD.
include("menu.php");
include("securite.php");
?>

<div class="container">
	<section>

		<h2>Tous les chapitres</h2>

			<?php
			$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM chapitres ORDER BY date_creation');

			while ($donnees = $req->fetch())
			{
			?>
				<a href="chapitre.php?id=<?php echo $donnees['id'];?>" class="chapitresLien">
					<div class="all_chapters">
						<h3>
						<?php echo htmlentities($donnees['titre']);?>
						<em class="date_creation">Ajouté le <?php echo $donnees['date_creation_fr']; ?></em>
						</h3>

						<p>
						<?php
						echo substr(htmlentities($donnees['contenu']),0, 600);?>...
						<br />
						<em>Lire la suite</em>
						</p>
					</div>
				</a>
			<?php
			}
			$req->closeCursor();
			?>

	</section>
</div>

<footer>
	<p>Copyright Jean Forteroche - Tous droits réservés</p>
</footer>


</body>
</html>