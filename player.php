<?php
$videoId = '1ZukG-AuTUm5G6qOc3kytR0yhs2sHL-b1';
include 'includes/header.php';
?>

<main class="flex-grow flex items-center justify-center px-4 py-8">
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

    <!-- Botón pantalla completa -->
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

<?php include 'includes/footer.php'; ?>
