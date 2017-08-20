<?php

require_once 'framework/modele.php';

class commentaire extends modele
{
    // Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM commentaires WHERE id_billet =? AND signalement = 0 ORDER BY date_commentaire DESC';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT INTO commentaires(date_commentaire, auteur, commentaire, id_billet)' . ' values(NOW(), ?, ?, ?)';
        $this->executerRequete($sql, array($auteur, $contenu, $idBillet));
    }

    // Signaler un commentaire dans la base
    public function signalement($idBillet)
    {
        $sql = 'UPDATE commentaires SET signalement = 1 WHERE id =?';
        $this->executerRequete($sql, array($idBillet));
    }
}