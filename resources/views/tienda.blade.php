<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center">
    <main
        class="w-11/12 md:w-4/5 mx-auto relative items-center justify-items-center bg-gray-100
        dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <table class="w-full">
            <div class="flex justify-center mb-4">
                <div class="relative mt-1 rounded-md shadow-sm">
                    <p class="text-white text-center">
                        <span id="result"></span><span id="size">{{$size}}</span>
                    </p>
                    <input type="text" name="price" id="price"
                        class="block rounded-lg text-white md:text-lg border border-slate-700 dark:bg-gray-900 pl-7 py-1 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Buscar" onkeyup="searchbar(event)">
                </div>
            </div>
                <thead class="text-white text-lg rounded-t-md border border-slate-600">
                    <th class="">
                        Id
                    </th>
                    <th class="">
                        Nombre
                    </th>
                    <th class="">
                        Slug
                    </th>
                </thead>
                @foreach ($products as $product)
                    {{ $product->product_card() }}
                @endforeach
        </table>
        <div class="flex items-center justify-center gap-3 mt-2">
            @for ($i = 1; $i <= 4; $i++)
                <a class="border border-slate-600 rounded-xl text-white w-6 h-6 navigation text-center"
                    aria-destination="{{ $i }}"
                    href="#"onclick="toPage({{ $i }})">{{ $i }}</a>
            @endfor
        </div>
    </main>
    @vite('resources/js/pagination.js')
    @vite('resources/js/searchbar.js')
</body>

</html>
