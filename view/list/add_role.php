<form action="index.php?action=add_role" method="post">
    <p><input type="text" name="nom_role" placeholder="Rôle" required></p>
    <p><input type="submit">
    <p></p>
    <p></p>
    <p></p>
</form>
<?php

$titre = "Ajouter un rôle";
$titre_secondaire = "Ajout Rôle";
$contenu = ob_get_clean();

require "view/template.php";