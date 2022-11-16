<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <link href="css/my-great-app.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- ---------- Styles ---------- -->
    <!-- Bootstrap -->

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

    <!-- Custom CSS -->
{{--    <link href="css/styles.css" rel="stylesheet">--}}

    <!-- JS -->
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</head>
<body class="antialiased d-flex flex-column dark:bg-gray-900">

<x-navigation-bar/>

<x-header :title="$title"/>

<main class="container py-4 mx-auto min-h-[calc(100vh-8.34rem)]">
    {{ $slot }}
</main>

<x-footer/>

</body>
</html>
