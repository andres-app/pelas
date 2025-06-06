<?php
// config.php
define('BASE_URL', 'http://localhost/peliculas');
define('MOVIES_FILE', __DIR__ . '/movies.json');

// Función para cargar películas con manejo de errores
function loadMovies() {
    if (!file_exists(MOVIES_FILE)) {
        file_put_contents(MOVIES_FILE, json_encode([
            'featured' => null,
            'movies' => []
        ]));
    }
    
    $data = json_decode(file_get_contents(MOVIES_FILE), true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("Error en el archivo de películas: " . json_last_error_msg());
    }
    
    return $data;
}