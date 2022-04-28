<?php ob_start();
$film = $requete->fetch();

?>
</br>

<table>
    <tr>
        <th>Film</th>
        <th>Date de sortie</th>
        <th>Durée</th>
        <th>Résumé</th>
        <th>Réalisateur</th>

    </tr>
    <tr>
        <td><?= $film['titre_film']; ?></td>
        <td><?= $film['date_sortie']; ?></td>
        <td><?= $film['time_film']; ?></td>
        <td><?= $film['resume_film']; ?></td>
        <td><a href="index.php?action=rea_bio&id=<?= $film['idrea'] ?>"><?= $film['nom_realisateur'] . " " . $film['prenom_realisateur']; ?></a></td>
    </tr>
</table>
<?php

$titre = "Film";
$titre_secondaire = $film['titre_film'];
$contenu = ob_get_clean();

require "view/template.php";
