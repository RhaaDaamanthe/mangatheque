<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Mangathèque</title>
    <link rel="stylesheet" href="/mangatheque/public/css/auth.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h1 class="register-title">Se connecter à la Mangathèque</h1>
            <p class="register-subtitle">Entrez vos identifiants pour accéder à votre collection.</p>

            <?php 
            // Assurez-vous que la session est démarrée (normalement dans index.php)
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(isset($_SESSION['error'])) : ?>
                <div class="message error">
                    <?= htmlspecialchars($_SESSION['error']); ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])) : ?>
                <div class="message success">
                    <?= htmlspecialchars($_SESSION['success']); ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <form action="/mangatheque/login" method="POST" class="register-form"> 
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" id="email" name="email" placeholder="Votre adresse email" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>

                <button type="submit" class="btn-register">Se connecter</button> 
            </form>

            <p class="login-link">
                Pas encore de compte ? <a href="/mangatheque/register">Inscrivez-vous ici</a>
            </p>
        </div>
    </div>
    </body>
</html>