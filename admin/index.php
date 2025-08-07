<?php
require __DIR__.'/../api/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ - услуги</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="loginSection" class="admin-login">
        <h2>Вход администратора</h2>
        <form id="loginForm">
            <input type="text" id="username" placeholder="Логин">
            <input type="password" id="password" placeholder="Пароль">
            <button type="submit" class="btn accent">Войти</button>
        </form>
    </div>

    <div id="adminSection" class="admin-content" style="display:none">
        <div class="admin-header">
            <h2>Управление услугами</h2>
        </div>
        <div class="service-form">
            <h3>Добавить новую услугу</h3>
            <input type="text" id="serviceName" placeholder="Название услуги">
            <textarea id="serviceDescription" rows="4" placeholder="Описание услуги"></textarea>
            <textarea id="serviceFeatures" rows="3" placeholder="Особенности (каждая с новой строки)"></textarea>
            <button class="btn accent" onclick="addService()">Добавить услугу</button>
        </div>
        <div class="service-list" id="adminServicesList"></div>
    </div>

    <script src="admin.js"></script>
</body>
</html>
