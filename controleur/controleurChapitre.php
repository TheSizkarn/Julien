<?php

require_once 'framework/Controleur.php';
require_once 'modele/commentaire.php';
require_once 'modele/chapitre.php';

class ControleurChapitre extends Controleur
{
    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new chapitre();
        $this->commentaire = new commentaire();
    }

    // Affiche les détails sur un chapitre
    public function index()
    {
        $idBillet = $this->requete->getParametre("id");

        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);

        $this->genererVue(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un chapitre
    public function commenter()
    {
        $idBillet = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");

        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);

        // Exécution de l'action par défaut pour actualiser la liste des billets
        $this->executerAction("index");
    }

    // Signaler un commentaire
    public function signaler()
    {
        $idBillet = $this->requete->getParametre("idBillet");
        $idCommentaire = $this->requete->getParametre("idCommentaire");
        $this->commentaire->signalement($idCommentaire);

        $this->rediriger("chapitre", "index/" .$idBillet);

    }
}