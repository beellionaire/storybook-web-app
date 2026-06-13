<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'StoryHub - Platform Membaca Interaktif' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900 antialiased flex flex-col min-h-screen">

    <x-header />

    <main class="flex-grow pt-20">
        {{ $slot }}
    </main>

    <x-footer />

</body>

</html>