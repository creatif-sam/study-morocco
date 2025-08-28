<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Études-Maroc') }} - Inscription</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .auth-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1100px;
            margin: 80px auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        .auth-left {
            padding: 60px 40px;
            background: #fafafa;
        }
        .auth-left h1 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #111;
        }
        .auth-left h1 span { color: #c1272d; }
        .auth-left p {
            font-size: 15px;
            color: #555;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        .auth-left a {
            display: inline-block;
            padding: 10px 22px;
            border: 1px solid #c1272d;
            border-radius: 6px;
            font-weight: 600;
            color: #c1272d;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }
        .auth-left a:hover {
            background: #c1272d;
            color: #fff;
        }
        .auth-right { padding: 60px 40px; }
        .auth-right h2 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 30px;
            color: #111;
        }
        .auth-form label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }
        .auth-form input {
            width: 100%;
            padding: 10px 14px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 18px;
            outline: none;
            transition: border 0.2s ease;
        }
        .auth-form input:focus { border-color: #c1272d; }
        .auth-form button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #c1272d, #ff6b2d);
            border: none;
            border-radius: 6px;
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }
        .auth-form button:hover {
            background: linear-gradient(to right, #a81f25, #e85d20);
        }
    </style>
</head>
<body class="bg-gray-50">

    {{-- ✅ Navbar --}}
    @include('partials.nav')

    <div class="auth-container">
        <!-- Left side -->
        <div class="auth-left">
            <h1>
                Créez votre <span>compte</span>
            </h1>
            <p>
                Inscrivez-vous pour accéder à votre tableau de bord et gérer vos choix facilement.
            </p>
            <p>Vous avez déjà un compte ?</p>
            <a href="{{ route('login') }}">Connectez-vous</a>
        </div>

        <!-- Right side -->
        <div class="auth-right">
            <h2>Inscription</h2>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div>
                    <label for="name">Nom complet</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Entrer votre nom">
                </div>

                <div>
                    <label for="email">Adresse courriel</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Entrer l’adresse courriel">
                </div>

                <div>
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" required placeholder="Créer un mot de passe">
                </div>

                <div>
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirmer le mot de passe">
                </div>

                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>

    {{-- ✅ Footer --}}
    @include('partials.footer')

</body>
</html>
