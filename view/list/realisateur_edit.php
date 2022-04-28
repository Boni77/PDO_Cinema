<?php ob_start();
$realisateuredit = $requete->fetch();

?>
<form action="index.php?action=modifRealisateur&id=<?= $realisateuredit["id_realisateur"] ?>" method="POST">
    <p><input type="text" name="nom" value="<?= $realisateuredit['nom_realisateur'] ?>"></p>
    <p><input type="text" name="prenom" value="<?= $realisateuredit['prenom_realisateur'] ?>"></p>
    <p><input type="submit"></p>
</form>

<?php

$titre = "Edit Realisateur";
$titre_secondaire = $realisateuredit['prenom_realisateur'] . " " . $realisateuredit['nom_realisateur'];
$contenu = ob_get_clean();

require "view/template.php";
