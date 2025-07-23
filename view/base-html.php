<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mangathèque' ?></title>
    
    <link rel="stylesheet" href="/mangatheque/public/css/auth.css"> 
    
</head>
<body>
    <?php if(isset($_SESSION['error'])) : ?>
        <div class="message error"><?= $_SESSION['error'] ?></div> 
        <?php unset($_SESSION['error']) ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])) : ?>
        <div class="message success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']) ?>
    <?php endif; ?>

    <?= $content ?? 'Pas de contenu'?>
</body>
</html>