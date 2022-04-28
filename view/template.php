<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\style.css">
    <script src="https://kit.fontawesome.com/81ab4e445e.js" crossorigin="anonymous"></script>
    <title><?= $titre ?></title>
</head>

<body>

    <nav>
        EXO CINEMA
        <ol>
            <li><a href="index.php?action=film">Film</a></li>
            <li><a href="index.php?action=acteur">Acteur</a></li>
            <li><a href="index.php?action=realisateur">Realisateur</a></li>
            <li><a href="index.php?action=genre">Genre</a></li>
            <li><a href="index.php?action=role">Rôle</a></li>
            <li><a href="index.php?action=casting">Casting</a></li>
        </ol>
    </nav>

    <div id="wrapper">
        <main>
            <div class="contenu">
                <h1> PDO CINEMA </h1>
                <br>
                <h2><?= $titre_secondaire ?>
                    <br><br>
                    <p><?= $contenu ?>
            </div>
        </main>
    </div>

</body>

</html>