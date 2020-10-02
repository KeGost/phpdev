<?php 

function fixString ($string)
{
	$string = stripslashes($string);
	return htmlentities($string);
}

function md5WithSalt($password)
{
    $hash = md5("some_default_salt" . $password);
    return $hash;
}

function loginArray($msg){
	$array = [
		'success' => true,
		'successLogin' => $msg
	];
	return $array;
}

function registerArray($msg){
	$array = [
		'success' => true,
		'successRegister' => $msg
	];
	return $array;
}

function errorArray($msg){
	$array = [
		'error' => true,
		'errorMsg' => $msg
	];
	return $array;
}

function logoutArray($msg){
	$array = [
		'error' => true,
		'logout' => $msg
	];
	return $array;
}

function validateLogin($login)
{
	if ($login == "") {
		$array = errorArray("Введите логин.");
	}elseif (strlen($login) < 3 || strlen($login) > 20) {
		$array = errorArray("Логин должен быть не менее 3 и более 20 символов.");
	}elseif (preg_match("/[^\w]/", $login)) {
		$array = errorArray("Логин должен состоять из символов английского алфавита, цифр, и знака '_'.");
	}
	return $array;
}

function validatePassword($password)
{
	if ($password == "") {
		$array = errorArray("Введите пароль.");
	} elseif (strlen($password) < 3 || strlen($password) > 20) {
		$array = errorArray("Пароль должен быть не менее 3 и более 20 символов.");
	} elseif (!preg_match("/[a-z]/", $password) ||
				!preg_match("/[A-Z]/", $password) ||
				!preg_match("/[0-9]/", $password)) {
		$array = errorArray("Пароль должен содержать хотя бы 1 из набора a-z, A-Z, 0-9.");	
	}
	return $array;
}

function validateEmail($email)
{
	if ($email == "") {
		$array = errorArray("Введите Email.");
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$array = errorArray("Email имеет неверный формат.");
	}
	return $array;
}

function confirmPassword($confirm, $password)
{
	if ($confirm == "") {
		$array = errorArray("Подтвердите пароль.");
	} elseif ($confirm != $password) {
		$array = errorArray("Введёные пароли не совпадают.");
	}
	return $array;
}

function validateName($name)
{
	if ($name == "") {
		$array = errorArray("Введите имя.");
	}
	return $array;
}

function addUser($login, $password, $email, $name)
{
	$xml = simplexml_load_file('db.xml');

    $new_user = $xml->addchild('user' , '&#10;');
    $new_user->addchild('login', $login);
    $new_user->addchild('password', $password);
    $new_user->addchild('email', $email);
    $new_user->addchild('name', $name);


    $xml->asXML('db.xml');
}

function existingUser ($login, $email)
{
	$xml = simplexml_load_file('db.xml');

	foreach ($xml as $user) {
		if ($login == $user->login) {
			$array = errorArray("Пользователь с таким логином уже существует.");
		}elseif ($email == $user->email) {
			$array = errorArray("Пользователь с таким электронным ящиком уже зарегистрирован.");
		}
	}
	return $array;
}

function checkUser ($login, $password)
{	
	if(empty($login)) {
		$array = errorArray("Введите логин");
	}elseif (empty($password)){
		$array = errorArray("Введите пароль");
	}else {
		$xml = simplexml_load_file('db.xml');
		foreach ($xml as $user) {
			if ($login == $user->login) {
				if (md5WithSalt($password) == $user->password) {
					setcookie("login", $user->login);
					setcookie('isAuth', true);
					$array = loginArray("Вход выполнен");
					break;
				}else {
					$array = errorArray("Пароль неверный");
				}
			} else {
				$array = errorArray("Пользователя с таким именем не существует");
			}
		}
	}
	return $array;
}

function logout()
{
	$array = logoutArray("Выход");
	setcookie("login");
	setcookie("isAuth");
	return $array;
}
