<?php ob_start();
?>
<h5><a href="index.php?action=view_rea">Ajouter un réalisateur</a></h5>
<table>
    <tr>
        <th>Realisateur</th>
        <th>Edit</th>

    </tr>
    <?php foreach ($requete as $realisateur) { ?>
        <tr>
            <td><a href="index.php?action=rea_bio&id=<?= $realisateur['id_realisateur'] ?>"><?= $realisateur["prenom_realisateur"] . " " . $realisateur["nom_realisateur"] ?></a></td>
            <td><a href="index.php?action=realisateur_edit&id=<?= $realisateur['id_realisateur'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
        </tr>
    <?php } ?>
</table>

<?php

$requete = null;

$titre = "Realisateur";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php"
?>