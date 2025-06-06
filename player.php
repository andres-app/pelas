<?php
// player.php - Reproductor simple para Google Drive

$videoId = '1ZukG-AuTUm5G6qOc3kytR0yhs2sHL-b1'; // ID de tu video en Google Drive
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproductor de Video</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .player-container {
            aspect-ratio: 16/9;
        }
    </style>
</head>
<body class="bg-black">

<!-- Barra de navegación simple -->
<nav class="bg-black p-4">
    <a href="index.php" class="text-white text-xl font-bold">← Volver</a>
</nav>

<!-- Reproductor -->
<div class="container mx-auto px-4 py-8">
    <div class="player-container bg-gray-900 rounded-lg overflow-hidden">
        <iframe 
            id="drivePlayer"
            src="https://drive.google.com/file/d/<?= $videoId ?>/preview" 
            class="w-full h-full"
            allow="autoplay; fullscreen"
            allowfullscreen
        ></iframe>
    </div>
    
    <!-- Controles personalizados -->
    <div class="mt-4 flex justify-center space-x-4">
        <button onclick="playVideo()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            ▶ Reproducir
        </button>
        <button onclick="toggleFullscreen()" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded">
            Pantalla Completa
        </button>
    </div>
</div>

<script>
    // Función para reproducir el video
    function playVideo() {
        const iframe = document.getElementById('drivePlayer');
        iframe.src = iframe.src.replace('/preview', '/preview?autoplay=1');
    }
    
    // Función para pantalla completa
    function toggleFullscreen() {
        const iframe = document.getElementById('drivePlayer');
        if (iframe.requestFullscreen) {
            iframe.requestFullscreen();
        } else if (iframe.webkitRequestFullscreen) {
            iframe.webkitRequestFullscreen();
        } else if (iframe.msRequestFullscreen) {
            iframe.msRequestFullscreen();
        }
    }
    
    // Reproducir automáticamente al cargar (puede no funcionar en algunos navegadores)
    window.addEventListener('DOMContentLoaded', () => {
        try {
            playVideo();
        } catch (error) {
            console.log('La reproducción automática fue bloqueada:', error);
        }
    });
</script>

</body>
</html>