<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=db685271671;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>
