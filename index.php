<?php

require 'controleur/controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'chapitre') {
            if (isset($_GET['id'])) {
                $idBillet = intval($_GET['id']);
                if ($idBillet != 0)
                    billet($idBillet);
                else
                    throw new Exception("Identifiant du chapitre non valide");
            }
            else
                throw new Exception("Identifiant du chapitre non défini");
        }
        else
            throw new Exception("Action non valide");
    }
    else {
        accueil(); // action par défaut
    }
}
catch (Exception $e) {
    erreur($e->getMessage());

}
