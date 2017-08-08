<?php

require 'modele/modele.php';

try {
    $billets = getLastBillet();
    require 'vue/vueAccueil.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vue/vueErreur.php';
}