<?php

    // ПОЛУЧИМ ДАННЫЕ С ФОРМЫ

	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$phone = $_POST['user_phone'];

	// ОБРАБОТАЕМ ПОЛУЧЕННЫЕ ДАННЫЕ

	$name = htmlspecialchars($name);
	$email = htmlspecialchars($email);
	$phone = htmlspecialchars($phone);
	
	$name = urldecode($name);
	$email = urldecode($email);
	$phone = urldecode($phone);

	$name = trim($name);
	$email = trim($email);
	$phone = trim($phone);

	// ОТПРАВЛЯЕМ ДАННЫЕ

	if (mail("kongxu@mail.ru", 
			"Новое письмо с сайта",
			"Имя: ".$name."\n".
			"Почта: ".$email."\n".
			"Телефон: ".$phone."\n".
			"form: no-reply@mydomain.ru \r\n")
	) {
		header('location: thank-you.html');
}

	else {
		echo ('Ошибка, проверьте данные');
	}


?>