<?php 

include ('functions/initialize.php');

$result = find_all_workers ();

$delete = 'delete.php?id=';
$edit = 'edit.php?id=';

?>


<!doctype html>
<html>
<head>
    <title> Таблица работников </title>
</head>
<body>
    <table border="1" width="500">
        <tr>
         <th> ID </th>
         <th> Name </th>
         <th> Age </th>
         <th> Salary </th>
         <th> Delete </th>
         <th> Edit </th>
        </tr>
        <?php while ($worker = mysqli_fetch_assoc($result)) { ?>
        <tr>
         <td><?= $worker['id']; ?></td>
         <td><?= $worker['name']; ?></td>
         <td><?= $worker['age']; ?></td>
         <td><?= $worker['salary']; ?></td>
         <td><a href="<?= $delete . $worker['id']; ?>">Удалить</a></td>
         <td><a href="<?= $edit . $worker['id']; ?>">Редактировать</a></td>
        <tr>
        <?php } ?>
    </table>
    <a href="new.php">Добавить работника</a>
</body>
<footer>

<?php
mysqli_free_result($result); 
db_disconnect($db); 
?>
</footer>
</html>