/******/ (() => { // webpackBootstrap
/*!*********************************!*\
  !*** ./resources/js/landing.js ***!
  \*********************************/
// ----- Menu mobile
var menuBtn = document.getElementById('menuBtn');
var navLinks = document.getElementById('navLinks');
menuBtn === null || menuBtn === void 0 || menuBtn.addEventListener('click', function () {
  var isOpen = navLinks.style.display === 'flex';
  navLinks.style.display = isOpen ? 'none' : 'flex';
  if (!isOpen) {
    navLinks.style.flexDirection = 'column';
    navLinks.style.gap = '14px';
  }
});

// ----- Finder (démo)
var finderForm = document.getElementById('finderForm');
var finderResult = document.getElementById('finderResult');
finderForm === null || finderForm === void 0 || finderForm.addEventListener('submit', function (e) {
  e.preventDefault();
  var level = document.getElementById('level').value;
  var domain = document.getElementById('domain').value;
  var budget = Number(document.getElementById('budget').value || 0);
  var city = document.getElementById('city').value;
  if (!level || !domain || !budget) {
    finderResult.textContent = 'Veuillez compléter tous les champs requis.';
    return;
  }
  var suggestion = 'Plusieurs options disponibles';
  if (budget < 2500) suggestion = 'Cherchez des bourses et des programmes à faibles frais.';
  if (domain.includes('Info')) suggestion = 'Excellentes options en Informatique à Rabat et Casablanca.';
  if (city !== 'Peu importe') suggestion += " \u2014 Essayez ".concat(city, ".");
  finderResult.textContent = "R\xE9sultat : ".concat(suggestion);
});

// ----- Formulaire de contact (démo)
var contactForm = document.getElementById('contactForm');
var contactStatus = document.getElementById('contactStatus');
contactForm === null || contactForm === void 0 || contactForm.addEventListener('submit', function (e) {
  e.preventDefault();
  var name = document.getElementById('name').value.trim();
  var email = document.getElementById('email').value.trim();
  var level2 = document.getElementById('level2').value;
  if (!name || !email || !level2) {
    contactStatus.textContent = 'Veuillez compléter les champs requis.';
    return;
  }
  contactStatus.innerHTML = '✅ Merci, ' + name + ' ! Votre demande a bien été enregistrée. Réponse sous 24h.';
  contactForm.reset();
});

// ----- Calculateur simple
var calcBtn = document.getElementById('calcBtn');
var total = document.getElementById('total');
calcBtn === null || calcBtn === void 0 || calcBtn.addEventListener('click', function () {
  var t = Number(document.getElementById('tuition').value || 0);
  var l = Number(document.getElementById('living').value || 0);
  var o = Number(document.getElementById('other').value || 0);
  var sum = t + l + o;
  total.innerHTML = "<strong>Total :</strong> \u20AC ".concat(sum.toLocaleString('fr-FR'));
});

// ----- Année de pied de page
document.getElementById('year').textContent = new Date().getFullYear();

// =====================
// Auth (localStorage demo)
// =====================
var authBtn = document.getElementById('authBtn');
var userMenu = document.getElementById('userMenu');
var userFirst = document.getElementById('userFirst');
var logoutBtn = document.getElementById('logoutBtn');
var navDashboard = document.getElementById('navDashboard');
var ctaApply = document.getElementById('ctaApply');
var dash = document.getElementById('dashboard');
var dashName = document.getElementById('dashName');
var dashEmail = document.getElementById('dashEmail');

// Modal elements
var authModal = document.getElementById('authModal');
var authClose = document.getElementById('authClose');
var tabSignup = document.getElementById('tabSignup');
var tabLogin = document.getElementById('tabLogin');
var signupForm = document.getElementById('signupForm');
var loginForm = document.getElementById('loginForm');
var signupMsg = document.getElementById('signupMsg');
var loginMsg = document.getElementById('loginMsg');

// Helpers
var show = function show(el) {
  return el.classList.remove('hidden');
};
var hide = function hide(el) {
  return el.classList.add('hidden');
};
var openModal = function openModal() {
  var tab = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'signup';
  authModal.style.display = 'flex';
  if (tab === 'signup') {
    show(signupForm);
    hide(loginForm);
    tabSignup.className = 'btn btn-outline';
    tabLogin.className = 'btn btn-ghost';
  } else {
    show(loginForm);
    hide(signupForm);
    tabLogin.className = 'btn btn-outline';
    tabSignup.className = 'btn btn-ghost';
  }
  signupMsg.textContent = '';
  loginMsg.textContent = '';
};
var closeModal = function closeModal() {
  return authModal.style.display = 'none';
};
var loadUser = function loadUser() {
  var raw = localStorage.getItem('em_user');
  return raw ? JSON.parse(raw) : null;
};
var saveUser = function saveUser(u) {
  return localStorage.setItem('em_user', JSON.stringify(u));
};
var clearUser = function clearUser() {
  return localStorage.removeItem('em_user');
};
var refreshAuthUI = function refreshAuthUI() {
  var user = loadUser();
  if (user) {
    hide(authBtn);
    show(userMenu);
    show(navDashboard);
    show(dash);
    userFirst.textContent = user.firstName;
    dashName.textContent = user.firstName + ' ' + user.lastName;
    dashEmail.textContent = user.email;
    ctaApply.textContent = 'Mon espace candidat';
  } else {
    show(authBtn);
    hide(userMenu);
    hide(navDashboard);
    hide(dash);
    ctaApply.textContent = 'Candidater / Réserver un appel';
  }
};

// Init
refreshAuthUI();

// Button handlers
authBtn === null || authBtn === void 0 || authBtn.addEventListener('click', function () {
  return openModal('login');
});
authClose === null || authClose === void 0 || authClose.addEventListener('click', closeModal);
authModal === null || authModal === void 0 || authModal.addEventListener('click', function (e) {
  if (e.target === authModal) closeModal();
});
tabSignup === null || tabSignup === void 0 || tabSignup.addEventListener('click', function () {
  return openModal('signup');
});
tabLogin === null || tabLogin === void 0 || tabLogin.addEventListener('click', function () {
  return openModal('login');
});

// Signup
signupForm === null || signupForm === void 0 || signupForm.addEventListener('submit', function (e) {
  e.preventDefault();
  var firstName = document.getElementById('firstName').value.trim();
  var lastName = document.getElementById('lastName').value.trim();
  var email = document.getElementById('signupEmail').value.trim().toLowerCase();
  var pwd = document.getElementById('signupPwd').value;
  if (pwd.length < 6) {
    signupMsg.textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
    return;
  }
  // Demo: store a single user in localStorage. In prod, call your API.
  var user = {
    firstName: firstName,
    lastName: lastName,
    email: email,
    pwdHash: btoa(pwd)
  };
  saveUser(user);
  signupMsg.textContent = '✅ Compte créé. Connexion automatique...';
  setTimeout(function () {
    closeModal();
    refreshAuthUI();
  }, 700);
});

// Login
loginForm === null || loginForm === void 0 || loginForm.addEventListener('submit', function (e) {
  e.preventDefault();
  var email = document.getElementById('loginEmail').value.trim().toLowerCase();
  var pwd = document.getElementById('loginPwd').value;
  var user = loadUser();
  if (!user || user.email !== email || user.pwdHash !== btoa(pwd)) {
    loginMsg.textContent = 'Identifiants invalides. Astuce : créez un compte si c’est votre première fois.';
    return;
  }
  loginMsg.textContent = '✅ Connecté.';
  setTimeout(function () {
    closeModal();
    refreshAuthUI();
  }, 500);
});

// Logout
logoutBtn === null || logoutBtn === void 0 || logoutBtn.addEventListener('click', function () {
  clearUser();
  refreshAuthUI();
});

// Guard: redirect “Espace candidat” if not logged
document.querySelectorAll('a[href="#dashboard"]').forEach(function (a) {
  a.addEventListener('click', function (e) {
    if (!loadUser()) {
      e.preventDefault();
      openModal('login');
    }
  });
});
/******/ })()
;