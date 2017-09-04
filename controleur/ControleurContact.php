<?php

require_once 'framework/Controleur.php';

class ControleurContact extends Controleur
{
    public function index()
    {
        $this->genererVue();
    }
}