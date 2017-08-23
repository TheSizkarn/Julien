<?php

require_once 'framework/Controleur.php';

abstract class ControleurSecurise extends Controleur
{
    public function executerAction($action)
    {
        // Vérifie si les informations utilisateur sont présents dans la session, si oui, l'utilisateur s'est déjà authentifié donc l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->requete->getSession()->existeAttribut("idUtilisateur")) {
            parent::executerAction($action);
        }
        else {
            $this->rediriger("connexion");
        }
    }
}