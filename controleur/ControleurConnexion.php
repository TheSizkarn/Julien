<?php

require_once 'framework/Controleur.php';
require_once 'modele/utilisateur.php';

class ControleurConnexion extends Controleur
{
    private $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new utilisateur();
    }

    public function index()
    {
       $this->genererVue();
    }

    public function connecter()
    {
        if ($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")) {
            $login = $this->requete->getParametre("login");
            $password = $this->requete->getParametre("mdp");
            $getHash = $this->utilisateur->getUtilisateur($login);
            $gotHash = $getHash['mdp'];
            if (password_verify($password, $gotHash))
            {
                $utilisateur = $this->utilisateur->getUtilisateur($login);
                $this->requete->getSession()->setAttribut("idUtilisateur", $utilisateur['idUtilisateur']);
                $this->requete->getSession()->setAttribut("login", $utilisateur['login']);
                $this->rediriger("admin", "index");
            }
            else
                $this->genererVue(array('msgErreur' => 'Login ou mot de passe incorrects'), "index");

        }
        else
            throw new Exception("Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
    }
}