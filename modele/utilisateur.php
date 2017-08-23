<?php

require_once 'framework/modele.php';

class utilisateur extends modele
{
    // Vérifie qu'un utilisateur existe dans la BD
    public function connecter($login, $mdp)
    {
        $sql = "SELECT id FROM user WHERE pseudo=? AND password=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }

    // Renvoie un utilisateur existant dans la BD
    public function getUtilisateur($login, $mdp)
    {
        $sql = "SELECT id as idUtilisateur, pseudo as login, password as mdp FROM user WHERE pseudo=? AND password=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if ($utilisateur->rowCount() ==1)
            return $utilisateur->fetch();
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }
}