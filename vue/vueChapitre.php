<?php $this->titre = 'Blog de Jean Forteroche - ' . $billet['titre']; ?>

<section>
    <h3 id="titre">
        <?= htmlspecialchars($billet['titre']);?>
    </h3>

    <p id="contenu">
        <?= htmlspecialchars($billet['contenu']);?>
    </p>
    <em id="date_creation">Ajouté le <time><?= $billet['date_creation_fr']; ?></time></em>
</section>

<hr />

<?php foreach ($commentaires as $commentaire): ?>
<div class="zone_commentary">
    <div class="all_commentary">
        <div>
            <p id="pseudo">
                <strong>
                    <?= htmlspecialchars($commentaire['auteur']);?>
                </strong>
            </p>
            <p id="commentaire">
                <?= htmlspecialchars($commentaire['commentaire']);?>
            </p>
        </div>
        <div>
            <span><a href="/signaler.php?id=<?= $commentaire['id'];?>">Signaler</a></span>
            <span id="date_commentaire">
                <em>
                    <?= $commentaire['date_creation_fr'];?>
                </em>
            </span>
        </div>
    </div>
</div>

<?php endforeach;