<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cars";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `client` WHERE login='$login' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        setcookie("login", $login, time() + 86400 * 30, "/");
        header('Location: /index.php');
    } else {
        echo "Неправильный логин или пароль!";
    }
