<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
</head>
<body>
    <h1 class="text-center">Bienvenue sur le Suivi !</h1>
    <form action="{{ route('register.store') }}" method="post">
        @csrf
        <div class="mx-auto w-50 mt-5">
            <div class="bg-primary text-center border rounded-top-3 shadow">
                <h2>Veuillez vous inscrire</h2>
            </div>
            <div class="d-grid gap-3 bg-white border rounded-bottom-3 shadow p-3">
                <div class="form-floating">
                    <input type="text" name="nom" id="nom" class="form-control" required>
                    <label for="nom" class="required">Nom</label>
                    @error('nom')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="text" name="prenom" id="prenom" class="form-control" required>
                    <label for="prenom" class="required">Prénom</label>
                    @error('prenom')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control" required>
                    <label for="email" class="required">Mail</label>
                    @error('email')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <label for="password" class="required">Mot de passe</label>
                    @error('password')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    <label for="password_confirmation" class="required">Confirmation du mot de passe</label>
                    @error('password_confirmation')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('login') }}" class="link-compte">Déjà un compte ?</a>

                <div class="mx-auto">
                    <button type="submit" class="btn btn-dark">
                        Inscription
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
