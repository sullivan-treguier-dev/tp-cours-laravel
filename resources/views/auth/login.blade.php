<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
</head>
<body>
    <h1 class="text-center">Bienvenue sur le Suivi !</h1>
    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <div class="mx-auto w-50 mt-5">
            <div class="bg-primary text-center border rounded-top-3 shadow">
                <h2>Veuillez vous connecter</h2>
            </div>
            <div class="d-grid gap-3 bg-white border rounded-bottom-3 shadow p-3">
                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control">
                    <label for="email">Mail</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control">
                    <label for="password">Mot de passe</label>
                </div>

                <a href="{{ url('register') }}">Pas de compte ?</a>

                <div class="mx-auto">
                    <button type="submit" class="btn btn-dark">
                        Connexion
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
