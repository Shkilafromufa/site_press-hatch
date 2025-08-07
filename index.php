<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПрессФорм - Изготовление и ремонт пресс-форм</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <!-- Header -->
    <header class="site-header">
        <div class="container flex-between">
            <div class="logo">ПрессФорм</div>
            <nav class="site-nav" id="nav">
                <a href="#" data-page="services" class="nav-link active">Наши услуги</a>
                <a href="#" data-page="about" class="nav-link">О компании</a>
                <a href="#" data-page="contacts" class="nav-link">Контакты</a>
            </nav>
            <div class="burger" onclick="toggleNav()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Services Page -->
        <section id="services" class="page-section active">
            <!-- Hero Section -->
            <div class="hero">
                <div class="hero-video-placeholder">
                    [Место для видео цеха]
                </div>
                <div class="overlay"></div>
                <div class="container">
                    <div class="hero-content">
                        <h1>Профессиональное изготовление и ремонт пресс-форм</h1>
                        <p>Более 10 лет опыта, 98% форм запускаются без доработок, расчет за 24 часа</p>
                        <a href="#" class="btn accent" onclick="openPopup()">Связаться с нами</a>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats">
                <div class="container">
                    <div class="stats-grid">
                        <div class="stat">
                            <span class="number">10+</span>
                            <div class="label">лет опыта</div>
                        </div>
                        <div class="stat">
                            <span class="number">98%</span>
                            <div class="label">форм запускаются без доработок</div>
                        </div>
                        <div class="stat">
                            <span class="number">24</span>
                            <div class="label">часа на калькуляцию</div>
                        </div>
                        <div class="stat">
                            <span class="number">500K+</span>
                            <div class="label">циклов гарантии</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="services">
                <div class="container">
                    <h2 class="section-title">Наши услуги</h2>
                    <div class="cards" id="services-container">
                        <!-- Services will be loaded here -->
                    </div>
                </div>
            </div>

            <!-- Process -->
            <div class="process">
                <div class="container">
                    <h2 class="section-title">Пошаговый процесс работы</h2>
                    <ul class="steps">
                        <li>
                            <div class="step-title">Получение ТЗ</div>
                            <p>Анализ чертежей, требований к материалу и объему производства</p>
                        </li>
                        <li>
                            <div class="step-title">3D-моделирование</div>
                            <p>Создание детальной модели в CAD/CAM-среде с расчетом литевых каналов</p>
                        </li>
                        <li>
                            <div class="step-title">Производство</div>
                            <p>Обработка на CNC-станках с многоуровневым контролем качества</p>
                        </li>
                        <li>
                            <div class="step-title">Сборка и тестирование</div>
                            <p>Финишная сборка, полировка и пробные прессования</p>
                        </li>
                        <li>
                            <div class="step-title">Запуск на производстве</div>
                            <p>Установка и наладка формы на оборудовании клиента</p>
                        </li>
                        <li>
                            <div class="step-title">Сопровождение</div>
                            <p>Техническая поддержка в течение всего срока эксплуатации</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Gallery -->
            <div class="gallery">
                <div class="container">
                    <h2 class="section-title">Наши работы</h2>
                    <div class="gallery-slider">
                        <div class="slide">
                            <div class="slide-placeholder">[Фото "до"]</div>
                            <h4>Восстановление пресс-формы</h4>
                            <p>Комплексный ремонт после 300K циклов</p>
                        </div>
                        <div class="slide">
                            <div class="slide-placeholder">[Видео лазерной наплавки]</div>
                            <h4>Лазерная наплавка</h4>
                            <p>Точечное восстановление поврежденных участков</p>
                        </div>
                        <div class="slide">
                            <div class="slide-placeholder">[Фото "после"]</div>
                            <h4>Готовая форма</h4>
                            <p>Результат восстановительных работ</p>
                        </div>
                        <div class="slide">
                            <div class="slide-placeholder">[Фото производственного цеха]</div>
                            <h4>Производственный процесс</h4>
                            <p>CNC-обработка на современном оборудовании</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Band -->
            <div class="cta-band">
                <div class="container">
                    <h3>Готовы обсудить ваш проект?</h3>
                    <p>Получите бесплатный расчет стоимости за 24 часа</p>
                    <a href="#" class="btn secondary" onclick="openPopup()">Отправить заявку</a>
                </div>
            </div>
        </section>

        <!-- About Page -->
        <section id="about" class="page-section">
            <div class="about">
                <div class="container">
                    <h2 class="section-title">О компании</h2>
                    <div class="about-grid">
                        <div>
                            <h3>Кто мы и чем сильны</h3>
                            <p>Мы — команда инженеров-технологов, конструкторов и операторов ЧПУ, которые более десяти лет помогают производителям перейти от эскиза к серийному изделию. Берём на себя полный цикл: проектируем, производим, запускаем форму на площадке клиента, обучаем персонал и сопровождаем изделие весь жизненный цикл.</p>
                            
                            <p>Наша философия — минимизировать время «идея → серия» и поддерживать форму в рабочем состоянии весь срок службы.</p>
                        </div>
                        <div class="about-photo-placeholder">
                            [Фото команды / производства]
                        </div>
                    </div>
                </div>
            </div>

            <div class="resources">
                <div class="container">
                    <h2 class="section-title">Наши ресурсы</h2>
                    <div class="resources-grid">
                        <div class="resource-item">
                            <h4>Технологический парк</h4>
                            <p>5-осевые обрабатывающие центры (X = 1000 мм) и проволочно-вырезные станки до 0,005 мм точности</p>
                        </div>
                        <div class="resource-item">
                            <h4>Лазерные системы</h4>
                            <p>Парк шлифовальных и лазерных систем с ЧПУ для высокоточной обработки</p>
                        </div>
                        <div class="resource-item">
                            <h4>Контроль качества</h4>
                            <p>Отдел контроля качества с координатно-измерительной машиной (CMM) и рентгеноскопией</p>
                        </div>
                        <div class="resource-item">
                            <h4>Материалы</h4>
                            <p>Склад европейских инструментальных сталей и порошковых составов</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats">
                <div class="container">
                    <h2 class="section-title">Наши достижения</h2>
                    <div class="stats-grid">
                        <div class="stat">
                            <span class="number">150+</span>
                            <div class="label">выполненных проектов</div>
                        </div>
                        <div class="stat">
                            <span class="number">50+</span>
                            <div class="label">постоянных клиентов</div>
                        </div>
                        <div class="stat">
                            <span class="number">24/7</span>
                            <div class="label">техническая поддержка</div>
                        </div>
                        <div class="stat">
                            <span class="number">5</span>
                            <div class="label">недель срок изготовления</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contacts Page -->
        <section id="contacts" class="page-section">
            <div class="contacts">
                <div class="container">
                    <h2 class="section-title">Наши контакты</h2>
                    <div class="contact-grid">
                        <div class="contact-info">
                            <h3>Свяжитесь с нами</h3>
                            
                            <div class="contact-item">
                                <strong>Телефон:</strong>
                                <p>+7 ___ --_</p>
                            </div>
                            
                            <div class="contact-item">
                                <strong>Email:</strong>
                                <p>)_______.ru</p>
                            </div>
                            
                            <div class="contact-item">
                                <strong>Производственный участок:</strong>
                                <p>___, ___, ___</p>
                            </div>
                            
                            <div class="contact-item">
                                <strong>График работы:</strong>
                                <p>Пн-Пт 09:00-18:00 (UTC+5, Уфа)</p>
                            </div>
                            
                            <div class="contact-item">
                                <strong>Мессенджеры:</strong>
                                <p>WhatsApp или Telegram @_______</p>
                                <p><em>Прикрепите 3D-модель для ускоренного расчёта</em></p>
                            </div>
                        </div>

                        <div>
                            <h3>Получить расчёт за 24 часа</h3>
                            <form class="contact-form" id="contactForm">
                                <input type="text" name="name" placeholder="Ваше имя" required>
                                <input type="tel" name="phone" placeholder="Телефон" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <textarea name="message" rows="5" placeholder="Сообщение" required></textarea>
                                <label class="file-label">
                                    📎 Прикрепить файл (3D-модель, чертежи)
                                    <input type="file" name="file" accept=".dwg,.step,.igs,.pdf">
                                </label>
                                <button type="submit" class="btn accent">Связаться с нами</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-flex">
                <div>
                    <p>&copy; 2025. Все права защищены.</p>
                </div>
                <div>
                    <a href="#" class="btn footer-call">Быстрый звонок</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Admin Toggle Button -->
    <button class="admin-toggle" id="adminToggle" onclick="toggleAdmin()">⚙️</button>
    
    <!-- Admin Panel -->
    <div class="admin-panel" id="adminPanel">
        <div class="admin-content">
            <div class="admin-header">
                <h2>Управление услугами</h2>
                <button class="close-admin" onclick="closeAdmin()">✕</button>
            </div>
            
            <div class="service-form">
                <h3>Добавить новую услугу</h3>
                <input type="text" id="serviceName" placeholder="Название услуги">
                <textarea id="serviceDescription" rows="4" placeholder="Описание услуги"></textarea>
                <textarea id="serviceFeatures" rows="3" placeholder="Особенности (каждая с новой строки)"></textarea>
                <button class="btn accent" onclick="addService()">Добавить услугу</button>
            </div>
            
            <div class="service-list" id="adminServicesList">
                <!-- Admin services list will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Popup -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <button class="popup-close" onclick="closePopup()">&times;</button>
            <h3>Связаться с нами</h3>
            <p>Заполните форму в разделе "Контакты" или свяжитесь с нами по телефону</p>
            <a href="#" class="btn accent" onclick="closePopup(); showPage('contacts')">Перейти к форме</a>
        </div>
    </div>

    
    <script src="js/app.js"></script>
</body>
</html>