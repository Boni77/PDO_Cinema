<form action="index.php?action=add_acteur" method="post">
    <p><input type="text" name="nom" placeholder="Nom de l'acteur" required></p>
    <p><input type="text" name="prenom" placeholder="Prenom de l'acteur" required></p>
    <p>
        <select name="sexe">
            <option>Femme</option>
            <option>Homme</option>
        </select>
    </p>
    <p><input type="date" name="birthday" required></p>
    <p><input type="submit">
    <p></p>
    <p></p>
    <p></p>
</form>
<?php

$titre = "Ajouter un acteur";
$titre_secondaire = "Ajout Acteur";
$contenu = ob_get_clean();

require "view/template.php";
