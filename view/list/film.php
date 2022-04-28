<?php
ob_start(); ?>

<h5><a href="index.php?action=view_film">Ajouter un film</a></h5>
<table>
    <tr>
        <th>Titre</th>
        <th>Date de sortie</th>
        <th>Durée du film</th>
        <th>Réalisateur</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($requete as $film) { ?>
        <tr>
            <td><?= $film["titre_film"] ?></td>
            <td><?= $film["date_sortie"] ?></td>
            <td><?= $film["time_film"] ?>'</td>
            <td><?= $film["nom_realisateur"] . " " . $film["prenom_realisateur"] ?></td>
            <td><a href="index.php?action=film_delete&id=<?= $film['id_film'] ?>"><i class="fa-solid fa-trash-arrow-up"></i></a></td>

        </tr>
    <?php } ?>
</table>

<?php

$requete = null;

$titre = "Film";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php"
?>