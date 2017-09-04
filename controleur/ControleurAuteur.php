<?php

require_once 'framework/Controleur.php';

class ControleurAuteur extends Controleur
{
    public function index()
    {
        $this->genererVue();
    }
}