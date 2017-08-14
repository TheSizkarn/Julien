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

    // Affiche tous les chapitres ajoutés au blog
    public function chapitres()
    {
        $billets = $this->billet->getBillets();
        $vue = new vue("Chapitres");
        $vue->generer(array('billets' => $billets));
    }
}