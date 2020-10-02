<?php 

if (!isset($_COOKIE['isAuth'])) {
	header ("Location: " . 'index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="jquery.js"></script>
	<script src="ajax.js?v=3.0"></script>
</head>
<body>
	<div style="font-size: 30px; text-align: center;">
	<form method="post" action="ajax-form.php" id="logout">
		<p style="color: white;">Добро пожаловать, <?= $_COOKIE['login']; ?>!</p>
		<input type="hidden" name="checkLogout" id="checkLogout" value="logout">
		<input class="button action" style="background: red; border: 1px solid red; color: white;" type="submit" name="logout" id="logout" value="Выйти"></button>
	</form>
	</div>
</body>
</html>