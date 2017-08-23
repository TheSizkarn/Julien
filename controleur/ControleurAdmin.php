<?php

require_once 'ControleurSecurise.php';
require_once 'modele/chapitre.php';
require_once 'modele/commentaire.php';

class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new chapitre();
        $this->commentaire = new commentaire();
    }

    public function index()
    {
        $nbBillets = $this->billet->getNombreBillet();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires, 'login' => $login));
    }
}