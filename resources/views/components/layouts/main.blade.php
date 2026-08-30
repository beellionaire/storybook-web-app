<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">
    <title>KitaBaca - Platform Membaca Interaktif</title>
    <meta name="description"
        content="KitaBaca adalah platform tempat Anda bisa membaca, menulis, dan mengeksplorasi berbagai cerita menarik dari para kontributor berbakat.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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