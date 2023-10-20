<?php

require_once 'controller/HomeController.php';
require_once 'controller/UserController.php';
require_once 'controller/FilmController.php';

class RoutingController
{
    private UserController $userController;
    private HomeController $homeController;
    private FilmController $filmController;

    public function __construct()
    {
        $this->userController = new UserController();
        $this->homeController = new HomeController();
        $this->filmController = new FilmController();
    }
    public function handleRequest(): void
    {
        // Get the requested URL path
        $url = $_SERVER['REQUEST_URI'];

// Remove query string and leading/trailing slashes
        $url = trim(parse_url($url, PHP_URL_PATH), '/');

// Split the URL into segments
        $segments = explode('/', $url);

// Define routes and their corresponding actions
        $routes = [
            'home' => 'homeAction',
            'sign-in' => 'signInAction',
            'sign-up' => 'signUpAction',
            'sign-out' => 'signOutAction',
            'edit-film' => 'editAction',
            'delete-film' => 'deleteAction',
            'details-film' => 'detailsAction',
            'add-film' => 'addAction',
            'default' => 'defaultAction'
        ];

// Check if the requested route exists, if not, use a default route
        $route = !empty($segments[0]) && array_key_exists($segments[0], $routes) ? $segments[0] : 'default';

// Extract the ID if it exists
        $id = $segments[1] ?? '';


        // Call the appropriate action
        $action = $routes[$route];
        $this->$action($id);
    }

    private function homeAction(): void
    {
        if(!isset($_SESSION['username'])) {
            header('Location: /sign-in');
        } else {
            $this->homeController->home();
        }
    }

    private function signInAction(): void
    {
        $this->userController->signIn();
    }

    private function signUpAction(): void
    {
        $this->userController->signUp();
    }

    private function signOutAction(): void
    {
        $this->userController->signOut();
    }

    private function editAction(string $id): void
    {
        $this->filmController->edit($id);
    }

    private function deleteAction(string $id): void
    {
        $this->filmController->delete($id);
    }

    private function detailsAction(string $id): void
    {
        $this->filmController->details($id);
    }

    private function addAction(): void
    {
        $this->filmController->add();
    }

    private function defaultAction(): void
    {
        header('Location: /home');
    }
}

// Create an instance of the RoutingController and handle the request
$controller = new RoutingController();
$controller->handleRequest();
