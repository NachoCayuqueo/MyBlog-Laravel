<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Blog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="h-screen">
        <div class=" bg-cover relative min-h-screen flex flex-col items-center justify-center"
            style="background-image: url('{{ asset('images/background_notepapers.jpg') }}')">
            <div class="relative w-full ">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-3 lg:grid-cols-3 bg-black/30 backdrop-blur-md w-full">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <img src="{{ 'images/My_Blog_black.png' }}" class="w-[100px]" alt="Mi Imagen">
                    </div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end me-4">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <div class="text-[#27091B] flex flex-col  min-h-[100vh]">
                    <div class="mt-10">
                        <h1 class="text-center text-4xl">Bienvenidos a nuestro blog</h1>
                    </div>

                    <div class="mt-10">
                        <p class="mt-5 text-2xl text-center">¡Hola y bienvenidos a My Blog, tu nuevo espacio favorito
                            para
                            crear, compartir y
                            descubrir contenido increíble! En nuestra plataforma, cada usuario tiene la oportunidad de
                            expresarse y conectar con una comunidad vibrante y apasionada.</p>
                    </div>

                    <div class="my-10">
                        <h1 class="mt-5 text-3xl text-center">¿Qué puedes hacer en My Blog?</h1>
                    </div>
                    <div class="flex gap-5 p-5 justify-center">
                        <div
                            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Explorar
                                Categorías</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Sumérgete en una variedad de temas
                                organizados en categorías. Encuentra contenido que te inspire y te interese.
                            </p>
                        </div>
                        <div
                            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Crear y
                                Compartir</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400"> ¿Tienes una idea genial? Publica
                                tus propios posteos y comparte tus pensamientos, historias y conocimientos con el mundo.
                            </p>
                        </div>
                        <div
                            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Interactuar
                                y Conectar</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Comenta en los posteos de otros
                                usuarios, inicia conversaciones y crea conexiones significativas con personas que
                                comparten tus intereses.</p>
                        </div>

                    </div>

                </div>
                <footer class="flex flex-col text-center text-sm text-black bg-black/30 backdrop-blur-md p-6">
                    &copy; MY BLOG Todos los derechos reservados, 2024
                </footer>
            </div>
        </div>
</body>

</html>
