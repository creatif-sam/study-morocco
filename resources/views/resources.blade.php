{{-- resources/views/resources.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Études-Maroc — Ressources</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body{margin:0;font-family:Inter,system-ui;background:#fff;color:#0f172a}
    .container{max-width:1100px;margin:auto;padding:0 20px}

    /* Hero */
    .hero-res {
      background: linear-gradient(90deg,#fff4f4,#fff9ef);
      padding:40px 0 20px;
      margin-bottom:30px;
    }
    .hero-res h1{font-size:clamp(26px,4vw,40px);margin:0;font-weight:800}

    .filter { margin-top:12px; }
    .filter select {
      padding:10px 12px;border-radius:6px;border:1px solid #d1d5db;font-size:14px
    }

    /* Featured article */
    .featured {
      display:grid;grid-template-columns:1fr 1fr;gap:20px;align-items:center;
      margin-bottom:40px;
    }
    .featured img { width:100%;border-radius:12px; }
    .featured h2 { font-size:20px;margin:6px 0;font-weight:700 }
    .featured p { font-size:14px;color:#475569; }

    /* Articles grid */
    .articles { display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px; }
    .article {
      border:1px solid #e5e7eb;border-radius:12px;overflow:hidden;background:white;
      box-shadow:0 4px 10px rgba(0,0,0,0.03);transition:box-shadow .2s;
    }
    .article:hover { box-shadow:0 6px 16px rgba(0,0,0,0.08); }
    .article img { width:100%;height:180px;object-fit:cover; }
    .article .content { padding:14px; }
    .article .tags { font-size:12px;color:#C1272D;font-weight:600;margin-bottom:6px; }
    .article h3 { margin:0 0 6px;font-size:16px;font-weight:700; }
    .article p { margin:0;font-size:14px;color:#475569; }
    .article a { text-decoration:none;color:inherit;display:block;height:100% }

    @media(max-width:900px){
      .featured { grid-template-columns:1fr; }
    }
  </style>
</head>
<body>

  @include('partials.nav')

  <section class="hero-res">
    <div class="container">
      <h1>Ressources</h1>
      <div class="filter">
        <select>
          <option>Toutes les ressources</option>
          <option>Admissions</option>
          <option>Vie étudiante</option>
          <option>Santé mentale</option>
          <option>Logement</option>
        </select>
      </div>
    </div>
  </section>

  <main class="container">
    {{-- Featured article --}}
    <div class="featured">
      <img src="/images/resources/featured.jpg" alt="Article vedette">
      <div>
        <div class="tags">Rentrée des classes • Santé mentale • Vie étudiante</div>
        <h2>Votre passage au secondaire a été solitaire ? Voici comment nouer des liens à l’université</h2>
        <p>À mes débuts à l’université, je souhaitais secrètement un nouveau départ. Ce n’est pas que mon passage à l’école secondaire ait été marqué par des drames, simplement, je ne trouvais pas ma place…</p>
      </div>
    </div>

    {{-- Articles grid --}}
    <div class="articles">
      <div class="article">
        <a href="#">
          <img src="/images/resources/colocation.jpg" alt="">
          <div class="content">
            <div class="tags">Logement • Rentrée des classes</div>
            <h3>Petit guide de survie en colocation à l’université</h3>
            <p>La vie en colocation n’est pas toujours facile, mais voici quelques conseils pour bien commencer.</p>
          </div>
        </a>
      </div>
      <div class="article">
        <a href="#">
          <img src="/images/resources/orientation.jpg" alt="">
          <div class="content">
            <div class="tags">Aide aux étudiants étrangers • Rentrée</div>
            <h3>Vous entrez à l’université au Maroc ? Voici à quoi vous attendre pendant l’orientation</h3>
            <p>L’orientation universitaire est une étape clé, découvrez comment bien la vivre.</p>
          </div>
        </a>
      </div>
      <div class="article">
        <a href="#">
          <img src="/images/resources/boussole.jpg" alt="">
          <div class="content">
            <div class="tags">Perfectionnement • Santé mentale</div>
            <h3>À la recherche de votre boussole intérieure ? Voici comment trouver votre voie</h3>
            <p>Un témoignage inspirant sur la recherche de sens à l’université.</p>
          </div>
        </a>
      </div>
    </div>
  </main>

  @include('partials.footer')

</body>
</html>
