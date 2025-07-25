<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mangathèque' ?></title>
    
    <link rel="stylesheet" href="/mangatheque/public/css/style.css">
    <link rel="stylesheet" href="/mangatheque/public/css/header-footer.css">
    
</head>
<body>
    <div class="homepage-container">

        <header class="main-header">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="/mangatheque/">Mangathèque</a>
                </div>
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['id'])) : // Si l'utilisateur est connecté ?>
                        <li class="nav-item">
                            <a href="/mangatheque/accueil" class="nav-link">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="/mangatheque/mangas" class="nav-link">Mangas</a>
                        </li>
                        <li class="nav-item">
                            <a href="/mangatheque/user/profile" class="nav-link">Profil</a> </li>
                        <li class="nav-item">
                            <a href="/mangatheque/logout" class="nav-link logout-btn">Déconnexion</a>
                        </li>
                    <?php else : // Si l'utilisateur n'est PAS connecté ?>
                        <li class="nav-item">
                            <a href="/mangatheque/login" class="nav-link">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a href="/mangatheque/register" class="nav-link">Inscription</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <?php if(isset($_SESSION['error'])) : ?>
            <div class="message error"><?= htmlspecialchars($_SESSION['error']) ?></div> 
            <?php unset($_SESSION['error']) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['success'])) : ?>
            <div class="message success"><?= htmlspecialchars($_SESSION['success']) ?></div>
            <?php unset($_SESSION['success']) ?>
        <?php endif; ?>

        <?= $content ?? '<p>Pas de contenu pour cette page.</p>'?>

        <footer class="main-footer">
            <p>&copy; <?= date("Y"); ?> Mangathèque. Tous droits réservés.</p>
        </footer>

    </div> </body>
</html>