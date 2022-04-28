<form action="index.php?action=add_genre" method="post">
    <p><input type="text" name="nom_genre" placeholder="Genre" required></p>
    <p><input type="submit">
    <p></p>
    <p></p>
    <p></p>
</form>
<?php

$titre = "Ajouter un genre";
$titre_secondaire = "Ajout Genre";
$contenu = ob_get_clean();

require "view/template.php";