<?php

session_start();

require ('functions.php');

$login = fixString($_POST['login']);
$password = fixString($_POST['password']);
$regLogin = fixString($_POST['regLogin']);
$regPassword = fixString($_POST['regPassword']);
$confirm = fixString($_POST['confirm']);
$email = fixString($_POST['email']);
$name = fixString($_POST['name']);


if (isset($_POST['checkLogout'])) {
	$msg = logout();
	echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['checkAuth'])) {
	$msg = checkUser($login, $password);
	echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['checkRegister'])) {
	if (validateLogin($regLogin)) {
		$msg = validateLogin($regLogin);
		echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	} elseif (validatePassword($regPassword)) {
		$msg = validatePassword($regPassword);
		echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	} elseif (confirmPassword($confirm, $regPassword)) {
		$msg = confirmPassword($confirm, $regPassword);
		echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	} elseif (validateEmail($email)) {
		$msg = validateEmail($email);
		echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	} elseif (validateName($name)) {
		$msg = validateName($name);
		echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	} elseif (existingUser($regLogin, $email)) {
		$msg = existingUser($regLogin, $email);
		echo json_encode($msg, JSON_UNESCAPED_UNICODE);
		
	} else {
		$hash = md5WithSalt($regPassword);
		addUser($regLogin, $hash, $email, $name);
		//закрытие формы с регистрацией 
		$msg = registerArray("Вы успешно зарегестрированы");
		echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	}
}
