<?php
// Cargar datos de películas
$moviesData = json_decode(file_get_contents('movies.json'), true) ?? ['movies' => []];
$movies = $moviesData['movies'];
$featured = $movies[0] ?? null; // Primera película como destacada

// Categorías
$categories = [
    'Recientes' => array_slice($movies, 0, 6),
    'Acción' => array_filter($movies, fn($m) => stripos($m['genre'] ?? '', 'acción') !== false),
    'Recomendadas' => array_filter($movies, fn($m) => ($m['rating'] ?? 0) > 4),
];
?>

<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>

<main>
    <!-- Película destacada -->
    <?php if ($featured): ?>
    <section class="relative h-screen max-h-[800px]">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <img src="<?= htmlspecialchars($featured['backdrop'] ?? $featured['poster'] ?? '') ?>" 
             alt="<?= htmlspecialchars($featured['title'] ?? '') ?>"
             class="absolute inset-0 w-full h-full object-cover">
        
        <div class="hero-gradient absolute inset-0"></div>
        
        <div class="relative container mx-auto px-6 h-full flex items-end pb-16">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-bold mb-4"><?= htmlspecialchars($featured['title'] ?? '') ?></h1>
                <div class="flex items-center space-x-4 mb-4">
                    <span class="text-green-500 font-bold">98% Match</span>
                    <span class="border border-gray-400 px-1 text-xs">HD</span>
                    <span><?= htmlspecialchars($featured['year'] ?? '') ?></span>
                </div>
                <p class="text-lg mb-6"><?= htmlspecialchars($featured['description'] ?? '') ?></p>
                <div class="flex space-x-4">
                    <a href="player.php?id=<?= $featured['id'] ?? '' ?>" 
                       class="bg-white text-black px-6 py-2 rounded flex items-center space-x-2 hover:bg-opacity-80">
                        <span>▶</span>
                        <span>Reproducir</span>
                    </a>
                    <button class="bg-netflix-gray bg-opacity-70 px-6 py-2 rounded flex items-center space-x-2 hover:bg-opacity-50">
                        <span>+</span>
                        <span>Mi Lista</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Listado de películas por categoría -->
    <div class="container mx-auto px-6 py-8 space-y-12">
        <?php foreach ($categories as $title => $categoryMovies): ?>
            <?php if (count($categoryMovies) > 0): ?>
                <section>
                    <h2 class="text-xl md:text-2xl font-bold mb-4"><?= htmlspecialchars($title) ?></h2>
                    <div class="relative">
                        <div class="flex space-x-4 overflow-x-auto scroll-hide pb-4">
                            <?php foreach ($categoryMovies as $movie): ?>
                                <a href="player.php?id=<?= $movie['id'] ?? '' ?>" 
                                   class="movie-card flex-none w-48 md:w-56 lg:w-64 relative group">
                                    <img src="<?= htmlspecialchars($movie['poster'] ?? '') ?>" 
                                         alt="<?= htmlspecialchars($movie['title'] ?? '') ?>"
                                         class="w-full h-64 md:h-72 object-cover rounded">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 flex items-center justify-center transition">
                                        <button class="opacity-0 group-hover:opacity-100 bg-netflix-red rounded-full p-3 transition">
                                            ▶
                                        </button>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-100 transition">
                                        <h3 class="font-bold truncate"><?= htmlspecialchars($movie['title'] ?? '') ?></h3>
                                        <div class="flex justify-between text-xs text-gray-300">
                                            <span><?= htmlspecialchars($movie['year'] ?? '') ?></span>
                                            <span>★ <?= htmlspecialchars($movie['rating'] ?? '') ?>/5</span>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>