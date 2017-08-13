<?php

require_once 'modele/modele.php';

class chapitre extends modele
{
    // Renvoie le dernier chapitre publié sur le blog
    public function getLastBillet()
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM chapitres ORDER BY date_creation DESC LIMIT 1';
        $lastBillet = $this->executerRequete($sql);
        return $lastBillet;
    }

    // Renvoie les informations sur un chapitre demandé
    public function getBillet($idBillet)
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM chapitres WHERE id=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() == 1)
            return $billet->fetch();
        else
            throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idBillet'");
    }
}