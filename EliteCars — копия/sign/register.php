<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

if ($password != $repassword) {
    echo "Пароли не совпадают";
    exit;
}

// Проверка на существование имени пользователя
$stmt = $conn->prepare("SELECT login FROM client WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Имя пользователя уже занято";
    $stmt->close();
    $conn->close();
    exit;
}
$stmt->close();

// Обработка загрузки аватарки
if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] === UPLOAD_ERR_OK) {
    $imageFileType = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 5 * 1024 * 1024; // 5 MB

    if ($_FILES["avatar"]["size"] <= $maxFileSize && in_array($imageFileType, $allowed_types)) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/image/";
        $avatar_filename = $login . "." . $imageFileType;
        $avatar_path = $target_dir . $avatar_filename;

        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar_path)) {
            // Сохранение имени файла в базе данных
            $stmt = $conn->prepare("UPDATE client SET avatar = ? WHERE login = ?");
            $stmt->bind_param("ss", $avatar_filename, $login);
            $stmt->execute();
            $stmt->close();
            echo "Аватарка успешно загружена!";
        } else {
            echo "Ошибка загрузки аватарки";
        }
    } else {
        echo "Файл слишком большой или неподдерживаемый формат.";
    }
}

$sql = "INSERT INTO client (login, email, password, avatar, registration_date) VALUES (?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $login, $email, $password, $avatar_filename);

if ($stmt->execute()) {
    echo "Данные успешно добавлены в базу данных";
    setcookie("login", $login, time() + 86400 * 30, "/");
} else {
    echo "Ошибка: " . $stmt->error;
}

$stmt->close();
$conn->close();
header('Location: http://elitecars/sign/sign.php');
exit;