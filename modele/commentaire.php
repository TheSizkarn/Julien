<?php

require_once 'framework/modele.php';

class commentaire extends modele
{
    // Renvoie la liste des commentaires associés à un chapitre qui ne sont pas signalés
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM commentaires WHERE id_billet =? AND signalement = 0 ORDER BY date_commentaire DESC';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Renvoie la liste des commentaires signalés
    public function getCommentairesSignale()
    {
        $sql = 'SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM commentaires WHERE signalement = 1';
        $commentairesSignale = $this->executerRequete($sql);
        return $commentairesSignale;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT INTO commentaires(date_commentaire, auteur, commentaire, id_billet)' . ' values(NOW(), ?, ?, ?)';
        $this->executerRequete($sql, array($auteur, $contenu, $idBillet));
    }

    // Supprime un commentaire
    public function supprimer($idCommentaire)
    {
        $sql = 'DELETE FROM commentaires WHERE id=?';
        $this->executerRequete($sql, array($idCommentaire));
    }

    // Signaler un commentaire dans la base
    public function signalement($idCommentaire)
    {
        $sql = 'UPDATE commentaires SET signalement = 1 WHERE id =?';
        $this->executerRequete($sql, array($idCommentaire));
    }

    // Accepter un commentaire signalé
    public function accepter($idCommentaire)
    {
        $sql = 'UPDATE commentaires SET signalement = 0 WHERE id=?';
        $this->executerRequete($sql, array($idCommentaire));

    }

    // Renvoie le nombre de commentaire
    public function getNombreCommentaires()
    {
        $sql = 'SELECT count(*) as nbCommentaires FROM commentaires';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['nbCommentaires'];
    }
}