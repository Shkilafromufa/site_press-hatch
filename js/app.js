// Navigation
function showPage(pageId) {
  document.querySelectorAll('.page-section').forEach(p => p.classList.remove('active'));
  document.getElementById(pageId).classList.add('active');
  document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
  const active = document.querySelector(`[data-page="${pageId}"]`);
  if (active) active.classList.add('active');
}

function toggleNav() {
  document.getElementById('nav').classList.toggle('open');
}

document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    showPage(link.getAttribute('data-page'));
    document.getElementById('nav').classList.remove('open');
  });
});

// Services
let services = [];

async function loadServices() {
  const res = await fetch('api/services.php');
  services = await res.json();
  const container = document.getElementById('services-container');
  container.innerHTML = '';
  services.forEach((service, index) => {
    const card = document.createElement('div');
    card.className = 'card';
    card.innerHTML = `
    <div class="card-icon-placeholder">${index + 1}</div>
      <h3>${service.name}</h3>
      <p>${service.description}</p>
      <ul>${service.features.map(f => `<li>${f}</li>`).join('')}</ul>
    `;
    container.appendChild(card);
  });
}

function openContacts() {
  document.getElementById('contactPanel').classList.add('open');
}

function closeContacts() {
  document.getElementById('contactPanel').classList.remove('open');
}

document.getElementById('contactForm').addEventListener('submit', function (e) {
  e.preventDefault();
  const formData = new FormData(this);
  alert('Заявка отправлена! Мы свяжемся с вами в течение 24 часов.');
  this.reset();
});

document.addEventListener('DOMContentLoaded', loadServices);

document.addEventListener('click', function (e) {
  const panel = document.getElementById('contactPanel');
  if (panel.classList.contains('open') && !panel.contains(e.target)) {
    closeContacts();
  }
});
