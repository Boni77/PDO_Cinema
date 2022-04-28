<?php ob_start();

?>
<form action="index.php?action=add_film" method="post">
    <p><input type="text" name="titre_film" placeholder="Titre du film" required></p>
    <p><input type="date" name="date_sortie" required></p>
    <br>
    <label for="time_film">
        <h6>Durée du film</h6>
    </label>
    <p><input type="number" name="time_film" required></p>
    <br>
    <p><textarea name="resume_film" placeholder="Resumé du film" required></textarea></p>
    <p>
        <label for="id_realisateur">
            <h6>Choisir le réalisateur</h6>
        </label>
        <select name="id_realisateur">
            <?php foreach($requete3->fetchAll() as $rea) { ?>
            <option value="<?= $rea["id_realisateur"] ?>"><?= $rea["nom_realisateur"] . " " . $rea["prenom_realisateur"] ?></option>
            <?php } ?>
        </select>
    </p>
    <p><input type="submit">
    <p></p>
    <p></p>
    <p></p>
</form>
<?php

$titre = "Ajouter un film";
$titre_secondaire = "Ajout Film";
$contenu = ob_get_clean();

require "view/template.php";
