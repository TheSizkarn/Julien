<?php

require_once 'framework/Controleur.php';
require_once 'ControleurSecurise.php';
require_once 'modele/chapitre.php';
require_once 'modele/commentaire.php';
require_once 'modele/utilisateur.php';

class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;
    private $user;

    public function __construct()
    {
        $this->billet = new chapitre();
        $this->commentaire = new commentaire();
        $this->user = new utilisateur();
    }

    public function index()
    {
        $nbBillets = $this->billet->getNombreBillet();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $billets = $this->billet->getBillets();
        $commentairesSignale = $this->commentaire->getCommentairesSignale();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires, 'login' => $login, 'billets' => $billets, 'commentairesSignale' => $commentairesSignale));
    }

    public function accepter()
    {
        $idCommentaire = $this->requete->getParametre('id');
        $this->commentaire->accepter($idCommentaire);
        $this->executerAction("index");
    }

    public function supprimerCom()
    {
        $idCommentaire = $this->requete->getParametre('id');
        $this->commentaire->supprimer($idCommentaire);
        $this->executerAction("index");
    }

    public function ajouter()
    {
        $titre = $this->requete->getParametre('titre');
        $contenu = $this->requete->getParametre('contenu');
        $this->billet->addBillet($titre, $contenu);
        $this->executerAction("index");
    }

    public function modifierChapitre()
    {
        $idBillet = $this->requete->getParametre("id");
        $billet = $this->billet->getBillet($idBillet);
        $nbBillets = $this->billet->getNombreBillet();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $billets = $this->billet->getBillets();
        $commentairesSignale = $this->commentaire->getCommentairesSignale();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('billet' => $billet, 'nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires, 'login' => $login, 'billets' => $billets, 'commentairesSignale' => $commentairesSignale), 'index');
    }

    public function modifier()
    {
        $idBillet = $this->requete->getParametre("idBillet");
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");
        $this->billet->modifBillet($titre, $contenu, $idBillet);
        $this->rediriger("admin", "index");
    }

    public function supprimerChapitre()
    {
        $idBillet = $this->requete->getParametre('id');
        $this->billet->deleteBillet($idBillet);

        $this->executerAction("index");
    }

    public function modifierPassword()
    {
        $passwordModifier = $this->requete->getParametre('passwordModifier');
        $confirmPasswordModifer = $this->requete->getParametre('confirmPasswordModifier');
        if (empty($passwordModifier) || empty($confirmPasswordModifer))
        {

        }
        elseif ($passwordModifier == $confirmPasswordModifer)
        {
            $hash = password_hash($passwordModifier,PASSWORD_BCRYPT);
            $this->user->modifPassword($hash);
            $this->rediriger("admin", "index");
        }

    }
}