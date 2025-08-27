<style>
  .grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:18px}
  .card{background:white;border:1px solid #e5e7eb;border-radius:16px;padding:22px;box-shadow:0 6px 18px rgba(2,8,23,.05)}
  .testimonial{display:flex;gap:14px}
  .avatar{width:44px;height:44px;border-radius:50%;background:#ffe5e5;display:grid;place-items:center;font-weight:800;color:#7a0010}
  @media(max-width:900px){.grid-3{grid-template-columns:1fr}}
</style>

<section id="testimonials">
  <div class="container">
    <h2>Ils nous ont fait confiance</h2>
    <div class="grid-3">
      <div class="card testimonial"><div class="avatar">AK</div><div><strong>Awa, Dakar → Casablanca</strong><p class="muted">« Admission obtenue en 3 semaines grâce à Études-Maroc. »</p></div></div>
      <div class="card testimonial"><div class="avatar">YM</div><div><strong>Yaw, Accra → Rabat</strong><p class="muted">« La session conseil m’a orienté vers des bourses adaptées. »</p></div></div>
      <div class="card testimonial"><div class="avatar">FT</div><div><strong>Fanta, Abidjan → Marrakech</strong><p class="muted">« Dossier suivi facilement, sans stress. »</p></div></div>
    </div>
  </div>
</section>
