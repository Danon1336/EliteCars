<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];



$sql = "INSERT INTO `user` (`name` , `email`, `message`) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "❤Данные успешно добавлены в базу данных❤";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}
header('Location: index.php');
$conn->close();

