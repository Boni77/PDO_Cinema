<?php

use Controller\CinemaController;


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "casting":
            $ctrlCinema->listCasting();
            break;
        case "add_casting":
            $ctrlCinema->AddCasting();
            break;
        case "view_casting":
            $ctrlCinema->ViewCasting();
            break;
        case "role":
            $ctrlCinema->listRole();
            break;
        case "add_role":
            $ctrlCinema->AddRole();
            break;
        case "view_role":
            $ctrlCinema->ViewRole();
            break;
        case "role_delete":
            $ctrlCinema->supprRole($_GET["id"]);
            break;
        case "genre":
            $ctrlCinema->listGenre();
            break;
        case "genre_bio":
            $ctrlCinema->GenreBio($_GET["id"]);
            break;
        case "add_genre":
            $ctrlCinema->AddGenre();
            break;
        case "view_genre":
            $ctrlCinema->ViewGenre();
            break;
        case "film":
            $ctrlCinema->listFilm();
            break;
        case "film_delete":
            $ctrlCinema->supprFilm($_GET["id"]);
            break;
        case "acteur":
            $ctrlCinema->listActeur();
            break;
        case "acteur_delete":
            $ctrlCinema->supprActeur($_GET["id"]);
            break;
        case "acteur_bio":
            $ctrlCinema->ActeurBio($_GET["id"]);
            break;
        case "acteur_edit":
            $ctrlCinema->ActeurEdit($_GET["id"]);
            break;
        case "modifActeur":
            $ctrlCinema->modifActeur($_GET["id"]);
            break;
        case "add_acteur":
            $ctrlCinema->AddActeur();
            break;
        case "view_acteur":
            $ctrlCinema->ViewActeur();
            break;
        case "add_film":
            $ctrlCinema->AddFilm();
            break;
        case "view_film":
            $ctrlCinema->ViewFilm();
            break;
        case "film_bio":
            $ctrlCinema->FilmBio($_GET["id"]);
            break;
        case "rea_bio":
            $ctrlCinema->ReaBio($_GET["id"]);
            break;
        case "realisateur":
            $ctrlCinema->listRealisateur();
            break;
        case "add_rea":
            $ctrlCinema->AddRea();
            break;
        case "view_rea":
            $ctrlCinema->ViewRea();
            break;
        case "realisateur_edit":
            $ctrlCinema->RealisateurEdit($_GET["id"]);
            break;
        case "modifRealisateur":
            $ctrlCinema->modifRealisateur($_GET["id"]);
            break;
    }
} else {
    $ctrlCinema->listFilm();
}
