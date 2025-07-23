<?php

$title = "Connexion - Mangathèque";

ob_start();
?>

<div class="register-container"> <div class="register-card">
        <h1 class="register-title">Se connecter à la Mangathèque</h1>
        <p class="register-subtitle">Entrez vos identifiants pour accéder à votre collection.</p>

        <?php 
        $login_error_message = $_GET['error_login'] ?? '';
        if ($login_error_message): ?>
            <div class="message error">
                <?= htmlspecialchars($login_error_message); ?>
            </div>
        <?php endif; ?>

        <form action="/mangatheque/login" method="POST" class="register-form"> <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" id="email" name="email" placeholder="Votre adresse email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
            </div>

            <button type="submit" class="btn-register">Se connecter</button> </form>

        <p class="login-link">
            Pas encore de compte ? <a href="/mangatheque/register">Inscrivez-vous ici</a>
        </p>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../base-html.php';
?>