<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .d-flex {
            display: flex;
        }

        .justify-content-center {
            justify-content: center;
        }

        .btn {
            font-size: 14px;
            padding: 6px 12px;
            margin-bottom: 0;

            display: inline-block;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
        }

        .btn:focus,
        .btn:active:focus {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }

        .btn:hover,
        .btn:focus {
            color: #333;
            text-decoration: none;
        }

        .btn:active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }

        .btn-dark {
            color: #fff;
            background: #212529;
            border-color: #212529;
        }

        .btn-dark:hover {
            color: #fff;
            background: #424649;
            border-color: #373b3e;
        }

        .btn-dark:focus {
            box-shadow: rgb(66, 70, 73);
        }

        .btn-dark:active {
            color: #fff;
            background: #4d5154;
            border-color: #373b3e;
            box-shadow: inset 0 3px 5px #00000020;
        }

        .btn-dark:disabled {
            color: #fff;
            background: #212529;
            border-color: #212529;
        }
    </style>
</head>
<body>
    <h1>Bonjour {{ $absence->user->prenom }},</h1>
    <p>Votre absence a bel et bien été créé ! Vous pouvez y jeter un oeil dessus</p>
    <div class="d-flex justify-content-center">
        <a href="{{ route('absence.show', $absence->id) }}" class="btn btn-dark">Voir l'absence</a>
    </div>
</body>
</html>
