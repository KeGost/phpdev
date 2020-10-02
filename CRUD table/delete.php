<?php

include ('functions/initialize.php');

$id = $_GET['id'] ?? '1';

$worker = find_worker_by_id($id);

if(isset($_POST['yes'])) {
    $result = delete_worker($id);
    header ("Location: " . "index.php");
}

?>

<!doctype html>
<html>
<head>
    <title> Удаление </title>
</head>
<body>
<h1> Вы действительно хотите удалить пользователя?</h1>
<div>
<dl>
    <dt>ID <?= $worker['id']; ?></dt>
</dl>
<dl>
    <dt>Name <?= $worker['name']; ?></dt>
</dl>
<dl>
    <dt>Age <?= $worker['age']; ?></dt>
</dl>
<dl>
    <dt>Salary <?= $worker['salary']; ?></dt>
</dl>
<form action="" method="POST">
<input type="submit" value="Да" name="yes"></input>
</form>
<a href="index.php">Вернуться к таблице</a>
<footer>
<?php
db_disconnect($db); 
?>
</footer>
</body>
</html>
