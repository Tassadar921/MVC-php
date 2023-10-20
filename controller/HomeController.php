<?php
require_once 'model/repository/FilmRepository.php';
    class HomeController {

        public function home(): void {
            $films = (new FilmRepository())->queryFilmsByUser($_SESSION['id']);
            require_once 'view/home.php';
        }
    }
