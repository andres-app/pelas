<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelas</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuración personalizada de Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'netflix-red': '#E50914',
                        'netflix-dark': '#141414',
                        'netflix-gray': '#303030',
                    },
                    fontFamily: {
                        sans: ['Helvetica Neue', 'Arial', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <!-- Estilos personalizados -->
    <style>
        .hero-gradient {
            background: linear-gradient(to top, rgba(20,20,20,1) 0%, rgba(20,20,20,0) 50%);
        }
        .scroll-hide::-webkit-scrollbar {
            display: none;
        }
        .movie-card {
            transition: all 0.3s ease;
        }
        .movie-card:hover {
            transform: scale(1.1);
            z-index: 10;
        }
    </style>
</head>
<body class="bg-netflix-dark text-white font-sans"></body>