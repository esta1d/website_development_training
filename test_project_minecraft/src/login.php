<?php
session_start();
require_once __DIR__ . '/helpers.php';

// Получение данных из формы входа
$login = $_POST['username'];
$password = $_POST['password'];

$sql_login = "SELECT * FROM `users` WHERE `login` = ('$login') AND `password` = ('$password')";
$sql_login_OR = "SELECT * FROM `users` WHERE `login` = ('$login') OR `password` = ('$password')";

// Подключение к базе данных
$connect = getDB();
// отправляем запрос
$result = $connect->query($sql_login);
$result_OR = $connect->query($sql_login_OR);
if ($result -> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['user']['id'] = $row['id'];
        header("Location: /profile.php");
    }
} else {
    if (($result_OR -> num_rows > 0)) {
        echo 'Не верный логин или пароль';
        exit();
    }
    echo 'Пользователя не существует'; 
    exit();
}

// Закрытие соединения с базой данных
$connect->close();

?>