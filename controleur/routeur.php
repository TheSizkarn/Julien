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
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant du chapitre non valide");
                }
                elseif ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }
                elseif ($_GET['action'] == 'chapitres') {
                    $this->ctrlAccueil->chapitres();
                }
                elseif ($_GET['action'] == 'signaler') {
                    $idBillet = $this->getParametre($_GET, 'id_billet');
                    $idCommentaire = $this->getParametre($_GET, 'id_commentaire');
                    $this->ctrlBillet->signaler($idCommentaire, $idBillet);
                }
                else
                    throw new Exception("Action non valide");
            }
            else {
                $this->ctrlAccueil->accueil();
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

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}