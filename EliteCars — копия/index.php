<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteCars</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        $isLoggedIn = isset($_COOKIE['login']);
        if ($isLoggedIn) {
            $login = $_COOKIE['login'];
            $conn = new mysqli("localhost", "root", "", "cars");

            if ($conn->connect_error) {
                die("Ошибка подключения: " . $conn->connect_error);
            }

            // Получаем путь к аватарке
            $stmt = $conn->prepare("SELECT avatar FROM client WHERE login = ?");
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $avatar = $user['avatar'] ?? 'default-avatar.png'; // Устанавливаем аватар по умолчанию, если он отсутствует
            $stmt->close();
            $conn->close();
        }
    ?>

    <header>
        <h1>EliteCars</h1>
        <div class="hide-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="#home">Главная</a></li>
                <li><a href="#catalog">Каталог</a></li>
                <li><a href="#about">О нас</a></li>
                <li><a href="#contact">Контакты</a></li>
                <?php if ($isLoggedIn): ?>
                    <li class="login-container">
                        <a href="#" class="login"><?php echo htmlspecialchars($login); ?></a>
                        <div class="popup">
                            <img src="/image/<?php echo htmlspecialchars($avatar); ?>" alt="Аватарка" class="avat">
                            <a href="account/account.php">Аккаунт</a>
                            <a href="settings.php">Настройки</a>
                        </div>
                    </li>

                <?php else: ?>
                    <li><a href="sign/sign.php" class="sign">Войти</a></li>
                <?php endif; ?>  
            </ul>
        </nav>
    </header>


    <section id="home">
        <div class="hero">
            <div class="cont">
                <h2 class="luxury">Роскошь, которую вы заслуживаете</h2>
            </div>
            <div class="cont" style="margin-top: 10px;">
                <p class="best">Лучшие автомобили класса люкс для истинных ценителей.</p>
            </div>
                
        </div>
    </section>
    <div class="btn-up btn-up_hide"></div>
    <section id="catalog">
        <h2>Наши автомобили</h2>
        <div class="car-list">
            <!--Rolls-Royce Phantom-->
            <div class="car-item">
                <div class="car-hide">
                    <p>Rolls-Royce Phantom — это вершина автомобильной роскоши, символ абсолютного статуса и безупречного стиля. </p>
                    <p>Под капотом этого величественного седана скрывается мощный V12 двигатель, который обеспечивает плавную и практически бесшумную езду. </p>
                    <p>Интерьер Phantom выполнен на заказ с использованием самых редких и дорогих материалов: ручная отделка кожей, дерево высшего качества</p>
                    <p>Rolls-Royce Phantom — это автомобиль для тех, кто стремится к совершенству во всем и ценит безупречное внимание к деталям.</p>
                </div>
                <img src="img/car1.jpg" alt="Rolls-Royce Phantom">
                <div class="car-details">
                    <h3>Rolls-Royce Phantom</h3>
                    <p>Цена: 45 000 000 руб.</p>
                </div>
            </div>
            <!--Bentley Continental GT -->
            <div class="car-item">
                <div class="car-hide">
                    <p>Bentley Continental GT — это роскошное купе, которое сочетает в себе изысканный стиль и непревзойденную мощность.</p>
                    <p>Под капотом скрывается мощный двигатель W12, который позволяет разгоняться до 100 км/ч всего за 3,7 секунды.</p>
                    <p>Интерьер автомобиля выполнен с использованием лучших материалов: натуральной кожи, дерева и металла.</p>
                    <p>Каждая деталь салона проработана вручную, что подчеркивает статус владельца. </p>
                    <p>Bentley Continental GT — это выбор тех, кто ценит престиж, скорость и комфорт на высшем уровне.</p>
                </div>
                <img src="img/car2.jpg" alt="Bentley Continental GT">
                <div class="car-details">
                    <h3>Bentley Continental GT</h3>
                    <p>Цена: 35 000 000 руб.</p>
                </div>
            </div>
            <!--Mercedes-Benz S-Class -->
            <div class="car-item">
                <div class="car-hide">
                    <p>Mercedes-Benz S-Class — эталон комфорта и инноваций в мире представительских автомобилей. </p>
                    <p>Модель оснащена передовыми технологиями, включая систему автономного вождения</p>
                    <p>Внутри автомобиля царит атмосфера роскоши: премиальные материалы, панорамная крыша</p>
                    <p>Подвеска обеспечивает плавный ход даже на самых сложных дорогах.</p>
                    <p>Mercedes-Benz S-Class — это идеальное сочетание элегантности, безопасности и передовых технологий.</p>
                </div>
                <img src="img/car3.jpeg" alt="Rolls-Royce Phantom">
                <div class="car-details">
                    <h3>Mercedes-Benz S-Class</h3>
                    <p>Цена: 18 000 000 руб.</p>
                </div>
            </div>
        </div>
        <div class="car-list">
            <!--BMW I8-->
            <div class="car-item">
                <div class="car-hide">
                    <p>BMW i8 — инновационный спортивный автомобиль с гибридной установкой, который объединяет в себе экологичность и высокую производительность.</p>
                    <p>Его футуристический дизайн с эффектными дверями-крыльями выделяется на дорогах</p>
                    <p>Силовая установка сочетает электрический двигатель и бензиновый мотор, что обеспечивает впечатляющую динамику</p>
                    <p>Салон BMW i8 выполнен в современном стиле с использованием экологичных материалов.</p>
                    <p>Этот автомобиль идеально подходит для тех, кто ценит как скорость, так и экологию.</p>
                </div>
                <img src="img/car4.jpg" alt="Rolls-Royce Phantom">
                <div class="car-details">
                    <h3>BMW I8</h3>
                    <p>Цена: 15 000 000 руб.</p>
                </div>
            </div>
            <!--Porsche Panamera-->
            <div class="car-item">
                <div class="car-hide">
                    <p>Porsche Panamera — это элегантный спортивный седан, который сочетает комфорт и динамику настоящего спортивного автомобиля.</p>
                    <p>Под капотом Panamera скрывается мощный двигатель, обеспечивающий разгон до 100 км/ч за считанные секунды.</p>
                    <p>Интерьер выполнен с исключительным вниманием к деталям, где сочетаются кожа, карбон</p>
                    <p>Система управления и настройки автомобиля адаптированы для достижения идеального баланса.</p>
                    <p>Porsche Panamera — это выбор тех, кто ценит стиль, комфорт и высокие скорости.</p>
                </div>
                <img src="img/car5.jpg" alt="Rolls-Royce Phantom">
                <div class="car-details">
                    <h3>Porsche Panamera</h3>
                    <p>Цена: 20 000 000 руб.</p>
                </div>
            </div>
            <!--Porsche Cayenne-->
            <div class="car-item">
                <div class="car-hide">
                    <p>Porsche Cayenne — это престижный кроссовер, который сочетает в себе спортивный дух Porsche и высокую проходимость внедорожника.</p>
                    <p>Cayenne обладает мощными двигателями, которые позволяют ему уверенно чувствовать себя на шоссе</p>
                    <p>Интерьер автомобиля выполнен с использованием премиальных материалов, предлагая комфорт и простор для всех пассажиров. </p>
                    <p>Современные технологии, такие как система помощи при парковке и мультимедийный экран</p>
                    <p>Porsche Cayenne — это идеальный выбор для тех, кто хочет все и сразу.</p>
                </div>
                <img src="img/car6.jpg" alt="Rolls-Royce Phantom">
                <div class="car-details">
                    <h3>Porsche Cayenne</h3>
                    <p>Цена: 16 000 000 руб.</p>
                </div>
            </div>
    </section>  
    <div class="next">
        <h1>Также полный каталог вы можете увидеть при отправке заявки</h1>
    </div>

    <section id="about">
        <h2>О компании</h2>
        <p class="about2">Наша компания предлагает эксклюзивные автомобили класса люкс для самых требовательных клиентов. <br>Мы гордимся высоким уровнем сервиса и качеством наших машин.</p>
    </section>
    <section id="contact">
        <h2>Контакты</h2>
        <form action="send.php" method="post" id="form">
            <label for="name">Имя:</label>
            <input type="text" class="inp" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" class="inp" id="email" name="email" required>
            
            <label for="message">Сообщение:</label>
            <input id="message" class="inp1" name="message" required>
            
            <button type="submit" class="btn" id="btn">Отправить</button>
        </form>
    </section>
    <footer>
        <p>© 2024 EliteCars . Все права защищены.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
