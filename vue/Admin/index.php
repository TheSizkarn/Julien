<?php $this->titre = "Blog de Jean Forteroche - Administration"; ?>

<h2>Administration</h2>

Bienvenue, <?= htmlspecialchars($login) ?> !
Ce blog comporte <?= htmlspecialchars($nbBillets) ?> chapitre(s) et <?= htmlspecialchars($nbCommentaires) ?> commentaire(s).

<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>