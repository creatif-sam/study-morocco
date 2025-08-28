<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Études-Maroc') }} - Connexion</title>
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
        .auth-form .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            font-size: 14px;
        }
        .auth-form .form-actions a {
            color: #c1272d;
            text-decoration: none;
            font-weight: 500;
        }
        .auth-form .form-actions a:hover { text-decoration: underline; }
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
                Bienvenue sur le <span>Tableau de bord !</span>
            </h1>
            <p>
                Organisez et classez vos choix par ordre de préférence pour vous aider à prendre une décision.
            </p>
            <p>Vous n’avez pas de compte ?</p>
            <a href="{{ route('register') }}">Inscrivez-vous</a>
        </div>

        <!-- Right side -->
        <div class="auth-right">
            <h2>Connexion</h2>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div>
                    <label for="email">Adresse courriel</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Entrer l’adresse courriel">
                </div>

                <div>
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" required
                           placeholder="Entrer le mot de passe">
                </div>

                <div class="form-actions">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        Se souvenir de moi
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                </div>

                <button type="submit">Connexion</button>
            </form>
        </div>
    </div>

    {{-- ✅ Footer --}}
    @include('partials.footer')

</body>
</html>
