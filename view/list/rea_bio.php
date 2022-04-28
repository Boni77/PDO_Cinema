<?php ob_start();
$realisateur = $requete->fetch();
?>


<table>
    <tr>
        <th>Film de <?= $realisateur['nom_realisateur'] . " " . $realisateur['prenom_realisateur'] ?></th>

    </tr>
    <?php foreach ($requete2->fetchAll() as $rea) { ?>
        <tr>
            <td><?= $rea['titre'] ?></td>
        </tr>
    <?php } ?>
</table>

<?php

$requete = null;

$titre = "Realisateur";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php"
?>