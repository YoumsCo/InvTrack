<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('icons/INSAM.ico') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">
    <title>InvTrack | @yield('title')</title>
    @yield('css_js')
</head>

<body class="@container/body transition-all duration-500 w-screen h-screen flex bg-black overflow-x-hidden">
    @include('loaders.spinner')
    @auth
        @include('layout.side')
    @endauth
    @yield('body')
</body>

</html>
