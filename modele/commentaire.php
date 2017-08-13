<?php

require_once 'modele/modele.php';

class commentaire extends modele
{
    // Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM commentaires WHERE id_billet =? AND signalement = 0 ORDER BY date_commentaire';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }
}