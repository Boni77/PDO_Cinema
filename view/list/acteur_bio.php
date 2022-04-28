<?php ob_start();
$acteur = $requete->fetch();

?>

<p>Née le <?= $acteur['birthday'] ?></p>
<p>De sexe : <?= $acteur['sexe'] ?></p>
</br>

<table>
    <tr>
        <th>Film</th>
        <th>Role</th>

    </tr>
    <?php foreach ($requete2->fetchAll() as $acteur2) { ?>
        <tr>
            <td><a href="index.php?action=film_bio&id=<?= $acteur2['idfilm'] ?>"><?= $acteur2['titre']; ?></a></td>
            <td><?= $acteur2['role']; ?></td>
        </tr>
    <?php } ?>
</table>

<?php

$titre = "Biographie";
$titre_secondaire = $acteur['prenom_acteur'] . " " . $acteur['nom_acteur'];
$contenu = ob_get_clean();

require "view/template.php";
