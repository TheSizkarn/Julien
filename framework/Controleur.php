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
    protected function genererVue($donneesVue = array())
    {
        // Détermination du nom du fichier vue à partir du nom dui contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controleur", "", $classeControleur);
        // Instanciation et génération de la vue
        $vue = new vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }
}