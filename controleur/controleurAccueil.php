<?php

require_once 'framework/Controleur.php';
require_once 'modele/chapitre.php';

class ControleurAccueil extends Controleur
{
    private $billet;

    public function __construct()
    {
        $this->billet = new chapitre();
    }

    // Affiche le dernier chapitre ajouté au blog
    public function index()
    {
        $lastBillet = $this->billet->getLastBillet();
        $this->genererVue(array('lastBillet' => $lastBillet));
    }

    // Affiche tous les chapitres ajoutés au blog
    public function chapitres()
    {
        $billets = $this->billet->getBillets();
        $this->genererVue(array('billets' => $billets));
    }
}