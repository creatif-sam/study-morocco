<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Études-Maroc — Étudier au Maroc')</title>
  <meta name="description" content="Études-Maroc accompagne les étudiants étrangers pour candidater aux universités privées marocaines : rechercher des programmes, postuler et réserver une consultation." />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  {{-- Page-specific styles --}}
  @stack('styles')
</head>
<body>
  {{-- Navigation --}}
  @include('partials.nav')

  {{-- Page Content --}}
  <main id="top">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer>
    <div class="container" style="display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap">
      <p>© <span id="year"></span> Études-Maroc. Tous droits réservés.</p>
      <p>Fait avec <span aria-label="amour">❤️</span> • <a href="#top" class="muted" style="text-decoration:none">Haut de page</a></p>
    </div>
  </footer>

  {{-- Page-specific scripts --}}
  @stack('scripts')
</body>
</html>
