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
  const res = await fetch('service.php?action=list');
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

function openAdmin() {
  document.getElementById('adminPanel').classList.add('open');
  loadAdminServices();
}

function closeAdmin() {
  document.getElementById('adminPanel').classList.remove('open');
}

function loadAdminServices() {
  const container = document.getElementById('adminServicesList');
  container.innerHTML = '';
  services.forEach(service => {
    const item = document.createElement('div');
    item.className = 'service-item';
    item.innerHTML = `
      <h4>${service.name}</h4>
      <p>${service.description}</p>
      <div class="service-actions">
        <button class="btn btn-small btn-danger" onclick="deleteService(${service.id})">Удалить</button>
      </div>
    `;
    container.appendChild(item);
  });
}

async function addService() {
  const name = document.getElementById('serviceName').value.trim();
  const description = document.getElementById('serviceDescription').value.trim();
  const featuresText = document.getElementById('serviceFeatures').value;
  if (!name || !description) {
    alert('Заполните все поля');
    return;
  }
  const features = featuresText.split('\n').map(f => f.trim()).filter(Boolean);
  const res = await fetch('service.php?action=add', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ name, description, features })
  });
  if (!res.ok) {
    alert('Не удалось сохранить услугу');
    return;
  }
  document.getElementById('serviceName').value = '';
  document.getElementById('serviceDescription').value = '';
  document.getElementById('serviceFeatures').value = '';
  await loadServices();
  loadAdminServices();
  alert('Услуга добавлена!');
}

async function deleteService(id) {
  if (!confirm('Удалить эту услугу?')) return;
  const res = await fetch(`service.php?action=delete&id=${id}`, { method: 'DELETE' });
  if (res.ok) {
    await loadServices();
    loadAdminServices();
  }
}

// Popup
function openPopup() {
  document.getElementById('popup').classList.add('open');
}

function closePopup() {
  document.getElementById('popup').classList.remove('open');
}

function openLoginPopup() {
  document.getElementById('loginPopup').classList.add('open');
}

function closeLoginPopup() {
  document.getElementById('loginPopup').classList.remove('open');
}

async function login() {
  const username = document.getElementById('loginUsername').value.trim();
  const password = document.getElementById('loginPassword').value;
  const res = await fetch('service.php?action=login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ username, password })
  });
  if (res.ok) {
    closeLoginPopup();
    openAdmin();
  } else {
    alert('Неверные данные');
  }
}

setTimeout(openPopup, 45000);

document.addEventListener('DOMContentLoaded', () => {
  loadServices();
  document.getElementById('adminTrigger').addEventListener('click', async () => {
    const status = await fetch('service.php?action=check').then(r => r.json());
    if (status.admin) {
      openAdmin();
    } else {
      openLoginPopup();
    }
  });
  document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Заявка отправлена! Мы свяжемся с вами в течение 24 часов.');
    this.reset();
  });
});

document.getElementById('popup').addEventListener('click', function (e) {
  if (e.target === this) closePopup();
});

document.getElementById('loginPopup').addEventListener('click', function (e) {
  if (e.target === this) closeLoginPopup();
});

document.addEventListener('click', function (e) {
  const panel = document.getElementById('adminPanel');
  if (panel.classList.contains('open') && !panel.contains(e.target)) {
    closeAdmin();
  }
});
