<?php
require_once __DIR__ . '/helpers.php';

// Получение данных из формы регистрации
$login = $_POST['username'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$trimmed_login = trim($login); //для проверки на пробелы
$trimmed_password = trim($password); //для проверки пароля на пробелы

// запросы в переменных
$sql_registration = "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')";
$sql_uniqle_login = "SELECT COUNT(*) FROM users WHERE login = ?";

// ОБЩИЕ ПРОВЕРКИ
// проверка на корректность логина
if (mb_strlen($login) < 4 || mb_strlen($login) > 30) {
    echo 'Некорректный логин';
    exit();
} 
// проверка на повтор пароля
if ($password !== $password_confirm) {
    echo 'Пароли не совпадают';
    exit();
}
if (mb_strlen($login) !== mb_strlen($trimmed_login)) {
    echo 'Логин не должен содержать пробелы';
    exit();
}
if (mb_strlen($password) !== mb_strlen($trimmed_password)) {
    echo 'Пароль не должен содержать пробелы';
    exit();
}





// Подключение к базе данных
$connect = getDB();

// ПРОВЕРКИ В БД
// Проверка наличия логина в базе данных
$stmt = $connect->prepare($sql_uniqle_login);
$stmt->bind_param("s", $login); // Привязываем параметр
$stmt->execute();

// Получение результата
$result = $stmt->get_result(); // Получаем результат выполнения запроса
$row = $result->fetch_assoc(); // Извлекаем данные из результата
$count = $row['COUNT(*)'];     // Получаем количество записей

if ($count > 0) {
    echo "Логин уже занят.";
    $connect->close();
    exit();
}




if ($connect->query($sql_registration) === true) {
    echo 'Регистрация прошла успешно!';
}




// Закрытие соединения с базой данных
$connect->close();

?>