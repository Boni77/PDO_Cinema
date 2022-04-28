<?php ob_start();
?>
<h5><a href="index.php?action=view_casting">Ajouter un casting</a></h5>
<br>
<table>
    <tr>
        <th>Film</th>
        <th>Acteur</th>
        <th>Role de l'acteur</th>

    </tr>
    <?php foreach ($requete as $casting) { ?>
        <tr>
            <td><?= $casting["film"] ?></td>
            <td><?= $casting["prenomActeur"] . " " . $casting["nomActeur"] ?></td>
            <td><?= $casting["role"] ?></td>
        </tr>
    <?php } ?>
</table>

<?php

$requete = null;

$titre = "Casting";
$titre_secondaire = "Liste des castings";
$contenu = ob_get_clean();
require "view/template.php"
?>