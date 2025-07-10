<?php
session_start();
require 'vendor/autoload.php';
require 'vendor/altorouter/altorouter/AltoRouter.php';

// On crée une instance du routeur
$router = new AltoRouter();

// On définit le chemin de base de notre application (utile si ton site est dans un sous-dossier)
$router->setBasePath('/mangatheque');

// On déclare une route :
// Méthode HTTP : GET
// URL : / (racine du site)
// Cible : méthode 'homePage' de la classe 'ControllerPage'
// Nom de la route : 'homepage'
$router->map('GET', '/', 'ControllerPage#homePage', 'homepage');

// User
$router->map('GET', '/user/[i:id]', 'ControllerUser#oneUserById', 'userPage');
$router->map('GET', '/user/delete/[i:id]', 'ControllerUser#deleteUserById','userdelete');
$router->map('GET|POST', '/user/update/[i:id]', 'ControllerUser#updateUser','userUpdate');

// LOGIN REGISTER LOGOUT

$router->map('GET|POST', '/register', 'ControllerAuth#register', 'register');
$router->map('GET|POST', '/login', 'ControllerAuth#login', 'login');
$match = $router->match();


// Si une correspondance est trouvée (match est un tableau)
if(is_array($match)){
    
    // On sépare le nom de la classe et le nom de la méthode à appeler
    list($controller, $action) = explode("#", $match['target']);

    // On crée dynamiquement une instance de la classe contrôleur
    $obj = new $controller();

    // On vérifie si la méthode spécifiée est bien accessible dans cette classe
    if(is_callable(array($obj, $action))){
        
        // On appelle la méthode avec les paramètres capturés dans l'URL (si il y en a)
        call_user_func_array(array($obj, $action), $match['params']);
    
    } else {
        // Si la méthode n'existe pas ou n'est pas accessible, on renvoie une erreur 404
        http_response_code(404);
    }
}

// require 'vendor/autoload.php';
// require 'vendor/altorouter/altorouter/AltoRouter.php';

// $router = new AltoRouter();
// $router->setBasePath('/mangatheque');

// $router->map( 'GET', '/', 'ControllerPage#homePage', 'homepage');

// $match = $router->match();

// if(is_array($match)){
//     list($controller, $action) = explode("#", $match['target']);
//     $obj = new $controller();

//     if(is_callable(array($obj, $action))){
//         call_user_func_array(array($obj, $action), $match['params']);
//     } else {
//         http_response_code(404);
//     }
// }