<?php
    require_once 'model/entity/Film.php';
    class FilmRepository {

        private PDO $db;

        public function __construct() {
            $this->db = (new Database())->connexion();
        }

        public function queryFilmsByUser(string $userId): array {
            $rq= $this->db->prepare('SELECT * FROM film WHERE belongs_to = :id');
            $rq->bindParam(':id', $userId);
            try {
                if ($rq->execute()) {
                    return $this->formatFilms($rq->fetchAll());
                } else {
                    die('Query failed');
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function queryFilmById(string $id): ?Film {
                $rq = $this->db->prepare('SELECT * FROM film WHERE id = :id');
                $rq->bindParam(':id', $id);
                try {
                    if ($rq->execute()) {
                        $film = $rq->fetchAll()[0];
                        return new Film($film['id'], $film['title'], $film['synopsis'], $film['year'], $film['director'], $film['genre'], $film['scenarist'], $film['prod_company']);
                    } else {
                        die('Query failed');
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
        }

        private function formatFilms(array $films): array {
            $formattedFilms = [];
            foreach ($films as $film) {
                $formattedFilms[] = new Film($film['id'], $film['title'], $film['synopsis'], $film['year'], $film['director'], $film['genre'], $film['scenarist'], $film['prod_company']);
            }
            return $formattedFilms;
        }

        public function deleteFilm(string $id): void {
            $rq = $this->db->prepare('DELETE FROM film WHERE id = :id');
            $rq->bindParam(':id', $id);
            try {
                if ($rq->execute()) {
                    header('Location: /home');
                } else {
                    die('Query failed');
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function updateFilm(Film $film): void {
            $rq = $this->db->prepare('UPDATE film SET title = :title, synopsis = :synopsis, year = :year, director = :director, genre = :genre, scenarist = :scenarist, prod_company = :prod_company WHERE id = :id');
            $id = $film->getId();
            $title = $film->getTitle();
            $synopsis = $film->getSynopsis();
            $year = $film->getYear();
            $director = $film->getDirector();
            $genre = $film->getGenre();
            $scenarist = $film->getScenarist();
            $prodCompany = $film->getProdCompany();

            $rq->bindParam(':id', $id);
            $rq->bindParam(':title', $title);
            $rq->bindParam(':synopsis', $synopsis);
            $rq->bindParam(':year', $year);
            $rq->bindParam(':director', $director);
            $rq->bindParam(':genre', $genre);
            $rq->bindParam(':scenarist', $scenarist);
            $rq->bindParam(':prod_company', $prodCompany);

            try {
                if ($rq->execute()) {
                    header('Location: /home');
                } else {
                    die('Query failed');
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function insertFilm(string $title, string $synopsis, int $year, string $director, string $genre, string $scenarist, string $prodCompany): void {
            $rq = $this->db->prepare('INSERT INTO film (id, title, synopsis, year, director, genre, scenarist, prod_company, belongs_to) VALUES (:id, :title, :synopsis, :year, :director, :genre, :scenarist, :prod_company, :belongs_to)');
            $id= uniqid();
            $rq->bindParam(':id', $id);
            $rq->bindParam(':title', $title);
            $rq->bindParam(':synopsis', $synopsis);
            $rq->bindParam(':year', $year);
            $rq->bindParam(':director', $director);
            $rq->bindParam(':genre', $genre);
            $rq->bindParam(':scenarist', $scenarist);
            $rq->bindParam(':prod_company', $prodCompany);
            $rq->bindParam(':belongs_to', $_SESSION['id']);
            try {
                if ($rq->execute()) {
                    header('Location: /home');
                } else {
                    die('Query failed');
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
