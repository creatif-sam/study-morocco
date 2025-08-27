{{-- resources/views/components/footer.blade.php --}}
<style>
  footer {
    background: linear-gradient(to top, #fff, #fff5f5);
    padding: 40px 0 20px;
    border-top: 1px solid #e5e7eb;
    color: #0f172a;
    font-size: 14px;
  }
  .footer-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr 1fr;
    gap: 40px;
    align-items: start;
  }
  .footer-col h4 {
    font-weight: 700;
    margin-bottom: 12px;
    font-size: 15px;
  }
  .footer-col a {
    display: block;
    margin-bottom: 8px;
    color: #475569;
    text-decoration: none;
  }
  .footer-col a:hover {
    color: #0f172a;
  }
  .newsletter {
    display: flex;
    gap: 8px;
  }
  .newsletter input {
    flex: 1;
    padding: 10px 12px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
  }
  .newsletter button {
    padding: 10px 16px;
    border-radius: 8px;
    border: none;
    background: black;
    color: white;
    font-weight: 600;
    cursor: pointer;
  }
  .newsletter button:hover {
    background: #333;
  }
  .footer-bottom {
    margin-top: 24px;
    padding-top: 16px;
    border-top: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
  }
  .socials {
    display: flex;
    gap: 12px;
  }
  .socials a {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 16px;
    color: #0f172a;
  }
  .socials a:hover {
    background: #e2e8f0;
  }

  @media(max-width:900px){
    .footer-grid { grid-template-columns: 1fr; gap: 24px; }
    .newsletter { flex-direction: column; }
    .newsletter button { width: 100%; }
  }
</style>

<footer>
  <div class="container">
    <div class="footer-grid">
      {{-- Left: Logo + initiative --}}
      <div class="footer-col">
        <h4>Une initiative de</h4>
        <a href="/" class="brand" style="display:flex;align-items:center;gap:8px;font-weight:800;text-decoration:none;color:#0f172a;">
          <span class="brand-logo">ÉM</span>
          <span>Études-Maroc</span>
        </a>
      </div>

      {{-- Middle: Links --}}
      <div class="footer-col">
        <h4>Études Maroc</h4>
        <a href="#programmes">Programmes</a>
        <a href="#etablissements">Établissements</a>
        <a href="#bourses">Bourses d’études</a>
        <a href="#ressources">Ressources</a>
      </div>

      {{-- Right: Newsletter --}}
      <div class="footer-col">
        <h4>Infolettre</h4>
        <form class="newsletter" onsubmit="event.preventDefault(); alert('Merci pour votre inscription !');">
          <input type="email" placeholder="Entrer votre adresse courriel" required>
          <button type="submit">S’abonner</button>
        </form>
      </div>
    </div>

    {{-- Bottom row --}}
    <div class="footer-bottom">
      <p>© Études-Maroc {{ date('Y') }}. Tous droits réservés.</p>
      <div class="socials">
        <a href="#"><i class="bi bi-linkedin"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-tiktok"></i></a>
      </div>
    </div>
  </div>
</footer>
