<form action="index.php?action=add_rea" method="post">
    <p><input type="text" name="nom" placeholder="Nom de du réalisateur" required></p>
    <p><input type="text" name="prenom" placeholder="Prenom du réalisateur" required></p>
    <p><input type="submit">
    <p></p>
    <p></p>
    <p></p>
</form>
<?php

$titre = "Ajouter un réalisateur";
$titre_secondaire = "Ajout Realisateur";
$contenu = ob_get_clean();

require "view/template.php";
