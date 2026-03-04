<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#1D1D1D] text-white">

        @include('header.header')

        <div class="m-6 min-h-100 bg-cover bg-center bg-no-repeat rounded
                    flex items-end uppercase"
            id="productoDestacado"
            style="background-image: url('https://alfabetajuega.com/hero/2025/07/battlefield-6.1753199853.2796.jpg?width=1200');">

            <div class="w-full flex justify-between items-end m-6">
                <p class="text-3xl font-bold">
                    battlefield 6
                </p>

                <p class="text-xl font-bold">
                    69.99$
                </p>
            </div>

        </div>

        <h1 class="text-3xl font-bold m-6">DESTACADOS</h1>
        <div class="grid grid-cols-3 m-6 gap-4">
            <article>
                <a href="">
                    <img class="rounded" src="bf6.png">
                    <p class="mt-4 font-bold">Battlefield 6</p>
                    <p class="font-bold text-xs">9.99$</p>
                </a>
            </article>
            <article>
                <img src="https://alfabetajuega.com/hero/2025/07/battlefield-6.1753199853.2796.jpg?width=1200" class="rounded" src="kokushibo-demon-slayer-version-lego.png">
            </article>
            <article>
                <img class="rounded" src="ejemplo.png">
            </article>
            <article>
                <img class="rounded" src="bo7.png">
            </article>
        </div>
    </body>
</html>