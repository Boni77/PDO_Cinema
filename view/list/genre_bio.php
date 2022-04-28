<?php ob_start();
$genre = $requete->fetch();
?>


<table>
    <tr>
        <th>Films du genre : <?= $genre['nom_genre'] ?></th>

    </tr>
    <?php foreach ($requete2->fetchAll() as $film) { ?>
        <tr>
            <td><?= $film['titre'] ?></td>
        </tr>
    <?php } ?>
</table>

<?php

$requete = null;

$titre = "Film par genre";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php"
?>