<?php

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurChapitre.php';
require_once 'vue/vue.php';

class routeur
{
    private $ctrlAccueil;
    private $ctrlBillet;

    public function __construct()
    {
        $this->ctrlAccueil = new controleurAccueil();
        $this->ctrlBillet = new controleurChapitre();
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'chapitre') {
                    if (isset($_GET['id'])) {
                        $idBillet = intval($_GET['id']);
                        if ($idBillet != 0)
                            $this->ctrlBillet->billet($idBillet);
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
                $this->ctrlAccueil->accueil(); // action par défaut
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}