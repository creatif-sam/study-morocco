{{-- resources/views/components/navbar.blade.php --}}
<style>
  :root {
    --brand:#C1272D; --accent:#006233; --ink:#0f172a; --muted:#475569;
    --bg:#0b1020; --card:#111827ee;
    --ring: 0 0 0 3px color-mix(in srgb, var(--accent) 40%, transparent);
  }

  /* Navbar container */
  header {
    position: sticky; top: 0; z-index: 50;
    background: rgba(255,255,255,.95);
    backdrop-filter: saturate(150%) blur(8px);
    border-bottom: 1px solid #e5e7eb;
  }
  .container { max-width:1100px; margin:auto; padding:0 20px; }
  .nav { display:flex; align-items:center; justify-content:space-between; padding:14px 0; }

  /* Brand */
  .brand { display:flex; align-items:center; gap:8px; font-weight:800; text-decoration:none; color:var(--ink); }
  .brand-logo { width:34px; height:34px; border-radius:10px; background:var(--brand); border:2px solid var(--accent); display:grid; place-items:center; color:white; font-weight:800; }

  /* Links */
  .nav-links { display:flex; gap:24px; align-items:center; }
  .nav-links a { color:var(--muted); text-decoration:none; font-weight:600; }
  .nav-links a:hover, .nav-links a.active { color:var(--ink); }

  /* Buttons */
  .btn { display:inline-flex; align-items:center; justify-content:center; padding:10px; border-radius:12px; border:1px solid transparent; cursor:pointer; font-weight:600; background:white; }
  .btn-outline { border-color:var(--accent); color:var(--accent); }
  .btn-ghost { border-color:#e5e7eb; color:#334155; }
  .btn-circle { border-radius:50%; width:36px; height:36px; }

  /* Mobile toggle */
  .menu-btn { display:none !important; } /* hide by default */
  @media (max-width:900px) {
    .nav-links { display:none !important; }
    .menu-btn { display:inline-flex !important; }
  }
</style>

<header>
  <div class="container nav">
    {{-- Left: Logo + Brand --}}
    <div>
      <a href="#top" class="brand">
        <span class="brand-logo">ÉM</span>
        <span>Études-Maroc</span>
      </a>
    </div>

    {{-- Center: Nav links --}}
    <nav class="nav-links" id="navLinks">
      <a href="{{ route('program') }}" class="nav-item">Programmes</a>
      <a href="{{ route('universities') }}" class="nav-item">Établissements</a>
      <a href="#bourses" class="nav-item">Bourses d’études</a>
      <a href="{{ route('resources') }}" class="nav-item active">Ressources</a>
    </nav>

    {{-- Right: Language + User + Mobile --}}
    <div style="display:flex;align-items:center;gap:14px;">
      <button class="btn btn-outline btn-circle">FR</button>
      <a href="{{ route('register') }}" class="btn btn-ghost btn-circle">
        <span style="font-size:18px;">👤</span>
      </a>
      {{-- Mobile menu button --}}
      <button class="btn btn-outline menu-btn" id="menuBtn" aria-label="Ouvrir le menu">☰</button>
    </div>
  </div>
</header>

<script>
  // Mobile toggle
  const menuBtn = document.getElementById('menuBtn');
  const navLinks = document.getElementById('navLinks');

  menuBtn?.addEventListener('click', () => {
    const isOpen = navLinks.style.display === 'flex';
    navLinks.style.display = isOpen ? 'none' : 'flex';
    if (!isOpen) {
      navLinks.style.flexDirection = 'column';
      navLinks.style.gap = '14px';
      navLinks.style.marginTop = '10px';
    }
  });
</script>
{{-- End of navbar --}}