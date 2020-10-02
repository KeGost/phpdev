<?php

include ('functions/initialize.php');

$id = $_GET['id'];
$worker = find_worker_by_id($id);

if(isset($_POST['submit'])) {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $salary = $_POST['salary'] ?? '';

    $result = update_worker($name, $age, $salary, $id);
    header("Location: " . "index.php");
}

?>

<!doctype html>
<html>
<head>
    <title> Новый работник </title>
</head>
<body>
<h1> Внесите изменения </h1>
<form action="" method="post"> 
    Имя 
    <input type="text" name="name" value="<?= $worker['name']; ?>">
    Возраст
    <input type="number" name="age" value="<?= $worker['age']; ?>">
    Зароботная плата
    <input type="number" name="salary" value="<?= $worker['salary']; ?>">
    <br>
    <input type="submit" value="Принять" name="submit"></input>
</form>
<a href="index.php">Вернуться к таблице</a>
</body>
<html>