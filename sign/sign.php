<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sign.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&family=Sofia+Sans+Condensed:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cube-container">
        <div class="cube">
            <form action="login.php" method="post" class="sign">
                <h1 class="word">Вход</h1>

                <label for="name">Login</label>
                <input type="text" class="inp" id="login" name="login" required>

                <label for="password">Password</label>
                <input id="message" class="inp" name="password" required>

                <button type="submit" class="btn" id="btn">Отправить</button>

                <button type="button" class="questsign" onclick="rotateCube()">Нет аккаунта?</button>

            </form>
    
            <form action="register.php" method="post" class="reg" enctype="multipart/form-data">
                <h1 class="word">Регистрация</h1>

                <label for="name">Login</label>
                <input type="text" class="inp" id="login" name="login" required>

                <label for="email">Email:</label>
                <input type="email" class="inp" id="email" name="email" required>

                <label for="password">Password:</label>
                <input id="message" class="inp" name="password" required>

                <label for="repassword">Repeat password:</label>
                <input id="message" class="inp" name="repassword" required>

                <label for="avatar" >Загрузите аватарку:</label>
                <input  type="file" name="avatar" accept="image/*" required>

                <button type="submit" class="btn" id="btn">Отправить</button>
                
                <button type="button" class="questsign" onclick="rotateCubeBack()">Уже есть аккаунт?</button>
            </form>
        </div>
    </div>
    <script src="sign.js"></script>
</body>
</html>