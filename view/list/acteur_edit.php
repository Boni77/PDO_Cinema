<?php ob_start();
$acteuredit = $requete->fetch();

?>
<form action="index.php?action=modifActeur&id=<?= $acteuredit["id_acteur"] ?>" method="POST">
    <p><input type="text" name="nom" value="<?= $acteuredit['nom_acteur']?>"></p>
    <p><input type="text" name="prenom" value="<?= $acteuredit['prenom_acteur']?>"></p>
    <p><input type="text" name="sexe" value="<?= $acteuredit['sexe']?>"></p>
    <p><input type="date" name="birthday" value="<?= $acteuredit['birthday']?>"></p>
    <p><input type="submit"></p>
</form>

<?php

$titre = "Edit Acteur";
$titre_secondaire = $acteuredit['prenom_acteur'] . " " . $acteuredit['nom_acteur'];
$contenu = ob_get_clean();

require "view/template.php";