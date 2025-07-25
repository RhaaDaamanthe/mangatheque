<?php
// index.php

// Affichage des erreurs PHP (À DÉSACTIVER EN PRODUCTION !)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require 'vendor/autoload.php';
require 'vendor/altorouter/altorouter/AltoRouter.php';

// Initialisation du routeur
$router = new AltoRouter();
$router->setBasePath('/mangatheque'); // Chemin de base de votre application

// Inclure les contrôleurs
require 'controller/ControllerAuth.php';
require 'controller/ControllerPage.php';
// Ajoutez ici d'autres contrôleurs si nécessaire, ex: require 'controller/ControllerManga.php';

// Déclaration des routes
$router->map('GET', '/', 'ControllerPage#homePage', 'homepage');
$router->map('GET', '/accueil', 'ControllerPage#homePage', 'accueil_page');

$router->map('GET|POST', '/register', 'ControllerAuth#register', 'register');
$router->map('GET|POST', '/login', 'ControllerAuth#login', 'login');
$router->map('GET', '/logout', 'ControllerAuth#logout', 'logout'); // La route de déconnexion

// Détection de la route correspondante
$match = $router->match();

// Si une correspondance est trouvée
if ($match) {
    list($controllerName, $actionName) = explode("#", $match['target']);

    // Vérification et exécution du contrôleur et de la méthode
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (is_callable(array($controller, $actionName))) {
            call_user_func_array(array($controller, $actionName), $match['params']);
        } else {
            // Méthode du contrôleur non trouvée
            http_response_code(404);
            echo "Erreur 404: La méthode '$actionName' n'existe pas ou n'est pas accessible dans le contrôleur '$controllerName'.";
        }
    } else {
        // Classe contrôleur non trouvée
        http_response_code(404);
        echo "Erreur 404: Le contrôleur '$controllerName' n'existe pas.";
    }
} else {
    // Aucune route ne correspond à l'URL demandée
    http_response_code(404);
    echo "Erreur 404: Page non trouvée.";
}
?>