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
        <a href="{{ route('dashboard') }}"><h1 class="fw-bold">{{ __('Follow-Up') }}</h1></a>
        <div class="d-flex gap-3">
            @if (auth()->user()->isA('admin') || auth()->user()->isA('salarie'))
                <a href="{{ route('absence.index') }}" class="navlink">Absences</a>
            @endif
            @if (auth()->user()->isA('admin'))
                <a href="{{ route('salarie.index') }}" class="navlink">{{ __('Employees') }}</a>
                <a href="{{ route('role.index') }}" class="navlink">{{ __('Roles') }}</a>
                <a href="{{ route('ability.index') }}" class="navlink">{{ __('Abilities') }}</a>
            @endif
        </div>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->prenom . ' ' . auth()->user()->nom }}
            </a>
            <ul class="dropdown-menu">
                <li class="d-flex justify-content-center">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{ __('Logout') }}</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>
    @yield('content')
</body>
<footer class="text-center text-white bg-dark py-4">
    @footer()
</footer>
</html>
