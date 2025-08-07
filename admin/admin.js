let services = [];

async function checkLogin() {
  const res = await fetch('../api/check_login.php');
  const data = await res.json();
  if (data.admin) {
    initAdmin();
  }
}

document.getElementById('loginForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value.trim();
  const res = await fetch('../api/login.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ username, password })
  });
  if (res.ok) {
    initAdmin();
  } else {
    alert('Неверные данные');
  }
});

async function initAdmin() {
  document.getElementById('loginSection').style.display = 'none';
  document.getElementById('adminSection').style.display = 'block';
  await loadServices();
  loadAdminServices();
}

async function loadServices() {
  const res = await fetch('../api/services.php');
  services = await res.json();
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
  const res = await fetch('../api/services.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ name, description, features })
  });
  if (res.ok) {
    document.getElementById('serviceName').value = '';
    document.getElementById('serviceDescription').value = '';
    document.getElementById('serviceFeatures').value = '';
    await loadServices();
    loadAdminServices();
    alert('Услуга добавлена!');
  } else {
    alert('Не удалось сохранить услугу');
  }
}

async function deleteService(id) {
  if (!confirm('Удалить эту услугу?')) return;
  const res = await fetch(`../api/services.php?id=${id}`, { method: 'DELETE' });
  if (res.ok) {
    await loadServices();
    loadAdminServices();
  }
}

document.addEventListener('DOMContentLoaded', checkLogin);
