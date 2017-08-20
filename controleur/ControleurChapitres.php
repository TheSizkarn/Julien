<?php

require_once 'framework/Controleur.php';
require_once 'modele/chapitre.php';

class ControleurChapitres extends Controleur
{
    private $billet;

    public function __construct()
    {
        $this->billet = new chapitre();
    }

    // Affiche tous les chapitres ajoutés au blog
    public function index()
    {
        $billets = $this->billet->getBillets();
        $this->genererVue(array('billets' => $billets));
    }
}