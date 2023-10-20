<?php

use JetBrains\PhpStorm\NoReturn;

require_once 'model/repository/UserRepository.php';
require_once 'controller/RoutingController.php';

    class UserController
    {

        private UserRepository $userRepository;

        public function __construct()
        {
            $this->userRepository = new UserRepository();
        }

        function signIn(): void
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $user = $this->userRepository->queryUserByUsername($username);

                if (isset($user) && (hash('sha256', $password) === $user["password"])) {
                    $_SESSION['username'] = $user["username"];
                    $_SESSION['id'] = $user["id"];
                    header('Location: /home');
                } else {
                    $message = 'Identifiant ou mot de passe incorrect';
                }
            }

            require_once 'view/sign-in.php';
        }

        function signOut(): void
        {
            session_destroy();
            header('Location: /');
        }

        function signUp(): void
        {
            if (isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2'])) {
                $username = $_POST['username'];
                $password1 = $_POST['password1'];
                $password2 = $_POST['password2'];
                if ($password1 === $password2) {
                    //test password avec regex password (au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial)
                    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/', $password1)) {
                        $passwordHash = hash('sha256', $password1);
                        $user = (new UserRepository())->queryUserByUsername($username);
                        if (isset($user)) {
                            $message = 'Ce username existe déjà';
                        } else {
                            (new UserRepository())->createUser($username, $passwordHash);
                            $user = $this->userRepository->queryUserByUsername($username);
                            $_SESSION['username'] = $user["username"];
                            $_SESSION['id'] = $user["id"];
                            header('Location: /home');
                        }
                    } else {
                        $message = 'Le mot de passe doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial';
                    }
                } else {
                    $message = 'Les mots de passe ne correspondent pas';
                }
            }
            require_once 'view/sign-up.php';
        }
    }
