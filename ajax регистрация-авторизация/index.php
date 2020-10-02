<?php 

if (isset($_COOKIE['isAuth'])) {
	header ("Location: " . 'enter.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="scripts/jquery.js"></script>
	<script src="scripts/ajax.js"></script>
</head>
<body>
	<div class="container">
	<form method="post" action="ajax-form.php" id="loginForm" style="display:none;">
		<div class="fields"><label>
		<p>Введите логин:</p>
		<input class="field" type="text" name="login" id="login" placeholder="Логин">
		<br>
		</label></div>
		<div class="fields"><label>
		<p>Введите пароль:</p>
		<input class="field" type="password" name="password" id="password" placeholder="Пароль">
		<br>
		</label></div>
		<input type="hidden" name="checkAuth" id="checkAuth" value="auth">
		<input class="button action" type="submit" name="auth" id="auth" value="Войти"></button>
	</form>
	<form method="post" action="ajax-form.php" id="registerForm" style="display:none;">
		<div class="fields"><label>
		<p>Введите логин:</p>
		<input class="field" type="text" name="regLogin" id="regLogin" placeholder="Логин">
		<br>
		</label></div>
		<div class="fields"><label>
		<p>Введите пароль:</p>
		<input class="field" type="password" name="regPassword" id="regPassword" placeholder="Пароль">
		<br>
		</label></div>
		<div class="fields"><label>
		<p>Подтвердите пароль:</p>
		<input  class="field" type="password" name="confirm" id="confirm" placeholder="Подтвердите пароль">
		<br>
		</label></div>
		<div class="fields"><label>
		<p>Укажите ваш email:</p>
		<input class="field" type="text" name="email" id="email" placeholder="Email">
		<br>
		</label></div>
		<div class="fields"><label>
		<p>Ваше имя:</p>
		<input class="field" type="text" name="name" id="name" placeholder="Имя">
		<br>
		</label></div>
		<input type="hidden" name="checkRegister" id="checkRegister" value="register">
		<input class="button action" type="submit" name="register" id="register" value="Зарегистрироваться"></button>
	</form>
	<button class="button" type="button" id="showLogin">Авторизация</button> 
    <button class="button" type="button" id="showRegister">Регистрация</button>
</div>
</body>
</html>