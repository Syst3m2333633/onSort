<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'onSort') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    </head>
    <body class="font-sans antialiased">
        <div class="py-12">
            <h1><a href="{{ route("dashboard") }}"><img src="{{ asset('css/img/icon.png')}}" alt="OnSort"></a></h1>

            <nav>
                <ul>
                    <li><a href="villes/create">Ville</a></li>
                    <li><a href="campus/create">Campus</a></li>
                    <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li><a href="profils/profil">Mon profil</a></li>
                    {{-- <li><a href="logout">Se déconnecter</a></li> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Se déconnecter</button>
                    </form>
                </ul>
            </nav>
            @dump(session()->all());
            @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
