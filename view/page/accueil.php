<main class="main-content">
    <section class="hero-section">
        <h1 class="hero-title"><?= $welcomeMessage ?></h1>
        <p class="hero-subtitle">Votre espace dédié pour gérer et découvrir vos mangas préférés.</p>
        <a href="/mangatheque/mangas" class="btn-primary">Découvrir les Mangas</a>
    </section>

    <section class="popular-mangas">
        <h2 class="section-title">Mangas Populaires</h2>
        <div class="manga-grid">
            <div class="manga-card">
                <img src="/mangatheque/public/images/One Piece.jpg" alt="Cover One Piece" class="manga-cover">
                <h3 class="manga-title">One Piece</h3>
                <p class="manga-author">Eiichiro Oda</p>
                <a href="/mangatheque/manga/one-piece" class="btn-secondary">Voir Détails</a>
            </div>
            <div class="manga-card">
                <img src="/mangatheque/public/images/Naruto.jpg" alt="Naruto" class="manga-cover">
                <h3 class="manga-title">Naruto</h3>
                <p class="manga-author">Masashi Kishimoto</p>
                <a href="/mangatheque/manga/my-hero-academia" class="btn-secondary">Voir Détails</a>
            </div>
            <div class="manga-card">
                <img src="/mangatheque/public/images/Demon Slayer.jpg" alt="Demon Slayer" class="manga-cover">
                <h3 class="manga-title">Demon Slayer</h3>
                <p class="manga-author">Koyoharu Gotouge</p>
                <a href="/mangatheque/manga/demon-slayer" class="btn-secondary">Voir Détails</a>
            </div>
            <div class="manga-card">
                <img src="/mangatheque/public/images/Jujutsu Kaisen.jpg" alt="Jujutsu Kaisen" class="manga-cover">
                <h3 class="manga-title">Jujutsu Kaisen</h3>
                <p class="manga-author">Gege Akutami</p>
                <a href="/mangatheque/manga/jujutsu-kaisen" class="btn-secondary">Voir Détails</a>
            </div>
            <div class="manga-card">
                <img src="/mangatheque/public/images/Snk.jpg" alt="Shingeki no Kyojin" class="manga-cover">
                <h3 class="manga-title">Shingeki no Kyojin</h3>
                <p class="manga-author">Hajime Isayama</p>
                <a href="/mangatheque/manga/jujutsu-kaisen" class="btn-secondary">Voir Détails</a>
            </div>
            <div class="manga-card">
                <img src="/mangatheque/public/images/Black Clover.jpg" alt="Black Clover" class="manga-cover">
                <h3 class="manga-title">Black Clover</h3>
                <p class="manga-author">Yūki Tabata</p>
                <a href="/mangatheque/manga/jujutsu-kaisen" class="btn-secondary">Voir Détails</a>
            </div>
        </div>
    </section>

    <section class="call-to-action">
        <h2 class="section-title">Commencez votre collection dès aujourd'hui !</h2>
        <p>Ajoutez vos mangas lus, suivez les sorties et découvrez de nouvelles pépites.</p>
        <?php if (!isset($_SESSION['id'])): ?>
            <a href="/mangatheque/register" class="btn-primary">S'inscrire Maintenant</a>
        <?php else: ?>
            <a href="/mangatheque/collection" class="btn-primary">Gérer ma Collection</a>
        <?php endif; ?>
    </section>
</main>