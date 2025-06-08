<?php
$videoId = '1ZukG-AuTUm5G6qOc3kytR0yhs2sHL-b1';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reproductor de Video</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .player-container {
      aspect-ratio: 16 / 9;
    }
  </style>
</head>
<body class="bg-zinc-900 text-white min-h-screen flex flex-col">

  <!-- Navegación -->
  <nav class="bg-zinc-800 p-4 shadow-md">
    <div class="container mx-auto">
      <a href="index.php" class="text-white text-lg font-semibold hover:underline">← Volver</a>
    </div>
  </nav>

  <!-- Contenido principal sin scroll -->
  <main class="flex-grow flex items-center justify-center px-4">
    <div class="w-full max-w-6xl flex flex-col items-center space-y-6">
      
      <!-- Reproductor adaptado -->
      <div class="player-container w-full bg-zinc-700 rounded-xl overflow-hidden shadow-lg">
        <iframe 
          id="drivePlayer"
          src="https://drive.google.com/file/d/<?= $videoId ?>/preview"
          class="w-full h-full"
          allow="autoplay; fullscreen"
          allowfullscreen
        ></iframe>
      </div>

      <!-- Botón de pantalla completa -->
      <button 
        onclick="toggleFullscreen()" 
        class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 transition px-6 py-2 rounded-full text-white font-medium shadow-md"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" 
                d="M8 3H5a2 2 0 00-2 2v3m0 8v3a2 2 0 002 2h3m8-18h3a2 2 0 012 2v3m0 8v3a2 2 0 01-2 2h-3" />
        </svg>
        Pantalla Completa
      </button>
    </div>
  </main>

  <!-- Footer opcional -->
  <footer class="text-center text-sm text-zinc-400 pb-4">
    &copy; <?= date('Y') ?> - Reproductor personalizado
  </footer>

  <!-- Script para fullscreen -->
  <script>
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
  </script>
  <?php include 'includes/footer.php'; ?>
</body>
</html>
