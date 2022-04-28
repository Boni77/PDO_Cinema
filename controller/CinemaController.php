<?php

namespace Controller;

use Model\Connect;

class CinemaController
{
    public function listCasting()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT f.titre_film AS film, a.nom_acteur AS nomActeur, a.prenom_acteur AS prenomActeur, r.nom_role AS role
        FROM casting c
        INNER JOIN film f
        ON f.id_film = c.id_film
        INNER JOIN acteur a
        ON a.id_acteur = c.id_acteur
        INNER JOIN role r
        ON r.id_role = c.id_role
");
        require "view/list/casting.php";
    }

    public function AddCasting()
    {
        $noerror = [
            $id_film = filter_input(INPUT_POST, 'id_film', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $id_acteur = filter_input(INPUT_POST, 'id_acteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $id_role = filter_input(INPUT_POST, 'id_role', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {

            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "INSERT INTO casting(id_film, id_acteur, id_role)
                VALUES (:id_film, :id_acteur, :id_role)"
            );
            $requete->execute(
                [
                    'id_film' => $id_film,
                    'id_acteur' => $id_acteur,
                    'id_role' => $id_role,
                ]
            );
            header('Location: index.php?action=casting');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function ViewCasting()
    {
        $pdo = Connect::seConnecter();
        $requetefilm = $pdo->query(
            "SELECT f.titre_film AS titre, c.id_film AS idCasting
            FROM casting c
            INNER JOIN film f
            ON f.id_film = c.id_film"
        );
        $requetefilm->execute();

        $requeteacteur = $pdo->query(
            "SELECT a.nom_acteur AS nomActeur, a.prenom_acteur AS prenomActeur, c.id_acteur AS idCasting
            FROM casting c
            INNER JOIN acteur a
            ON a.id_acteur = c.id_acteur"
        );
        $requeteacteur->execute();

        $requeterole = $pdo->query(
            "SELECT r.nom_role AS nom_role, c.id_role AS idCasting
            FROM casting c
            INNER JOIN role r
            ON r.id_role = c.id_role"
        );
        $requeterole->execute();
        require "view/list/add_casting.php";
    }

    public function listRole()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * from role
    ");

        require "view/list/role.php";
    }

    public function supprRole($id)
    {
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare(
            "DELETE FROM casting WHERE id_role = :id_role"
        );
        $requete2 = $pdo->prepare(
            "DELETE FROM role WHERE id_role = :id_role"
        );

        $requete1->execute(['id_role' => $id]);
        $requete2->execute(['id_role' => $id]);
        header('Location: index.php?action=role');
    }

    public function AddRole()
    { //nom form
        $noerror = [
            $nom_role = filter_input(INPUT_POST, 'nom_role', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {
            var_dump($_POST);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "INSERT INTO role(nom_role)
                VALUES (:nom_role)"
            );
            $requete->execute(
                [
                    'nom_role' => $nom_role,
                ]
            );
            header('Location: index.php?action=role');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function ViewRole()
    {
        require "view/list/add_role.php";
    }

    public function listGenre()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT * from genre
        ");

        require "view/list/genre.php";
    }

    public function GenreBio($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare('SELECT * FROM genre WHERE id_genre = :id');
        $requete2 = $pdo->prepare('
        SELECT f.titre_film AS titre, g.nom_genre AS nom_genre
        FROM genre_film gf
        INNER JOIN film f
        ON f.id_film = gf.id_film
        INNER JOIN genre g
        ON g.id_genre = gf.id_genre
        WHERE g.id_genre = :id
        ');
        $requete->execute(['id' => $id]);
        $requete2->execute(['id' => $id]);
        require "view/list/genre_bio.php";
    }

    public function AddGenre()
    { //nom form
        $noerror = [
            $nom_genre = filter_input(INPUT_POST, 'nom_genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {
            var_dump($_POST);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "INSERT INTO genre(nom_genre)
                VALUES (:nom_genre)"
            );
            $requete->execute(
                [
                    'nom_genre' => $nom_genre,
                ]
            );
            header('Location: index.php?action=genre');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function ViewGenre()
    {
        require "view/list/add_genre.php";
    }

    public function listFilm()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT f.titre_film, f.date_sortie, f.time_film, f.id_film, r.nom_realisateur, r.prenom_realisateur
            FROM film f
            INNER JOIN realisateur r
            ON f.id_realisateur = r.id_realisateur
        ");

        require "view/list/film.php";
    }

    public function supprFilm($id)
    {
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare(
            "DELETE FROM casting WHERE id_film = :id_film"
        );
        $requete1B = $pdo->prepare(
            "DELETE FROM genre_film WHERE id_film = :id_film"
        );

        $requete2 = $pdo->prepare(
            "DELETE FROM film WHERE id_film = :id_film"
        );


        $requete1->execute(['id_film' => $id]);
        $requete1B->execute(['id_film' => $id]);
        $requete2->execute(['id_film' => $id]);
        header('Location: index.php?action=film');
    }

    public function AddFilm()
    {


        $noerror = [
            $titre_film = filter_input(INPUT_POST, 'titre_film', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $date_sortie = filter_input(INPUT_POST, 'date_sortie', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $time_film = filter_input(INPUT_POST, 'time_film', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $resume_film = filter_input(INPUT_POST, 'resume_film', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $id_realisateur = filter_input(INPUT_POST, 'id_realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];


        if (!empty($noerror)) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "INSERT INTO film (titre_film, date_sortie, time_film, resume_film, id_realisateur)
                VALUES (:titre_film, :date_sortie, :time_film, :resume_film, :id_realisateur)"
            );
            $requete->execute(
                [
                    'titre_film' => $titre_film,
                    'date_sortie' => $date_sortie,
                    'time_film' => $time_film,
                    'resume_film' => $resume_film,
                    'id_realisateur' => $id_realisateur
                ]
            );
            header('Location: index.php?action=film');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function ViewFilm()
    {
        $pdo = Connect::seConnecter();
        $requete3 = $pdo->query(
            "SELECT * from realisateur"
        );
        $requete3->execute();

        require "view/list/add_film.php";
    }

    public function FilmBio($id)

    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare(
            'SELECT f.titre_film, f.date_sortie, f.time_film, f.resume_film, r.nom_realisateur, r.prenom_realisateur, r.id_realisateur AS idrea
            FROM film f
            INNER JOIN realisateur r
            ON f.id_realisateur = r.id_realisateur
            WHERE f.id_film = :id'
        );
        $requete->execute(['id' => $id]);
        require "view/list/film_bio.php";
    }

    public function listActeur()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * FROM acteur
        ");
        require "view/list/acteur.php";
    }

    public function supprActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare(
            "DELETE FROM casting WHERE id_acteur = :id_acteur"
        );
        $requete2 = $pdo->prepare(
            "DELETE FROM acteur WHERE id_acteur = :id_acteur"
        );

        $requete1->execute(['id_acteur' => $id]);
        $requete2->execute(['id_acteur' => $id]);
        header('Location: index.php?action=acteur');
    }

    public function ActeurBio($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare('SELECT * FROM acteur WHERE id_acteur = :id');
        $requete2 = $pdo->prepare('
            SELECT f.titre_film AS titre, f.id_film AS idfilm, r.nom_role AS role, f.date_sortie
            FROM casting c
            INNER JOIN role r
            ON c.id_role = r.id_role
            INNER JOIN film f
            ON c.id_film = f.id_film
            WHERE c.id_acteur = :id
        ');
        $requete->execute(['id' => $id]);
        $requete2->execute(['id' => $id]);
        require "view/list/acteur_bio.php";
    }

    public function ActeurEdit($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare('SELECT * FROM acteur WHERE id_acteur = :id');

        $requete->execute(['id' => $id]);

        require "view/list/acteur_edit.php";
    }

    public function modifActeur($id)
    {
        $noerror = [
            $nom_acteur = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $prenom_acteur = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "UPDATE acteur
                    SET nom_acteur = :nom_acteur, 
                    prenom_acteur = :prenom_acteur,
                    sexe  = :sexe,
                    birthday = :birthday
                    WHERE id_acteur = :id"
            );
            $requete->execute(
                [
                    'nom_acteur' => $nom_acteur,
                    'prenom_acteur' => $prenom_acteur,
                    'sexe' => $sexe,
                    'birthday' => $birthday,
                    'id' => $id
                ]
            );
            header('Location: index.php?action=acteur');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function AddActeur()
    { //nom form
        $noerror = [
            $nom_acteur = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $prenom_acteur = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {
            var_dump($_POST);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "INSERT INTO acteur(nom_acteur, prenom_acteur, sexe, birthday)
                VALUES (:nom_acteur, :prenom_acteur, :sexe, :birthday)"
            );
            $requete->execute(
                [
                    'nom_acteur' => $nom_acteur,
                    'prenom_acteur' => $prenom_acteur,
                    'sexe' => $sexe,
                    'birthday' => $birthday
                ]
            );
            header('Location: index.php?action=acteur');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function ViewActeur()
    {
        require "view/list/add_acteur.php";
    }

    public function listRealisateur()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * FROM realisateur
        ");
        require "view/list/realisateur.php";
    }

    public function Reabio($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare('SELECT * FROM realisateur WHERE id_realisateur = :id');
        $requete2 = $pdo->prepare(
            'SELECT f.titre_film AS titre, f.id_realisateur, r.nom_realisateur, r.prenom_realisateur
            FROM film f
            INNER JOIN realisateur r
            ON f.id_realisateur = r.id_realisateur
            WHERE r.id_realisateur = :id'
        );
        $requete->execute(['id' => $id]);
        $requete2->execute(['id' => $id]);
        require "view/list/rea_bio.php";
    }

    public function AddRea()
    { //nom form
        $noerror = [
            $nom_realisateur = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $prenom_realisateur = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {
            var_dump($_POST);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "INSERT INTO realisateur(nom_realisateur, prenom_realisateur)
                VALUES (:nom_realisateur, :prenom_realisateur)"
            );
            $requete->execute(
                [
                    'nom_realisateur' => $nom_realisateur,
                    'prenom_realisateur' => $prenom_realisateur,
                ]
            );
            header('Location: index.php?action=realisateur');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function ViewRea()
    {
        require "view/list/add_rea.php";
    }

    public function RealisateurEdit($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare('SELECT * FROM realisateur WHERE id_realisateur = :id');

        $requete->execute(['id' => $id]);

        require "view/list/realisateur_edit.php";
    }

    public function modifRealisateur($id)
    {
        $noerror = [
            $nom_realisateur = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $prenom_realisateur = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "UPDATE realisateur
                    SET nom_realisateur = :nom_realisateur, 
                    prenom_realisateur = :prenom_realisateur
                    WHERE id_realisateur = :id"
            );
            $requete->execute(
                [
                    'nom_realisateur' => $nom_realisateur,
                    'prenom_realisateur' => $prenom_realisateur,
                    'id' => $id
                ]
            );
            header('Location: index.php?action=realisateur');
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }
}
