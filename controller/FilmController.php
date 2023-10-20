<?php

class FilmController {
    public function __construct()
    {}

    public function edit(string $id): void {
        $film = (new FilmRepository())->queryFilmById($id);

        if(isset($_POST['title']) &&
            isset($_POST['synopsis']) &&
            isset($_POST['year']) &&
            isset($_POST['director']) &&
            isset($_POST['genre']) &&
            isset($_POST['scenarist']) &&
            isset($_POST['prodCompany'])) {
            $film->setTitle($_POST['title']);
            $film->setSynopsis($_POST['synopsis']);
            $film->setYear($_POST['year']);
            $film->setDirector($_POST['director']);
            $film->setGenre($_POST['genre']);
            $film->setScenarist($_POST['scenarist']);
            $film->setProdCompany($_POST['prodCompany']);

            (new FilmRepository())->updateFilm($film);

            header('Location: /home');
        } else {
            $message = 'Veuillez remplir tous les champs';
        }

        if (isset($film)) {
            require_once 'view/edit-film.php';
        } else {
            header('Location: /home');
        }
    }

    public function delete(string $id): void {
        (new FilmRepository())->deleteFilm($id);
    }

    public function details(string $id): void {
        $film = (new FilmRepository())->queryFilmById($id);
        require_once 'view/details-film.php';
    }

    public function add() {
        if(isset($_POST['title']) &&
            isset($_POST['synopsis']) &&
            isset($_POST['year']) &&
            isset($_POST['director']) &&
            isset($_POST['genre']) &&
            isset($_POST['scenarist']) &&
            isset($_POST['prodCompany'])) {

            (new FilmRepository())->insertFilm(
                $_POST['title'],
                $_POST['synopsis'],
                $_POST['year'],
                $_POST['director'],
                $_POST['genre'],
                $_POST['scenarist'],
                $_POST['prodCompany']);

            header('Location: /home');
        } else {
            $message = 'Veuillez remplir tous les champs';
        }

        require_once 'view/add-film.php';
    }
}
