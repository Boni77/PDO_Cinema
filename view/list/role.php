<?php ob_start(); ?>

<h5><a href="index.php?action=view_role">Ajouter un role</a></h5>
<br>
<table>
    <tr>
        <th>Rôle</th>
        <th>Delete</th>

    </tr>
    <?php foreach ($requete as $role) { ?>
        <tr>
            <td><?= $role["nom_role"] ?></td>
            <td><a href="index.php?action=role_delete&id=<?= $role['id_role'] ?>"><i class="fa-solid fa-trash-arrow-up"></i></a></td>


        </tr>
    <?php } ?>
</table>

<?php

$requete = null;

$titre = "Rôle";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php"
?>