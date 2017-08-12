<?php

// Renvoie la liste de tous les chapitres, triés par date de création décroissant
function getLastBillet()
{
    $bdd = getBdd();
    $lastBillet = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM chapitres ORDER BY date_creation DESC LIMIT 1');
    return $lastBillet;
}

function getBillet($idBillet)
{
    $bdd = getBdd();
    $billet = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM chapitres WHERE id=?');
    $billet->execute(array($idBillet));
    if ($billet->rowCount() == 1)
        return $billet->fetch();
    else
        throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idBillet'");
}

function getCommentaires($idBillet)
{
    $bdd = getBdd();
    $commentaires = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM commentaires WHERE id_billet =? AND signalement = 0 ORDER BY date_commentaire');
    $commentaires->execute(array($idBillet));
    return $commentaires;
}

function getBdd()
{
    $bdd = new PDO('mysql:host=localhost;dbname=db685271671;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $bdd;
}