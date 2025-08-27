<style>
  .contact-wrap{display:grid;grid-template-columns:1.1fr .9fr;gap:24px}
  .hero-card{background:white;border:1px solid #e5e7eb;border-radius:18px;padding:18px;box-shadow:0 6px 18px rgba(2,8,23,.06)}
  .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
  .field{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
  .input{padding:12px;border-radius:10px;border:1px solid #d1d5db;background:#fff}
  .btn{padding:10px 14px;border-radius:12px;font-weight:700;cursor:pointer;text-decoration:none}
  .btn-primary{background:#C1272D;color:white}
  .btn-outline{border:1px solid #006233;color:#006233;background:white}
  .muted{color:#475569;font-size:14px}
</style>

<section id="contact">
  <div class="container contact-wrap">
    <div>
      <h2>Prêt à commencer ?</h2>
      <p class="muted">Parlez-nous de vos objectifs. Réponse sous 24h.</p>
      <form id="contactForm" class="hero-card">
        <div class="row">
          <div class="field"><label>Nom complet</label><input id="name" class="input" required></div>
          <div class="field"><label>Email</label><input id="email" class="input" type="email" required></div>
        </div>
        <div class="row">
          <div class="field"><label>WhatsApp</label><input id="whatsapp" class="input" type="tel"></div>
          <div class="field"><label>Niveau visé</label><select id="level2" required><option value="">Choisir</option><option>Licence</option><option>Master</option><option>Ingénierie</option></select></div>
        </div>
        <div class="field"><label>Message</label><textarea id="message" class="input"></textarea></div>
        <button class="btn btn-primary" type="submit">Envoyer</button>
        <p id="contactStatus" class="muted" style="margin-top:8px"></p>
      </form>
    </div>
    <div class="hero-card">
      <h3>Estimez vos coûts annuels</h3>
      <div class="row">
        <div class="field"><label>Frais (€)</label><input id="tuition" class="input" type="number"></div>
        <div class="field"><label>Vie (€)</label><input id="living" class="input" type="number"></div>
      </div>
      <div class="row">
        <div class="field"><label>Autres (€)</label><input id="other" class="input" type="number"></div>
        <div class="field"><label>&nbsp;</label><button class="btn btn-outline" id="calcBtn" type="button">Calculer</button></div>
      </div>
      <p id="total" class="muted"><strong>Total :</strong> —</p>
    </div>
  </div>
</section>

<script>
  // Contact form demo
  const contactForm=document.getElementById('contactForm');
  const contactStatus=document.getElementById('contactStatus');
  contactForm?.addEventListener('submit',(e)=>{
    e.preventDefault();
    const name=document.getElementById('name').value.trim();
    const email=document.getElementById('email').value.trim();
    const level2=document.getElementById('level2').value;
    if(!name||!email||!level2){
      contactStatus.textContent='Veuillez compléter les champs requis.'; return;
    }
    contactStatus.innerHTML='✅ Merci, '+name+' ! Votre demande a bien été enregistrée.';
    contactForm.reset();
  });

  // Calculator
  const calcBtn=document.getElementById('calcBtn');
  const total=document.getElementById('total');
  calcBtn?.addEventListener('click',()=>{
    const t=Number(document.getElementById('tuition').value||0);
    const l=Number(document.getElementById('living').value||0);
    const o=Number(document.getElementById('other').value||0);
    total.innerHTML=`<strong>Total :</strong> € ${(t+l+o).toLocaleString('fr-FR')}`;
  });
</script>
