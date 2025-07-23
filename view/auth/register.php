<?php
$title = "Inscription - Mangathèque";

ob_start();
?>

<div class="register-container">
    <div class="register-card">
        <h1 class="register-title">Rejoignez la Mangathèque</h1>
        <p class="register-subtitle">Créez votre compte pour gérer votre collection de mangas.</p>

        <?php 
        $error_message = $_GET['error'] ?? ''; 
        $success_message = $_GET['success'] ?? '';
        
        if ($error_message): ?>
            <div class="message error">
                <?= htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <?php if ($success_message): ?>
            <div class="message success">
                <?= htmlspecialchars($success_message); ?>
            </div>
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

<?php
$content = ob_get_clean();

require __DIR__ . '/../base-html.php';
?>