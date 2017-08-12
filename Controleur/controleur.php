<?php

require 'modele/modele.php';

// Affiche la le dernier chapite publié sur le blog
function accueil()
{
    $lastBillet = getLastBillet();
    require 'vue/vueAccueil.php';
}

// Affiche les détails sur un chapitre
function billet($idBillet)
{
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'vue/vueChapitre.php';
}

// Affiche une erreur
function erreur($msgErreur)
{
    require 'vue/vueErreur.php';
}