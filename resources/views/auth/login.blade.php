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
    <h1 class="text-center mt-5">{{ __("Welcome to the Follow-Up !") }}</h1>
    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <div class="mx-auto w-50 mt-5">
            <div class="bg-primary text-center border rounded-top-3 shadow">
                <h2>{{ __('Please login')}}</h2>
            </div>
            <div class="d-grid gap-3 bg-white border rounded-bottom-3 shadow p-3">
                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control">
                    <label for="email">{{ __('Email') }}</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control">
                    <label for="password">{{ __('Password') }}</label>
                </div>

                <a href="{{ route('register') }}" class="link-compte">{{ __("Don't have account ?") }}</a>

                <div class="mx-auto">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
