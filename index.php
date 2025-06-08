<?php
// Función de escape corta para HTML
function e($string)
{
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

// Cargar datos
$moviesData = json_decode(file_get_contents('movies.json'), true) ?? ['movies' => []];
$movies = $moviesData['movies'];
$featured = $movies[0] ?? null;

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

    <!-- 🎬 Película destacada -->
    <?php if ($featured): ?>
        <section class="relative h-screen max-h-[800px]">
            <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
            <img src="<?= e($featured['backdrop'] ?: $featured['poster']) ?>" alt="<?= e($featured['title']) ?>"
                class="absolute inset-0 w-full h-full object-cover z-0">

            <div class="hero-gradient absolute inset-0 z-20"></div>

            <div class="relative container mx-auto px-6 h-full flex items-end pb-16 z-30">
                <div class="max-w-2xl">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4"><?= e($featured['title']) ?></h1>
                    <div class="flex items-center space-x-4 mb-4 text-sm">
                        <span class="text-green-500 font-semibold">98% Match</span>
                        <span class="border border-gray-400 px-1">HD</span>
                        <span><?= e($featured['year']) ?></span>
                    </div>
                    <p class="text-lg text-gray-200 mb-6"><?= e($featured['description']) ?></p>
                    <div class="flex space-x-4">
                        <a href="player.php?id=<?= e($featured['id']) ?>"
                            class="bg-white text-black px-6 py-2 rounded flex items-center gap-2 hover:bg-opacity-80 transition">
                            <span>▶</span>
                            <span>Reproducir</span>
                        </a>
                        <button
                            class="bg-netflix-gray bg-opacity-70 px-6 py-2 rounded flex items-center gap-2 hover:bg-opacity-50 transition">
                            <span>+</span>
                            <span>Mi Lista</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- 🎥 Películas por categoría -->
    <div class="container mx-auto px-6 py-12 space-y-12">
        <?php foreach ($categories as $title => $categoryMovies): ?>
            <?php if (!empty($categoryMovies)): ?>
                <section>
                    <h2 class="text-xl md:text-2xl font-bold mb-6 border-b-1 border-white-900 pb-2">
                        <?= e($title) ?>
                    </h2>
                    <div class="relative">
                        <div class="flex space-x-5 overflow-x-auto scroll-hide pb-6">
                            <?php foreach ($categoryMovies as $movie): ?>
                                <a href="player.php?id=<?= e($movie['id']) ?>"
                                    class="movie-card flex-none w-48 md:w-56 lg:w-64 relative group rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
                                    <img src="<?= e($movie['poster']) ?>" alt="<?= e($movie['title']) ?>"
                                        class="w-full h-64 md:h-72 object-cover rounded-lg border border-gray-800">
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 flex items-center justify-center transition-opacity duration-300">
                                        <button
                                            class="opacity-0 group-hover:opacity-100 text-white text-3xl rounded-full p-3 bg-black bg-opacity-40 hover:bg-opacity-70 transition duration-300">
                                            ▶
                                        </button>
                                    </div>
                                    <div
                                        class="absolute bottom-0 left-0 right-0 p-3 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-b-lg">
                                        <h3 class="font-bold text-sm truncate"><?= e($movie['title']) ?></h3>
                                        <div class="flex justify-between text-xs text-gray-300 mt-1">
                                            <span><?= e($movie['year']) ?></span>

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