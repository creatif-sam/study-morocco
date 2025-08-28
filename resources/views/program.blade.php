{{-- resources/views/program.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Études-Maroc — Programmes</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body{margin:0;font-family:Inter,system-ui;background:#fff;color:#0f172a}
    .container{max-width:1100px;margin:auto;padding:0 20px}

    /* Hero */
    .hero-program {
      background: linear-gradient(90deg,#fff4f4,#f9fff0);
      padding:40px 0 30px;
      margin-bottom:20px;
      text-align:center;
    }
    .hero-program h1{font-size:clamp(26px,4vw,40px);margin:0;font-weight:800}

    /* Filter box */
    .filter-box{
      background:white;border:1px solid #e5e7eb;border-radius:10px;
      padding:16px;margin-top:20px;
      box-shadow:0 2px 6px rgba(0,0,0,0.05);
    }
    .filter-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px}
    .filter-box select,.filter-box input{
      padding:10px;border-radius:6px;border:1px solid #d1d5db;font-size:14px;width:100%
    }
    .filter-box button{
      padding:10px 16px;border-radius:6px;border:none;
      background:#C1272D;color:white;font-weight:600;cursor:pointer
    }
    .filter-box button:hover{background:#a51e24}

    /* Layout */
    .main-grid{display:grid;grid-template-columns:260px 1fr;gap:28px;margin-top:30px}
    @media(max-width:900px){.main-grid{grid-template-columns:1fr}}

    /* Sidebar */
    .sidebar{background:white;border:1px solid #e5e7eb;border-radius:10px;padding:20px;box-shadow:0 2px 6px rgba(0,0,0,0.05)}
    .sidebar h2{font-size:18px;margin:0 0 12px}
    .sidebar label{display:flex;align-items:center;gap:8px;font-size:14px;color:#475569;margin-bottom:8px}

    /* Results */
    .results-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}
    .results-header h2{margin:0;font-size:20px;font-weight:700}
    .results-header span{color:#475569;font-size:14px}
    .grid-cards{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px}
    .card{
      border:1px solid #e5e7eb;border-radius:12px;
      padding:16px;background:white;
      box-shadow:0 4px 10px rgba(0,0,0,0.03);
      transition:box-shadow .2s;
    }
    .card:hover{box-shadow:0 6px 16px rgba(0,0,0,0.08);}
    .card h3{margin:0 0 6px;font-size:16px;font-weight:700}
    .card .uni{font-weight:500;color:#0f172a}
    .card .location{font-size:14px;color:#475569}
    .card button{
      margin-top:10px;padding:8px 14px;border:none;
      border-radius:6px;background:#C1272D;color:white;
      font-size:14px;font-weight:600;cursor:pointer
    }
    .card button:hover{background:#a51e24}

    /* Pagination */
    .pagination{display:flex;justify-content:center;gap:8px;margin-top:30px}
    .pagination button{
      padding:8px 14px;border-radius:6px;background:#f1f5f9;
      border:none;font-weight:600;cursor:pointer
    }
    .pagination button.active{background:#C1272D;color:white}
  </style>
</head>
<body>

  @include('partials.nav')

  <!-- Hero -->
  <section class="hero-program">
    <div class="container">
      <h1>Trouver un programme</h1>
      <form class="filter-box" id="filterForm">
        <div class="filter-grid">
          <select><option>Diplôme</option><option>Licence</option><option>Master</option><option>Ingénierie</option><option>Doctorat</option></select>
          <select><option>Langue</option><option>Français</option><option>Anglais</option><option>Bilingue</option></select>
          <select><option>Domaine d’études</option><option>Informatique</option><option>Commerce</option><option>Santé</option><option>Architecture</option><option>Agriculture</option></select>
          <input type="text" id="searchInput" placeholder="Mot-clé ou université">
        </div>
        <div style="margin-top:12px;text-align:right">
          <button type="submit">Rechercher</button>
        </div>
      </form>
    </div>
  </section>

  <main class="container main-grid">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Autres filtres</h2>
      <label><input type="checkbox"> Casablanca</label>
      <label><input type="checkbox"> Rabat</label>
      <label><input type="checkbox"> Marrakech</label>
      <label><input type="checkbox"> Fès</label>
    </aside>

    <!-- Results -->
    <div>
      <div class="results-header">
        <h2>Résultats de la recherche</h2>
        <span>17589 programmes trouvés</span>
      </div>
      <div class="grid-cards">
        <div class="card">
          <h3>Licence en Informatique</h3>
          <p class="uni">Université Mohammed V</p>
          <p class="location">Rabat</p>
          <button>Voir plus</button>
        </div>
        <div class="card">
          <h3>Master en Commerce International</h3>
          <p class="uni">Université Hassan II</p>
          <p class="location">Casablanca</p>
          <button>Voir plus</button>
        </div>
        <div class="card">
          <h3>Doctorat en Santé Publique</h3>
          <p class="uni">Université Cadi Ayyad</p>
          <p class="location">Marrakech</p>
          <button>Voir plus</button>
        </div>
        <div class="card">
          <h3>Ingénierie en Architecture</h3>
          <p class="uni">Université Al Akhawayn</p>
          <p class="location">Ifrane</p>
          <button>Voir plus</button>
        </div>
      </div>

      <!-- Pagination -->
      <div class="pagination">
        <button>Précédent</button>
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button>Suivant</button>
      </div>
    </div>
  </main>

  @include('partials.footer')

  <script>
    // Demo filter
    const form=document.getElementById('filterForm');
    const input=document.getElementById('searchInput');
    form?.addEventListener('submit',(e)=>{
      e.preventDefault();
      const q=input.value.toLowerCase();
      document.querySelectorAll('.card').forEach(card=>{
        card.style.display = card.innerText.toLowerCase().includes(q) ? 'block':'none';
      });
    });
  </script>
</body>
</html>
