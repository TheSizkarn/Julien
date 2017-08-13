<?php

require_once 'modele/chapitre.php';
require_once 'vue/vue.php';

class controleurAccueil
{
    private $billet;

    public function __construct()
    {
        $this->billet = new chapitre();
    }

    // Affiche le dernier chapitre ajouté au blog
    public function accueil()
    {
        $lastBillet = $this->billet->getLastBillet();
        $vue = new vue("Accueil");
        $vue->generer(array('lastBillet' => $lastBillet));
    }
}