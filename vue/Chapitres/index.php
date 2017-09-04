<?php $this->titre = 'Blog de Jean Forteroche - Tous les chapitres'; ?>

<h2 id="titreH2">Tous les chapitres</h2>

<?php foreach ($billets as $billet): ?>

<section>
    <a href="<?= "chapitre/index/" . $billet['id'] ?>" class="chapitresLien">
        <div class="all_chapters">
            <h3>
                <?= htmlspecialchars($billet['titre']); ?>
                <em class="date_creation">Ajouté le <?= $billet['date_creation_fr']; ?></em>
            </h3>

            <p>
                <?= substr(strip_tags($billet['contenu']),0, 600);?>...
                <br />
                <em>Lire la suite</em>
            </p>
        </div>
    </a>
<br />
</section>

<?php endforeach; ?>