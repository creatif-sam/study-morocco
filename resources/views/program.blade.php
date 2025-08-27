@extends('layouts.app')

@section('title', 'Programmes — Études-Maroc')

@push('styles')
<style>
:root{
  --brand:#C1272D; /* rouge marocain */
  --accent:#006233; /* vert marocain */
  --ink:#0f172a;
  --muted:#475569;
  --bg:#0b1020;
  --card:#111827ee;
  --ring:0 0 0 3px color-mix(in srgb, var(--accent) 40%, transparent);
}
body{font-family:Inter,system-ui;background:
  radial-gradient(1000px 600px at 80% -10%, #ffe5e5 0%, transparent 60%),
  radial-gradient(800px 500px at -10% 10%, #e9f7ef 0%, transparent 55%),
  linear-gradient(180deg,#ffffff 0%, #f7fafc 100%);
}
.container{max-width:1100px;margin:auto;padding:0 20px}

/* Hero */
.hero{padding:64px 0 32px;text-align:center}
.hero h1{font-size:clamp(32px,4.5vw,52px);color:var(--ink);margin:0}

/* Filter box */
.filter-box{background:white;border:1px solid #e5e7eb;border-radius:18px;padding:20px;box-shadow:0 6px 18px rgba(2,8,23,.06);margin-top:-20px;position:relative;z-index:10}
.filter-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px}
.input, select{padding:12px;border-radius:10px;border:1px solid #d1d5db;background:#fff;font-size:14px;width:100%}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:10px 14px;border-radius:12px;border:1px solid transparent;font-weight:700;cursor:pointer;text-decoration:none}
.btn-primary{background:var(--brand);color:white;box-shadow:0 6px 16px rgba(193,39,45,.25)}
.btn-primary:hover{background:#a81f24}
.btn-outline{border:1px solid var(--accent);color:var(--accent);background:white}

/* Layout */
.main-grid{display:grid;grid-template-columns:260px 1fr;gap:28px;margin-top:40px}
@media(max-width:900px){.main-grid{grid-template-columns:1fr}}

/* Sidebar */
.sidebar{background:white;border:1px solid #e5e7eb;border-radius:16px;padding:20px;box-shadow:0 6px 18px rgba(2,8,23,.05)}
.sidebar h2{font-size:18px;margin:0 0 12px;color:var(--ink)}
.sidebar label{display:flex;align-items:center;gap:8px;font-size:14px;color:var(--muted);margin-bottom:8px}

/* Results */
.results-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}
.results-header h2{margin:0;font-size:20px;color:var(--ink)}
.results-header span{color:var(--muted);font-size:14px}
.grid-cards{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:20px}
.card{background:white;border:1px solid #e5e7eb;border-radius:16px;padding:20px;box-shadow:0 6px 18px rgba(2,8,23,.05);transition:transform .2s}
.card:hover{transform:translateY(-4px)}
.card h3{margin:0 0 8px;font-size:17px;color:var(--ink)}
.card .uni{color:var(--ink);font-weight:500}
.card .location{color:var(--muted);font-size:14px;margin-top:2px}
.card .btn{margin-top:12px;font-size:14px}

/* Pagination */
.pagination{display:flex;justify-content:center;gap:8px;margin-top:30px}
.pagination button{padding:8px 14px;border-radius:10px;background:#f1f5f9;border:none;font-weight:600;cursor:pointer}
.pagination button.active{background:var(--brand);color:white}
</style>
@endpush

@section('content')


    <!-- Hero -->
    <section class="hero">
      <div class="container">
        <h1>Trouver un programme</h1>
      </div>
    </section>

    <!-- Filters -->
    <div class="container">
      <div class="filter-box">
        <form>
          <div class="filter-grid">
            <select><option>Diplôme</option><option>Licence</option><option>Master</option><option>Ingénierie</option><option>Doctorat</option></select>
            <select><option>Langue</option><option>Français</option><option>Anglais</option><option>Bilingue</option></select>
            <select><option>Domaine d’études</option><option>Informatique</option><option>Commerce</option><option>Santé</option><option>Architecture</option><option>Agriculture</option></select>
            <input class="input" type="search" placeholder="Mot-clé ou université">
          </div>
          <div style="margin-top:12px;text-align:right">
            <button class="btn btn-primary" type="submit">Rechercher</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Main Grid -->
    <div class="container main-grid">
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
            <button class="btn btn-primary">Voir plus</button>
          </div>
          <div class="card">
            <h3>Master en Commerce International</h3>
            <p class="uni">Université Hassan II</p>
            <p class="location">Casablanca</p>
            <button class="btn btn-primary">Voir plus</button>
          </div>
          <div class="card">
            <h3>Doctorat en Santé Publique</h3>
            <p class="uni">Université Cadi Ayyad</p>
            <p class="location">Marrakech</p>
            <button class="btn btn-primary">Voir plus</button>
          </div>
          <div class="card">
            <h3>Ingénierie en Architecture</h3>
            <p class="uni">Université Al Akhawayn</p>
            <p class="location">Ifrane</p>
            <button class="btn btn-primary">Voir plus</button>
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
    </div>
@endsection

@push('scripts')
<script>
  // Démo JS pour cohérence
  document.querySelectorAll('.card .btn').forEach(btn=>{
    btn.addEventListener('click',()=>alert("Détails à venir..."));
  });
</script>
@endpush
