<?php

// Définition du titre de la page
$title = "Page d'accueil !";

// Démarrage de la temporisation de sortie (bufferisation)
// Cela permet de capturer le contenu HTML généré pour le stocker dans une variable
ob_start();

// Boucle sur le tableau $users qui contient des objets User
foreach($users as $user) :
?>
<!-- Bloc HTML représentant un utilisateur -->
<div class="user">
    <!-- Affiche le pseudo de l'utilisateur via la méthode getPseudo() -->
    <h2><?= $user->getPseudo() ?></h2>

    <!-- Affiche l'email de l'utilisateur via la méthode getEmail() -->
    <p>Email : <?= $user->getEmail() ?></p>

    <!-- Lien pour "voir le user" (à compléter avec une URL dynamique si nécessaire) -->
    <p><a href="user/<?= $user->getId() ?>">Voir le user</a></p>
    <p><a href="user/update/<?= $user->getId() ?>">Modifier le user</a></p>
    <p><a href="user/delete/<?= $user->getId() ?>">Supprimer le user</a></p>
</div>
<?php
endforeach;
$content = ob_get_contents();
ob_end_clean();
require_once './view/base-html.php';