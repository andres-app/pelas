<!-- Barra de navegación estilo Netflix -->
<nav class="fixed w-full z-50 bg-gradient-to-b from-black to-transparent">
    <div class="px-6 py-3 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <span class="text-netflix-red font-bold text-3xl mr-10">PELAS</span>
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
                <input type="text" placeholder="Buscar..." class="bg-netflix-gray text-white px-4 py-1 rounded w-64">
            </div>
            <div class="w-8 h-8 rounded bg-netflix-gray"></div>
        </div>
    </div>
</nav>

<!-- Espacio para la barra de navegación -->
<div class="h-16"></div>