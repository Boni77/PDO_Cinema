<?php
ob_start(); ?>

<h5><a href="index.php?action=view_genre">Ajouter un genre</a></h5>
<table>
    <tr>
        <th>Genre</th>
    </tr>
    <?php foreach ($requete as $genre) { ?>
        <tr>
            <td><a href="index.php?action=genre_bio&id=<?= $genre['id_genre'] ?>"><?= $genre["nom_genre"] ?></a></td>

        </tr>
        <?php } ?>
</table>

<?php

$requete = null;

$titre = "Genre";
$titre_secondaire = "Genre des films";
$contenu = ob_get_clean();
require "view/template.php"
?>