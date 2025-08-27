<header>
  <div class="container nav" style="display:flex;align-items:center;justify-content:space-between;padding:14px 0;">
    
    {{-- Left: Logo + Brand --}}
    <div style="display:flex;align-items:center;gap:16px;">
      <a href="#top" class="brand" style="display:flex;align-items:center;gap:8px;text-decoration:none;">
        <span class="brand-logo">ÉM</span>
        <span>Études‑Maroc</span>
      </a>
    
    </div>

    {{-- Center: Nav links --}}
    <nav class="nav-links" style="display:flex;gap:24px;align-items:center;">
      <a href="#programmes" class="nav-item">Programmes</a>
      <a href="#etablissements" class="nav-item">Établissements</a>
      <a href="#bourses" class="nav-item">Bourses d’études</a>
      <a href="#ressources" class="nav-item active">Ressources</a>
    </nav>

    {{-- Right: Language + User --}}
    {{-- Right: Language + User --}}
<div style="display:flex;align-items:center;gap:14px;">
  <button class="btn btn-outline" style="border-radius:50%;width:36px;height:36px;">FR</button>

  {{-- User Icon → Register Page --}}
  <a href="{{ route('register') }}" 
     class="btn btn-ghost" 
     style="border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;">
    <span style="font-size:18px;">👤</span>
  </a>
</div>

  </div>
</header>
