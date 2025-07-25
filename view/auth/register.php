<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Mangathèque</title>
    <link rel="stylesheet" href="/mangatheque/public/css/auth.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h1 class="register-title">Rejoignez la Mangathèque</h1>
            <p class="register-subtitle">Créez votre compte pour gérer votre collection de mangas.</p>

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

            <form action="/mangatheque/register" method="POST" class="register-form">
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Choisissez un nom d'utilisateur" required>
                </div>

                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" name="email" id="email" placeholder="Votre adresse email" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Minimum 8 caractères" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmer le mot de passe</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmez votre mot de passe" required>
                </div>

                <button type="submit" class="btn-register">S'inscrire</button>
            </form>

            <p class="login-link">
                Déjà un compte ? <a href="/mangatheque/login">Connectez-vous ici</a>
            </p>
        </div>
    </div>
    </body>
</html>