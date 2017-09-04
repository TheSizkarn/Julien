<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <base href="<?= $racineWeb ?>">
    <title><?= $titre ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#tinymce',
            language: 'fr_FR',
            elements : "text",

            forced_root_block : false,
            force_br_newlines : false,
            force_span_newlines : false,
            force_div_newlines : false,
            force_p_newlines : false
        });
    </script>
</head>
<body>

    <header>
        <h1>Billet simple pour l'Alaska</h1>
        <h2>Jean Forteroche</h2>
    </header>

    <?php
    if (isset($_SESSION['login']) AND $_SESSION['login'] != "")
    {
        echo '<nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="chapitres/index">Les chapitres</a></li>
                <li><a href="auteur.php">A propos</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin/index">Administration</a></li>
                <li><a href="connexion/deconnecter">Déconnexion</a></li>
            </ul>
	    </nav>';
    }
    else
    {
        echo '<nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="chapitres/index">Les chapitres</a></li>
                <li><a href="auteur/index">A propos</a></li>
                <li><a href="contact/index">Contact</a></li>
            </ul>
	    </nav>';
    }
    ?>

    <div id="container">
        <?= $contenu ?>
    </div>

    <footer>
        <p>Copyright <a href="connexion" id="login">Jean Forteroche</a> - Tous droits réservés</p>
    </footer>

</body>
</html>