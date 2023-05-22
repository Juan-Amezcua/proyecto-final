<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Renta de Inmuebles</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24" src="{{ asset('imagenes/logo3.png') }}" alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold uppercase">
                        Bienvenido {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/inmuebles/gestion" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Gestionar Anuncios</a>
                </li>
                <li>
                    <a href="/correo" class="hover:text-laravel"><i class="fa-solid fa-envelope"></i>
                        Correo personalizado</a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/salir">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>Salir
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/registro" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Registrarse</a>
                </li>
                <li>
                    <a href="/entrar" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Entrar</a>
                </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">&copy; Todos los derechos reservados, 2023</p>

        <a href="/inmuebles/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Publica tu
            Inmueble</a>
    </footer>

    <x-alerta />
</body>

</html>
