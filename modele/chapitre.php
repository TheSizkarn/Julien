<?php

require_once 'framework/modele.php';

class chapitre extends modele
{
    // Renvoie le dernier chapitre publié sur le blog
    public function getLastBillet()
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM chapitres ORDER BY date_creation DESC LIMIT 1';
        $lastBillet = $this->executerRequete($sql);
        return $lastBillet;
    }

    // Renvoie la liste de tous les chapitres publiés sur le blog
    public function getBillets()
    {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM chapitres ORDER BY date_creation';
        $billets = $this->executerRequete($sql);
        return $billets;
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

    // Renvoie le nombre total de chapitres
    public function getNombreBillet()
    {
        $sql = 'SELECT count(*) as nbBillets FROM chapitres';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch(); // Le résultat comporte toujours 1 ligne
        return $ligne['nbBillets'];
    }
}