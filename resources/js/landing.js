// ----- Menu mobile
const menuBtn = document.getElementById('menuBtn');
const navLinks = document.getElementById('navLinks');
menuBtn?.addEventListener('click', () => {
  const isOpen = navLinks.style.display === 'flex';
  navLinks.style.display = isOpen ? 'none' : 'flex';
  if(!isOpen){ navLinks.style.flexDirection = 'column'; navLinks.style.gap = '14px'; }
});

// ----- Finder (démo)
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

// ----- Formulaire de contact (démo)
const contactForm = document.getElementById('contactForm');
const contactStatus = document.getElementById('contactStatus');
contactForm?.addEventListener('submit', (e)=>{
  e.preventDefault();
  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const level2 = document.getElementById('level2').value;
  if(!name || !email || !level2){
    contactStatus.textContent = 'Veuillez compléter les champs requis.';
    return;
  }
  contactStatus.innerHTML = '✅ Merci, '+name+' ! Votre demande a bien été enregistrée. Réponse sous 24h.';
  contactForm.reset();
});

// ----- Calculateur simple
const calcBtn = document.getElementById('calcBtn');
const total = document.getElementById('total');
calcBtn?.addEventListener('click', ()=>{
  const t = Number(document.getElementById('tuition').value||0);
  const l = Number(document.getElementById('living').value||0);
  const o = Number(document.getElementById('other').value||0);
  const sum = t + l + o;
  total.innerHTML = `<strong>Total :</strong> € ${sum.toLocaleString('fr-FR')}`;
});

// ----- Année de pied de page
document.getElementById('year').textContent = new Date().getFullYear();

// =====================
// Auth (localStorage demo)
// =====================
const authBtn   = document.getElementById('authBtn');
const userMenu  = document.getElementById('userMenu');
const userFirst = document.getElementById('userFirst');
const logoutBtn = document.getElementById('logoutBtn');
const navDashboard = document.getElementById('navDashboard');
const ctaApply = document.getElementById('ctaApply');
const dash = document.getElementById('dashboard');
const dashName = document.getElementById('dashName');
const dashEmail = document.getElementById('dashEmail');

// Modal elements
const authModal = document.getElementById('authModal');
const authClose = document.getElementById('authClose');
const tabSignup = document.getElementById('tabSignup');
const tabLogin  = document.getElementById('tabLogin');
const signupForm = document.getElementById('signupForm');
const loginForm  = document.getElementById('loginForm');
const signupMsg  = document.getElementById('signupMsg');
const loginMsg   = document.getElementById('loginMsg');

// Helpers
const show = el => el.classList.remove('hidden');
const hide = el => el.classList.add('hidden');
const openModal = (tab='signup') => {
  authModal.style.display = 'flex';
  if(tab==='signup'){ show(signupForm); hide(loginForm); tabSignup.className='btn btn-outline'; tabLogin.className='btn btn-ghost'; }
  else{ show(loginForm); hide(signupForm); tabLogin.className='btn btn-outline'; tabSignup.className='btn btn-ghost'; }
  signupMsg.textContent=''; loginMsg.textContent='';
};
const closeModal = () => authModal.style.display = 'none';

const loadUser = () => {
  const raw = localStorage.getItem('em_user');
  return raw ? JSON.parse(raw) : null;
};
const saveUser = (u) => localStorage.setItem('em_user', JSON.stringify(u));
const clearUser = () => localStorage.removeItem('em_user');

const refreshAuthUI = () => {
  const user = loadUser();
  if(user){
    hide(authBtn); show(userMenu); show(navDashboard); show(dash);
    userFirst.textContent = user.firstName;
    dashName.textContent = user.firstName + ' ' + user.lastName;
    dashEmail.textContent = user.email;
    ctaApply.textContent = 'Mon espace candidat';
  }else{
    show(authBtn); hide(userMenu); hide(navDashboard); hide(dash);
    ctaApply.textContent = 'Candidater / Réserver un appel';
  }
};

// Init
refreshAuthUI();

// Button handlers
authBtn?.addEventListener('click', ()=> openModal('login'));
authClose?.addEventListener('click', closeModal);
authModal?.addEventListener('click', (e)=>{ if(e.target===authModal) closeModal(); });
tabSignup?.addEventListener('click', ()=> openModal('signup'));
tabLogin?.addEventListener('click', ()=> openModal('login'));

// Signup
signupForm?.addEventListener('submit', (e)=>{
  e.preventDefault();
  const firstName = document.getElementById('firstName').value.trim();
  const lastName  = document.getElementById('lastName').value.trim();
  const email     = document.getElementById('signupEmail').value.trim().toLowerCase();
  const pwd       = document.getElementById('signupPwd').value;
  if(pwd.length < 6){ signupMsg.textContent = 'Le mot de passe doit contenir au moins 6 caractères.'; return; }
  // Demo: store a single user in localStorage. In prod, call your API.
  const user = { firstName, lastName, email, pwdHash: btoa(pwd) };
  saveUser(user);
  signupMsg.textContent = '✅ Compte créé. Connexion automatique...';
  setTimeout(()=>{ closeModal(); refreshAuthUI(); }, 700);
});

// Login
loginForm?.addEventListener('submit', (e)=>{
  e.preventDefault();
  const email = document.getElementById('loginEmail').value.trim().toLowerCase();
  const pwd   = document.getElementById('loginPwd').value;
  const user  = loadUser();
  if(!user || user.email !== email || user.pwdHash !== btoa(pwd)){
    loginMsg.textContent = 'Identifiants invalides. Astuce : créez un compte si c’est votre première fois.';
    return;
  }
  loginMsg.textContent = '✅ Connecté.';
  setTimeout(()=>{ closeModal(); refreshAuthUI(); }, 500);
});

// Logout
logoutBtn?.addEventListener('click', ()=>{
  clearUser();
  refreshAuthUI();
});

// Guard: redirect “Espace candidat” if not logged
document.querySelectorAll('a[href="#dashboard"]').forEach(a=>{
  a.addEventListener('click', (e)=>{
    if(!loadUser()){ e.preventDefault(); openModal('login'); }
  });
});
