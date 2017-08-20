<?php

require_once 'Controleur.php';
require_once 'requete.php';
require_once 'vue.php';

class routeur
{
    // Route une requête entrainre : exécute l'action associée
    public function routerRequete()
    {
        try
        {
            // Fusion des paramètres GET et POST de la requête
            $requete = new requete(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);

            $controleur->executerAction($action);
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerControleur(requete $requete)
    {
        $controleur = "Accueil"; // Contrôleur par défaut
        if ($requete->existeParametre('controleur')) {
            $controleur = $requete->getParametre('controleur');
            $controleur = ucfirst(strtolower($controleur));
        }
        // Création du nom du fichier du contrôleur
        $classeControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur/" . $classeControleur . ".php";
        if (file_exists($fichierControleur)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierControleur);
            $controleur = new $classeControleur();
            $controleur->setRequete($requete);
            return $controleur;
        }
        else
            throw new Exception("Fichier '$fichierControleur' introuvable");
    }

    // Détermine l'action à exécuter en fonction de la requête reçue
    private function creerAction(requete $requete)
    {
        $action = "index"; // Action par défaut
        if ($requete->existeParametre('action')) {
            $action = $requete->getParametre('action');
        }
        return $action;
    }

    // Gère une erreur d'exécution (exception)
    private function gererErreur(Exception $exception)
    {
        $vue = new vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }
}