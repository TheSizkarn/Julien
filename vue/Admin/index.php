<?php $this->titre = "Blog de Jean Forteroche - Administration"; ?>
<section>
    <h2>Administration</h2>

    <p>Ce blog comporte <?= htmlspecialchars($nbBillets) ?> chapitre(s) et <?= htmlspecialchars($nbCommentaires) ?> commentaire(s).</p>
    <div id="formTinymce">
        <?php if ($_GET['id'] && $_GET['action'] == "modifierChapitre")
        {
        ?>
            <form method="post" action="admin/modifier">
                <input type="text" name="titre" id="titreChapitre" placeholder="Titre du chapitre" value="<?= strip_tags($billet['titre']); ?>" required />
                <textarea id="tinymce" name="contenu"><?= strip_tags($billet['contenu']);?></textarea> <br />
                <input type="hidden" name="idBillet" value="<?= $billet['id']?>" />
                <input type="submit" name="modifier" value="Modifier" />
            </form>
        <?php
        }
        else
        {
        ?>
            <form method="post" action="admin/ajouter">
                <input type="text" name="titre" id="titreChapitre" placeholder="Titre du chapitre" required />
                <textarea id="tinymce" name="contenu"></textarea> <br />
                <input type="submit" name="ajouter" value="Ajouter" />
            </form>
        <?php
        }
        ?>
    </div>

    <div id="adminContainer">
        <div id="adminBillets">
            <h3>Les chapitres publiés</h3>
            <?php foreach ($billets as $billet): ?>
                <div id="adminBillets2">
                    <h5><?= htmlspecialchars($billet['titre']);?></h5>
                    <p><?= substr(strip_tags($billet['contenu']),0, 50);?>...</p>
                    <a class="modifier" href=<?="admin/modifierChapitre/" . $billet['id'];?>>Modifier</a>
                    <a class="supprimer" href=<?="admin/supprimerChapitre/" . $billet['id'];?>>Supprimer</a>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="adminCommentaires">
            <h3>Les commentaires signalés</h3>
            <?php foreach ($commentairesSignale as $commentaire): ?>
                <div id="adminCommentaire2">
                    <h5><?= htmlspecialchars($commentaire['auteur']);?></h5>
                    <p><?= htmlspecialchars($commentaire['commentaire']);?></p>
                    <a class="modifier" href=<?="admin/accepter/" . $commentaire['id'];?>>Accepter</a>
                    <a class="supprimer" href=<?="admin/supprimerCom/" . $commentaire['id'];?>>Supprimer</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="modifierMdp">
        <form method="post" action="admin/modifierPassword">
            <fieldset>
                <legend>Modifier le mot de passe</legend>
                <input type="password" name="passwordModifier" placeholder="Votre nouveau mot de passe" required/>
                <input type="password" name="confirmPasswordModifier" placeholder="Confirmer votre mot de passe" required />
                <input type="submit" name="modifierPassword" value="Modifier" />
            </fieldset>
        </form>
    </div>
</section>