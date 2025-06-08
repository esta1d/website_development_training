<?php

// запуск сессии
session_start();
require_once __DIR__ . '/src/helpers.php';
$connect = getDB();

// получаем юзер айди
$idUser = $_SESSION['user']['id'];
if ($idUser == '') {
    header("Location: /");
}

// получаем из юзер айди логин
$sql_user = "SELECT * FROM `users` WHERE `id` = ('$idUser')";
$result = mysqli_query($connect, $sql_user);
$result = mysqli_fetch_all($result);
foreach($result as $item) {
    $login = $item[1];
    $avatar = $item[3];
}

//функция для загрузки аватарки
function loadAvatar($avatar) {
    global $idUser;
    global $connect;
    $type = $avatar['type'];
    $name = md5(microtime()).'.'.substr($type, strlen('image/'));
    $dir = 'uploads/avatar/';
    $uploadfile = $dir.$name;
    $sql_update_img = "UPDATE `users` SET `avatar` = ('$name') WHERE `id` = ('$idUser')";
    if (move_uploaded_file($avatar['tmp_name'], $uploadfile)) {
        mysqli_query($connect, $sql_update_img);
        header("Location: /profile.php");
    } else {
        return false;
    }
    return true;
}

$checkResult = avatarSecurity($_FILES['avatar']);

if ($checkResult['result']) {
    echo "Файл прошел проверку.";
} else {
    echo "Ошибка: " . $checkResult['message'];
}
// сама загрузка аватарки
$data = $_POST;
if(isset($data['set_avatar'])) {
    $avatar = $_FILES['avatar'];
    if (avatarSecurity($avatar)) loadAvatar($avatar);
    // loadAvatar($avatar);
}

?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>профиль</title>
</head>
<body>
    

    <div class="container">
        <div class="wrapper">
            <h2>
               Привет, <?= $login ?>!
            </h2>

            <p>Это твоя аватарка</p>
            <img src="/uploads/avatar/<?php echo $avatar;?>" alt="">

            <form action="#" method="post" enctype="multipart/form-data" class="formachka">
                <input type="file" name="avatar" class="avatar_select">
                <button type="submit" name="set_avatar">Обновить аватарку</button>
            </form>

            <a href="src/logout.php">Выход</a>

        </div>
    </div>
    




    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #fff;
            font-family: sans-serif;
        }
        .container {
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
            max-width: 1400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper {
            margin-top: 200px;
            text-align: center;
            width: 700px;
            display: flex;
            align-items: center;
            justify-content: center;   
            border-radius: 20px;
            background-color: #444;
            flex-direction: column;
            padding: 50px 0;
        }
        .wrapper h2 {
            font-size: 40px;
            margin: 20px;
        }
        .wrapper p {
            font-size: 24px;
        }
        .wrapper img {
            margin: 20px;
            width: 200px;
            height: 200px;
        }
        .formachka {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .formachka button {
            font-size: 24px;
            padding: 10px 20px;
            background-color: aquamarine;
            color: #444;
            border-radius: 10px;
            border: none;
            text-decoration: none;
            margin: 20px;
        }
        .wrapper a {
            font-size: 24px;
            padding: 10px 20px;
            background-color: #333;
            border-radius: 10px;
            border: none;
            text-decoration: none;
        }
    </style>

</body>
</html>