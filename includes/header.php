<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PELAS - Video</title>
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

<!-- Barra de navegación estilo Netflix -->
<nav class="fixed w-full z-50 bg-gradient-to-b from-black to-transparent">
  <div class="px-6 py-3 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center">
      <span class="text-red-600 font-bold text-3xl mr-10">PELAS</span>
      <div class="hidden md:flex space-x-6">
        <a href="#" class="hover:text-gray-300">Inicio</a>
        <a href="#" class="hover:text-gray-300">Películas</a>
        <a href="#" class="hover:text-gray-300">Series</a>
        <a href="#" class="hover:text-gray-300">Mi Lista</a>
      </div>
    </div>

    <!-- Buscador y perfil -->
    <div class="flex items-center space-x-4">
      <div class="relative hidden md:block">
        <input type="text" placeholder="Buscar..." class="bg-zinc-700 text-white px-4 py-1 rounded w-64">
      </div>
      <div class="w-8 h-8 rounded bg-zinc-700"></div>
    </div>
  </div>
</nav>

<!-- Espacio debajo del navbar fijo -->
<div class="h-16"></div>
