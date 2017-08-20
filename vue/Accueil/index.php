<?php $this->titre = 'Blog de Jean Forteroche - Accueil';

foreach ($lastBillet as $billet):

?>

 <section>
    <h2>Dernier chapitre ajouté :</h2>

    <div class="last_chapter">
        <h3>
            <?= htmlentities($billet['titre']); ?>
            <em class="date_creation">Ajouté le <time><?= $billet['date_creation_fr']; ?></time></em>
        </h3>

        <p>
            <?= substr(htmlentities($billet['contenu']),0, 600); ?>...<br />
            <em><a href="<?= "chapitre/index/" . $billet['id'] ?>">Lire la suite</a></em>
        </p>
    </div>

    <aside>

        <div class="bio">
            <h2>A propos de l'auteur</h2>

            <p>Passionné le littérature, Jean Forteroche est un auteur hors pair dans les livres d'aventure. Il a eu son succès grâce à son premier livre <em>Les secrets de l'Himalaya</em> qui s'est vendu à plus d'un million d'exemplaires.</p>

            <p>Aujourd'hui, plusieurs de ses oeuvres ont eu droit à une adaption au cinéma ou bien même dans les jeux vidéo. Jean Forteroche n'est pas prêt de terminer sa carrière et décida de publier gratuitement sur internet, son nouveau livre <em>Un billet simple pour l'Alaska</em>.</p>
            <em><a href="auteur.php">Pour en savoir plus</a></em>
        </div>
        <p id="photo_harold"><img src="images/harold.jpg" alt="Jean Forteroche" /></p>
    </aside>
</section>

<?php endforeach; ?>