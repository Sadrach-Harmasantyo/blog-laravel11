<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <x-navbar.navbar2 />

    <x-navbar.header2>{{ $title }}</x-navbar.header2>

    <section class="container mx-auto">
        {{ $slot }}
    </section>
</body>

</html>
