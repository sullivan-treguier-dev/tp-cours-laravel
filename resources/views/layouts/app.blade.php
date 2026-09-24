<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'TP-Cours-Laravel') }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="border px-3 d-flex justify-content-between align-items-center bg-white">
        <h1 class="fw-bold">Suivi</h1>
        <div class="d-flex gap-3">
            <a href="{{ route('absence.index') }}">Absences</a>
            <a href="{{ route('salarie.index') }}">Salariés</a>
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
    </header>
    @yield('content')
</body>
<footer class="text-center text-white bg-dark">
    @footer()
</footer>
</html>
