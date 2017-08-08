<header>
	<h1>Billet simple pour l'Alaska</h1>
	<h2>Jean Forteroche</h2>
</header>

<?php

if (isset($_SESSION['mdp']) AND $_SESSION['mdp'] == "test")
{
	echo '<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="chapitres.php">Les chapitres</a></li>
			<li><a href="auteur.php">A propos</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="administration.php">Administration</a></li>
			<li><a href="logout.php">Déconnexion</a></li>
		</ul>
	</nav>';
}
else
{
	echo '<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="chapitres.php">Les chapitres</a></li>
			<li><a href="auteur.php">A propos</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</nav>';
}

?>

