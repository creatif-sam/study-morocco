{{-- resources/views/components/hero.blade.php --}}
<style>
  :root{
    --brand:#C1272D; /* rouge marocain */
    --accent:#006233; /* vert marocain */
    --ink:#0f172a;
    --muted:#475569;
    --ring: 0 0 0 3px color-mix(in srgb, var(--accent) 40%, transparent);
  }

  .hero{padding:64px 0 32px}
  .hero-wrap{display:grid;grid-template-columns:1.1fr .9fr;gap:40px;align-items:center}
  .kicker{color:var(--brand);font-weight:800;letter-spacing:.06em;text-transform:uppercase}
  h1{font-size:clamp(30px,4.5vw,52px);line-height:1.05;margin:10px 0 14px;color:var(--ink)}
  .lead{font-size:clamp(16px,1.6vw,20px);color:#334155}
  .hero-card{background:white;border:1px solid #e5e7eb;border-radius:18px;padding:18px;box-shadow:0 6px 18px rgba(2,8,23,.06)}
  .field{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
  .field label{font-size:13px;font-weight:700;color:#334155}
  .input, select{padding:12px 12px;border-radius:10px;border:1px solid #d1d5db;background:#fff;font-size:14px}
  .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
  .muted{color:var(--muted);font-size:14px}
  .btn{display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border-radius:12px;border:1px solid transparent;font-weight:700;text-decoration:none;cursor:pointer}
  .btn-primary{background:var(--brand);color:white;box-shadow:0 10px 20px rgba(193,39,45,.25)}
  .btn-outline{border-color:var(--accent);color:var(--accent);background:white}
  .btn:focus{outline:none;box-shadow:var(--ring)}

  @media (max-width: 900px){
    .hero-wrap{grid-template-columns:1fr}
    .row{grid-template-columns:1fr}
  }
</style>

<section class="hero">
  <div class="container hero-wrap">
    <div>
      <span class="kicker">Étudier au Maroc en toute confiance</span>
      <h1>Votre passerelle vers les universités privées marocaines</h1>
      <p class="lead">
        Études-Maroc aide les étudiants étrangers — surtout d’Afrique francophone — 
        à découvrir des programmes, candidater facilement et recevoir des conseils d’experts, 
        de l’admission à l’arrivée.
      </p>
      <div style="display:flex;gap:12px;margin-top:16px;flex-wrap:wrap">
        <a class="btn btn-primary" href="#dashboard" id="ctaApply">Candidater / Réserver un appel</a>
        <a class="btn btn-primary" href="#features">Découvrir</a>
      </div>
      <p class="muted" style="margin-top:10px">Bilingue : Français • Anglais</p>
    </div>

    {{-- Recherche rapide --}}
    <div class="hero-card" aria-label="Recherche rapide">
      <form id="finderForm">
        <h3 style="margin:0 0 12px;color:var(--ink)">Recherche rapide</h3>
        <div class="row">
          <div class="field">
            <label for="level">Niveau</label>
            <select id="level" required>
              <option value="">Choisir</option>
              <option>Licence / Bachelor</option>
              <option>Master</option>
              <option>Ingénierie</option>
              <option>Commerce / Management</option>
            </select>
          </div>
          <div class="field">
            <label for="domain">Domaine</label>
            <select id="domain" required>
              <option value="">Choisir</option>
              <option>Informatique</option>
              <option>Commerce & Finance</option>
              <option>Santé / Pharmacie</option>
              <option>Architecture</option>
              <option>Agriculture</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="field">
            <label for="budget">Budget (€/an)</label>
            <input class="input" id="budget" type="number" placeholder="ex : 3000" required />
          </div>
          <div class="field">
            <label for="city">Ville</label>
            <select id="city">
              <option>Peu importe</option>
              <option>Casablanca</option>
              <option>Rabat</option>
              <option>Fès</option>
              <option>Marrakech</option>
              <option>Tanger</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary" type="submit" style="width:100%">Afficher les résultats</button>
        <p id="finderResult" class="muted" style="margin-top:8px"></p>
      </form>
    </div>
  </div>
</section>

<script>
  // Finder demo
  const finderForm = document.getElementById('finderForm');
  const finderResult = document.getElementById('finderResult');
  finderForm?.addEventListener('submit', (e)=>{
    e.preventDefault();
    const level = document.getElementById('level').value;
    const domain = document.getElementById('domain').value;
    const budget = Number(document.getElementById('budget').value||0);
    const city = document.getElementById('city').value;
    if(!level || !domain || !budget){
      finderResult.textContent = 'Veuillez compléter tous les champs requis.';
      return;
    }
    let suggestion = 'Plusieurs options disponibles';
    if(budget < 2500) suggestion = 'Cherchez des bourses et des programmes à faibles frais.';
    if(domain.includes('Info')) suggestion = 'Excellentes options en Informatique à Rabat et Casablanca.';
    if(city !== 'Peu importe') suggestion += ` — Essayez ${city}.`;
    finderResult.textContent = `Résultat : ${suggestion}`;
  });
</script>
