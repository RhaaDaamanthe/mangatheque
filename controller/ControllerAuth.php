<?php
class ControllerAuth {
        public function register(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password'])){
                    $_SESSION['error'] = "Tous les champs doivent être remplis !";
                    header('Location: /mangatheque/register');
                    exit;
                }

                $pseudo = trim($_POST['pseudo']);
                $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
                $password = trim($_POST['password']);

                $modelUser = new ModelUser();
                $successUser = $modelUser->createUser($pseudo, $email, $password);

                if($successUser){
                    $_SESSION['success'] = "Vous êtes bien enregistré ! Vous pouvez vous connecter !";
                    header('Location: /mangatheque/login');
                    exit;
                } else {
                    $_SESSION['error'] = "Erreur lors de l'insertion.";
                    header('Location: /mangatheque/register');
                    exit;
                }
            }

            require __DIR__ . '/../view/auth/register.php';
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(!empty($_POST['email']) && !empty($_POST['password'])){
                    $modelUser = new ModelUser();
                    $userSuccess = $modelUser->getUserByEmail($_POST['email']);

                    if($userSuccess && password_verify($_POST['password'], $userSuccess->getPassword())){
                        // $_SESSION['success'] = 'Connexion réussie !';
                        $_SESSION['id'] = $userSuccess->getId();
                        $_SESSION['pseudo'] = $userSuccess->getPseudo();

                        header('Location: /mangatheque/');
                        exit;
                    } else {
                        $_SESSION['error'] = 'Identifiants incorrectes';

                        require __DIR__ . '/../view/auth/';
                        exit;
                    }
                }
            }

            require __DIR__ . '/../view/auth/login.php';
        }

        public function logout(){
             session_unset();
             session_destroy();
             header('Location: /mangatheque/login');
             exit;
        }
}