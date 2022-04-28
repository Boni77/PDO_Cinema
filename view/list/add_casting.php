<form action="index.php?action=add_casting" method="post">
<p>
        <label for="id_film">
            <h6>Choisir le film</h6>
        </label>
        <select name="id_film">
            <?php foreach($requetefilm->fetchAll() as $film) { ?>
            <option value="<?= $film["idCasting"] ?>"><?= $film["titre"]?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="id_acteur">
            <h6>Choisir l'acteur</h6>
        </label>
        <select name="id_acteur">
            <?php foreach($requeteacteur->fetchAll() as $acteur) { ?>
                <option value="<?= $acteur["idCasting"] ?>"><?= $acteur["nomActeur"]." ".$acteur["prenomActeur"]?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="id_role">
            <h6>Choisir son rôle</h6>
        </label>
        <select name="id_role">
            <?php foreach($requeterole->fetchAll() as $role) { ?>
                <option value="<?= $role["idCasting"] ?>"><?= $role["nom_role"]?></option>
            <?php } ?>
        </select>
    </p>
    <p><input type="submit">
</form>
<?php

$titre = "Ajouter un casting";
$titre_secondaire = "Ajout Casting";
$contenu = ob_get_clean();

require "view/template.php";