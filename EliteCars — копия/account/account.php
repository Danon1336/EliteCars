<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <style>
        
    </style>
</head>
<body>
    <?php
    
        $login = $_COOKIE['login'];
        $conn = new mysqli("localhost", "root", "", "cars");

        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM client WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
    ?>

    
    <div class="data">
        <img src="/image/<?php echo htmlspecialchars($user['avatar']); ?>" alt="Аватарка" style="width:150px; height:150px; border-radius:50%;" />
        <div class="popup-menu">
            <div class="popup-item left"><a href="/logout.php">Выйти из аккаунта</a></div>
            <div class="popup-item top">    
                <form method="get" action="documentation.docx">
                    <button type="submit" class="doc">Документация</button>
                </form>
            </div>
            
            <div class="popup-item right"><a href="">Настройки</a></div>
        </div>
        <h1><?php echo htmlspecialchars($user['login']); ?></h1>
        <p><?php echo htmlspecialchars($user['email']); ?></p>
    </div>

    <div class="level">
        <h1>Silver</h1>
        <div class="about">
            <div class="details">
                <h2>Рейтинг</h2>
                <p>1000</p>
            </div>
            <div class="details">
                <h2>Дата регистрации</h2>
                <p><?php echo date('d.m.Y', strtotime($user['registration_date'])); ?></p>
            </div>
            <div class="details">
                <h2>Количество автомобилей</h2>
                <p>10</p>
            </div>
        </div>
    </div>
    <img src="/img/bolid.png" alt="" class="bolid">
    <!-- Контейнеры, которые изначально скрыты -->
    <div class="containers">
        <div class="container" id="container1">Контейнер 1</div>
        <div class="container" id="container2">Контейнер 2</div>
        <div class="container" id="container3">Контейнер 3</div>
    </div>

    <script src="account.js">
        
    </script>
</body>
</html>
