<?php ob_start(); ?>

<h5><a href="index.php?action=view_acteur">Ajouter un acteur</a></h5>
<br>
<i class="fa-light fa-tombstone"></i>
<table>
    <tr>
        <th>Acteur</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    <?php foreach ($requete as $acteur) { ?>
        <tr>
            <td><a href="index.php?action=acteur_bio&id=<?= $acteur['id_acteur'] ?>"><?= $acteur["prenom_acteur"] . " " . $acteur["nom_acteur"] ?></a></td>
            <td><a href="index.php?action=acteur_edit&id=<?= $acteur['id_acteur'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
            <td><a href="index.php?action=acteur_delete&id=<?= $acteur['id_acteur'] ?>"><i class="fa-solid fa-trash-arrow-up"></i></a></td>

        </tr>
    <?php } ?>
</table>

<?php

$requete = null;

$titre = "Acteur";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php"
?>