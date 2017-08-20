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


<form method="post" id="formCommentary" action="chapitre/commenter">
    <h3>Ajouter un commentaire</h3>
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="text_commentary" name="contenu" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" id="envoyer" value="Commenter" /><br />
</form>

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
            <span><em><a href=<?= "chapitre/signaler/" . $billet['id'] . "/" . $commentaire['id'] ?>>Signaler</a></em></span>
            <span id="date_commentaire">
                <em>
                    <?= $commentaire['date_creation_fr'];?>
                </em>
            </span>
        </div>
    </div>
</div>

<?php endforeach;