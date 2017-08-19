<?php

require_once 'modele/chapitre.php';
require_once 'modele/commentaire.php';
require_once 'vue/vue.php';

class controleurChapitre
{
    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new chapitre();
        $this->commentaire = new commentaire();
    }

    // Affiche les détails sur un chapitre
    public function billet($idBillet)
    {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new vue("Chapitre");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un chapitre
    public function commenter($auteur, $contenu, $idBillet)
    {
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        $this->billet($idBillet);
    }

    public function signaler($idCommentaire, $idBillet)
    {
        $this->commentaire->signalement($idCommentaire);
        $this->billet($idBillet);

    }
}