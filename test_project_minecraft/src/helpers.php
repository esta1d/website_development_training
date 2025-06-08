<?php

const DB_HOST = 'localhost';
const DB_NAME = 'a1050018_EternityCraft';
const DB_USER = 'a1050018_sayonara';
const DB_PASS = '19216819xxx';

function getDB(): bool|mysqli {
    return mysqli_connect(
        hostname: DB_HOST,
        username: DB_USER,
        password: DB_PASS,
        database: DB_NAME
    );
}



function avatarSecurity($avatar) {
    $name = $avatar['name'];
    $type = $avatar['type'];
    $size = $avatar['size'];
    $blacklist = ['.php', '.js', '.html'];

    // Проверяем расширение файла
    foreach ($blacklist as $extension) {
        if (preg_match("/{$extension}$/i", $name)) {
            return [
                'result' => false,
                'message' => "Расширение файла {$name} запрещено."
            ];
        }
    }

    // Проверяем MIME-тип файла
    if (!in_array($type, ['image/png', 'image/jpg', 'image/jpeg'])) {
        return [
            'result' => false,
            'message' => "Тип файла {$type} не поддерживается."
        ];
    }

    // Проверяем размер файла
    if ($size > 5 * 1024 * 1024) {
        return [
            'result' => false,
            'message' => "Размер файла превышает допустимый предел (5 МБ)."
        ];
    }

    return [
        'result' => true,
        'message' => null
    ];
} 

// function avatarSecurity($avatar) {
//     $name = $avatar['name'];
//     $type = $avatar['type'];
//     $size = $avatar['size'];
//     $blacklist = array(".php", ".js", ".html");

//     foreach($blacklist as $row) {
//         if(preg_match("/$row\$/i", $name)) return false;
//     }
//     if (($type != 'image/png') && ($type != 'image/jpg') && ($type != 'image/jpeg')) return false;
//     if ($size > 5 * 1024 * 1024) return false;
//     return true;
// }


?>