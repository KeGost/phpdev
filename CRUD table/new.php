<?php 

include ('functions/initialize.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];

    $result = insert_worker($name, $age, $salary);
    $new_id = mysqli_insert_id($db);
    header("Location: " . "index.php");
}

?>

<!doctype html>
<html>
<head>
    <title> Новый работник </title>
</head>
<body>
    <h1>Введите данные</h1>
    <form action="" method="post"> 
    Имя 
    <input type="text" name="name">
    Возраст
    <input type="number" name="age">
    Зароботная плата
    <input type="number" name="salary">
    <br>
    <input type="submit" value="Принять" name="submit"></input>
    </form>
</body>
</html>