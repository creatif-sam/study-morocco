{{-- resources/views/universities.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Études-Maroc — Universités</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body{margin:0;font-family:Inter,system-ui;background:#fff;color:#0f172a}
    .container{max-width:1100px;margin:auto;padding:0 20px}

    /* Hero */
    .hero-univ {
      background: linear-gradient(90deg,#fff4f4,#fff9ef);
      padding:40px 0 30px;
      margin-bottom:20px;
    }
    .hero-univ h1{font-size:clamp(26px,4vw,40px);margin:0;font-weight:800}

    /* Search bar */
    .search-bar{
      background:white;border:1px solid #e5e7eb;border-radius:10px;
      display:flex;gap:12px;padding:12px;margin-top:20px;
      box-shadow:0 2px 6px rgba(0,0,0,0.05)
    }
    .search-bar select,.search-bar input{
      flex:1;padding:10px 12px;border-radius:6px;border:1px solid #d1d5db;font-size:14px
    }
    .search-bar button{
      padding:10px 16px;border-radius:6px;border:none;
      background:#C1272D;color:white;font-weight:600;cursor:pointer
    }
    .search-bar button:hover{background:#a51e24}

    /* Province section */
    .province{margin-top:40px}
    .province h2{font-size:20px;margin-bottom:14px;border-bottom:1px solid #e5e7eb;padding-bottom:6px}

    /* University grid */
    .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px}

    /* University card */
    .uni-card {
      border:1px solid #e5e7eb;
      border-radius:12px;
      padding:16px;
      background:white;
      box-shadow:0 4px 10px rgba(0,0,0,0.03);
      position:relative;
      transition:box-shadow .2s;
    }
    .uni-card:hover { box-shadow:0 6px 16px rgba(0,0,0,0.08); }
    .uni-card .logo {
      height:40px;
      margin-bottom:16px;
      display:flex;
      align-items:center;
      justify-content:flex-start;
    }
    .uni-card .logo img { max-height:100%; max-width:100%; }
    .uni-card h3 { font-size:16px; font-weight:700; margin:0 0 6px; }
    .uni-card p { margin:0; font-size:14px; color:#475569; }
    .card-actions {
      position:absolute;top:8px;right:8px;display:flex;gap:6px;
    }
    .card-actions button {
      width:32px;height:32px;border-radius:8px;
      border:1px solid #e5e7eb;background:white;
      display:flex;align-items:center;justify-content:center;
      cursor:pointer;font-size:14px;transition:background .2s;
    }
    .card-actions button:hover { background:#f1f5f9; }
  </style>
</head>
<body>

  @include('partials.nav')

  <section class="hero-univ">
    <div class="container">
      <h1>Trouver une université</h1>
      <form class="search-bar" id="searchForm">
        <select id="province">
          <option value="">Province/territoire</option>
          <option>Casablanca</option>
          <option>Rabat</option>
          <option>Fès</option>
          <option>Marrakech</option>
        </select>
        <input type="text" id="searchInput" placeholder="Rechercher une université…">
        <button type="submit">Rechercher</button>
      </form>
    </div>
  </section>

  <main class="container">
    {{-- Example province --}}
    <div class="province" id="casablanca">
      <h2>Casablanca</h2>
      <div class="grid">
        <div class="uni-card">
          <div class="card-actions">
            <button title="Comparer"><i class="bi bi-shuffle"></i></button>
            <button title="Favori"><i class="bi bi-heart"></i></button>
          </div>
          <div class="logo"><img src="/images/universities/uic.png" alt="UIC"></div>
          <h3>Université Internationale de Casablanca</h3>
          <p>Privée — Commerce, Ingénierie, Santé</p>
        </div>
        <div class="uni-card">
          <div class="card-actions">
            <button title="Comparer"><i class="bi bi-shuffle"></i></button>
            <button title="Favori"><i class="bi bi-heart"></i></button>
          </div>
          <div class="logo"><img src="/images/universities/hassan2.png" alt="Hassan II"></div>
          <h3>Université Hassan II</h3>
          <p>Publique — Droit, Sciences, Médecine</p>
        </div>
      </div>
    </div>

    <div class="province" id="rabat">
      <h2>Rabat</h2>
      <div class="grid">
        <div class="uni-card">
          <div class="card-actions">
            <button title="Comparer"><i class="bi bi-shuffle"></i></button>
            <button title="Favori"><i class="bi bi-heart"></i></button>
          </div>
          <div class="logo"><img src="/images/universities/mohammedv.png" alt="UM5"></div>
          <h3>Université Mohammed V</h3>
          <p>Publique — Sciences sociales, Ingénierie</p>
        </div>
        <div class="uni-card">
          <div class="card-actions">
            <button title="Comparer"><i class="bi bi-shuffle"></i></button>
            <button title="Favori"><i class="bi bi-heart"></i></button>
          </div>
          <div class="logo"><img src="/images/universities/uir.png" alt="UIR"></div>
          <h3>Université Internationale de Rabat</h3>
          <p>Privée — Droit, Commerce, Informatique</p>
        </div>
      </div>
    </div>
  </main>

  @include('partials.footer')

  <script>
    // Basic filter demo
    const form=document.getElementById('searchForm');
    const input=document.getElementById('searchInput');
    form?.addEventListener('submit',(e)=>{
      e.preventDefault();
      const q=input.value.toLowerCase();
      document.querySelectorAll('.uni-card').forEach(card=>{
        card.style.display = card.innerText.toLowerCase().includes(q) ? 'block':'none';
      });
    });
  </script>
</body>
</html>
