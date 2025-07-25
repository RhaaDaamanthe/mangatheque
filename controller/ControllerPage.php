<?php
// controller/ControllerPage.php

// Inclure vos modèles si AltoRouter ou Composer ne les autoloadent pas automatiquement.
// Par exemple:
// require_once __DIR__ . '/../model/ModelUser.php';

class ControllerPage {
    public function homePage(){
        // Assurez-vous que la session est bien démarrée (normalement dans index.php)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // --- LOGIQUE DE REDIRECTION POUR L'ACCUEIL PRIVÉ (OPTION B) ---
        if(!isset($_SESSION['id'])){
            header('Location: /mangatheque/login'); // Assurez-vous que '/mangatheque/login' est la bonne route
            exit;
        }
        // --- FIN DE LA LOGIQUE DE REDIRECTION ---

        // Si l'exécution arrive ici, c'est que l'utilisateur est connecté.

        // Préparation des données pour la vue
        $welcomeMessage = "Bienvenue sur Mangathèque !";
        if (isset($_SESSION['pseudo'])) {
            $welcomeMessage = "Bienvenue, " . htmlspecialchars($_SESSION['pseudo']) . " !";
        }

        // Si vous utilisez un modèle pour récupérer des données (ex: liste de mangas, infos user)
        // assurez-vous que le modèle est inclus/autoloadé et décommentez cette partie.
        // $modelUser = new ModelUser();
        // $users = $modelUser->getUsers();

        // Définition du titre de la page (pour la balise <title> dans base-html.php)
        $title = "Mon Accueil - Mangathèque";

        // Démarrez la temporisation de sortie pour capturer le contenu de la vue
        ob_start();

        // Incluez le fichier de la vue de votre page d'accueil.
        // Le chemin est relatif à ce fichier (ControllerPage.php est dans 'controller/').
        require __DIR__ . '/../view/page/accueil.php'; // Ou 'homepage.php' si c'est le nom exact de votre fichier

        // Récupérez le contenu mis en mémoire tampon
        $content = ob_get_clean();

        // Incluez le template HTML de base.
        // Le chemin est relatif à ce fichier.
        require __DIR__ . '/../view/base-html.php';
    }
}