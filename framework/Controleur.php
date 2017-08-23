<?php

require_once 'configuration.php';
require_once 'requete.php';
require_once 'vue.php';

abstract class Controleur
{
    // Action à réaliser
    private $action;

    // Requête entrante
    protected $requete;

    // Définit la reuqête entrante
    public function setRequete(requete $requete)
    {
        $this->requete = $requete;
    }

    // Exécute l'action à réaliser
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else
        {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur ");
        }
    }

    // Méthode abstraite correspondant à l'action par défaut
    // Oblige les classes dérivées à implémenter cette action par défaut
    public abstract function index();

    // Génère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array(), $action = null)
    {
        // Utilisation de l'action actuelle par défaut
        $actionVue = $this->action;
        if ($action != null) {
            // Utilisation de l'action passée en paramètre
            $actionVue = $action;
        }
        // Utilisation du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleurVue = str_replace("Controleur", "", $classeControleur);
        // Instanciation et génération de la vue
        $vue = new Vue($actionVue, $controleurVue);
        $vue->generer($donneesVue);
    }

    // Effectue une redirection vers un contrôleur et une action spécifique
    protected function rediriger($controleur, $action = null)
    {
        $racineWeb = configuration::get("racineWeb", "/");
        // Redirection vers l'URL racine_site/controleur/action
        header("Location:" . $racineWeb . $controleur . "/" . $action);
    }


}