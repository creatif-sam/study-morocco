@extends('layouts.guest')

@section('title', 'Études‑Maroc — Étudier au Maroc')
@section('description', 'Études‑Maroc accompagne les étudiants étrangers pour candidater aux universités privées marocaines : rechercher des programmes, postuler et réserver une consultation.')

@section('content')
<div class="container nav">
    <a class="brand" href="#top">
        <span class="brand-logo">ÉM</span>
        <span>Études‑Maroc</span>
    </a>
    <nav class="nav-links" id="navLinks">
        <a href="#features">Points forts</a>
        <a href="#how">Processus</a>
        <a href="#dashboard" id="navDashboard" class="hidden">Espace candidat</a>
        <a href="#testimonials">Témoignages</a>
        <a href="#faq">FAQ</a>
        <a href="#contact" class="btn btn-outline">Réserver une consultation</a>
        <button id="authBtn" class="btn btn-ghost">Se connecter</button>
        <div id="userMenu" class="hidden" style="display:flex;align-items:center;gap:8px">
            <span class="muted">Bonjour, <b id="userFirst"></b></span>
            <button id="logoutBtn" class="btn btn-outline">Déconnexion</button>
        </div>
    </nav>
    <button class="btn btn-outline menu-btn" id="menuBtn" aria-label="Ouvrir le menu">☰</button>
</div>

<main id="top">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-wrap">
            <div>
                <span class="kicker">Étudier au Maroc en toute confiance</span>
                <h1>Votre passerelle vers les universités privées marocaines</h1>
                <p class="lead">Études‑Maroc aide les étudiants étrangers — surtout d’Afrique francophone — à découvrir des programmes, candidater facilement et recevoir des conseils d’experts, de l’admission à l’arrivée.</p>
                <div style="display:flex;gap:12px;margin-top:16px;flex-wrap:wrap">
                    <a class="btn btn-primary" href="#dashboard" id="ctaApply">Candidater / Réserver un appel</a>
                    <a class="btn btn-outline" href="#features">Découvrir</a>
                </div>
                <p class="muted" style="margin-top:10px">Bilingue : Français • Anglais</p>
            </div>
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

    <!-- Features Section -->
    <section id="features">
        <div class="container">
            <span class="pill">Pourquoi Études‑Maroc</span>
            <h2>Tous les outils pour réussir</h2>
            <p class="muted">De la découverte à la décision, nous simplifions l’admission des étudiants internationaux.</p>
            <div class="grid-3" style="margin-top:18px">
                <div class="card">
                    <div class="icon">🎓</div>
                    <h3>Programmes & Universités</h3>
                    <p>Parcourez des universités privées sélectionnées avec critères d’admission et frais détaillés.</p>
                </div>
                <div class="card">
                    <div class="icon">📄</div>
                    <h3>Candidature en ligne</h3>
                    <p>Soumettez vos documents et suivez l’avancement de votre dossier en temps réel.</p>
                </div>
                <div class="card">
                    <div class="icon">🤝</div>
                    <h3>Consultations</h3>
                    <p>Réservez un entretien pour affiner vos choix, votre budget et vos démarches visa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How Section -->
    <section id="how" style="background:#fff5f5">
        <div class="container">
            <h2>Comment ça marche</h2>
            <div class="steps" style="margin-top:14px">
                <div class="step"><strong>1. Découvrir</strong><p>Explorez des programmes adaptés à vos objectifs, budget et préférences.</p></div>
                <div class="step"><strong>2. Postuler</strong><p>Téléversez vos documents une fois, nous transmettons aux écoles partenaires.</p></div>
                <div class="step"><strong>3. Consulter</strong><p>Rencontrez un conseiller pour affiner bourses et calendrier.</p></div>
                <div class="step"><strong>4. Arriver</strong><p>Bénéficiez d’un accompagnement logement et intégration.</p></div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials">
        <div class="container">
            <h2>Ils nous ont fait confiance</h2>
            <div class="grid-3" style="margin-top:18px">
                <div class="card testimonial"><div class="avatar">AK</div><div><strong>Awa, Dakar → Casablanca</strong><p class="muted">« Admission obtenue en 3 semaines grâce à Études‑Maroc. »</p></div></div>
                <div class="card testimonial"><div class="avatar">YM</div><div><strong>Yaw, Accra → Rabat</strong><p class="muted">« La session conseil m’a orienté vers des bourses adaptées. »</p></div></div>
                <div class="card testimonial"><div class="avatar">FT</div><div><strong>Fanta, Abidjan → Marrakech</strong><p class="muted">« Dossier suivi facilement, sans stress. »</p></div></div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" style="background:#fff5f5">
        <div class="container">
            <h2>Questions fréquentes</h2>
            <details><summary>Proposez‑vous l’anglais et le français ?</summary><p>Oui, notre plateforme et nos conseillers sont bilingues.</p></details>
            <details><summary>Quels documents fournir ?</summary><p>Passeport, relevés/diplômes, attestation linguistique si nécessaire, CV. Varie selon le programme.</p></details>
            <details><summary>Y a‑t‑il des bourses ?</summary><p>Certaines universités privées proposent des bourses partielles. Nous identifions les options selon votre profil.</p></details>
        </div>
    </section>

    <!-- Espace candidat (protégé par login) -->
    <section id="dashboard" class="hidden" style="background:#f8fff9">
        <div class="container">
            <h2>Espace candidat</h2>
            <div class="card">
                <p class="muted">Bienvenue <b id="dashName"></b> ! Ici, vous pourrez suivre vos candidatures (démo).</p>
                <ul>
                    <li>Profil : <span id="dashEmail" class="muted"></span></li>
                    <li>Statut dossier : <b>À compléter</b></li>
                </ul>
                <button class="btn btn-primary" type="button" onclick="alert('Démo : à connecter à votre API / base de données.')">Commencer ma candidature</button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container contact-wrap">
            <div>
                <h2>Prêt à commencer ?</h2>
                <p class="muted">Parlez‑nous de vos objectifs. Réponse sous 24h avec étapes suivantes et lien de réservation.</p>
                <form id="contactForm" class="hero-card">
                    <div class="row">
                        <div class="field"><label for="name">Nom complet</label><input id="name" class="input" required></div>
                        <div class="field"><label for="email">Email</label><input id="email" class="input" type="email" required></div>
                    </div>
                    <div class="row">
                        <div class="field"><label for="whatsapp">WhatsApp (optionnel)</label><input id="whatsapp" class="input" type="tel"></div>
                        <div class="field"><label for="level2">Niveau visé</label><select id="level2" required><option value="">Choisir</option><option>Licence / Bachelor</option><option>Master</option><option>Ingénierie</option></select></div>
                    </div>
                    <div class="field"><label for="message">Message</label><textarea id="message" class="input" placeholder="Programme, budget, ville..."></textarea></div>
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                    <a class="btn btn-outline" style="margin-left:8px" href="https://wa.me/212644063877" target="_blank">WhatsApp</a>
                    <p id="contactStatus" class="muted" style="margin-top:8px"></p>
                </form>
            </div>
            <div class="card">
                <h3>Estimez vos coûts annuels</h3>
                <div class="row"><div class="field"><label for="tuition">Frais de scolarité (€)</label><input id="tuition" class="input" type="number"></div><div class="field"><label for="living">Vie (€)</label><input id="living" class="input" type="number"></div></div>
                <div class="row"><div class="field"><label for="other">Autres (€)</label><input id="other" class="input" type="number"></div><div class="field"><label>&nbsp;</label><button class="btn btn-outline" id="calcBtn" type="button">Calculer</button></div></div>
                <p id="total" class="muted"><strong>Total :</strong> —</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container" style="display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap">
        <p>© <span id="year"></span> Études‑Maroc. Tous droits réservés.</p>
        <p>Fait avec <span aria-label="amour">❤️</span> • <a href="#top" class="muted" style="text-decoration:none">Haut de page</a></p>
    </div>
</footer>

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ mix('css/landing.css') }}">
<script src="{{ mix('js/landing.js') }}"></script>
@endsection
