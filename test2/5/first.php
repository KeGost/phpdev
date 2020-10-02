<?php 

$db = mysqli_connect("localhost", "root", "root", "test");
	
$name1 = $name2 = $name3 =$_POST['name'];
$query  = "SELECT persons.fullname, 100+(
			SELECT COALESCE((SELECT ROUND(sum(-transactions.amount), 2) FROM persons
			JOIN transactions ON transactions.from_person_id = persons.id
			WHERE persons.fullname = ?), 0) as 'Отдано')+
			(SELECT COALESCE((SELECT ROUND(sum(transactions.amount), 2) FROM persons
			JOIN transactions ON transactions.to_person_id = persons.id
			WHERE persons.fullname = ?), 0) as 'Принято') as 'balance' 
			FROM persons
			WHERE persons.fullname = ?";

$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, 'sss', $name1, $name2, $name3);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $person, $balance);
mysqli_stmt_fetch($stmt);

?>

<h1>Пункт а)</h1>
<form method="post" action="first.php">
	<input type="text" name="name">
	<input type="submit" name="submit">
</form>
<table>
  	<tr>
        <th>Имя</th>
        <th>Баланс</th>
  	</tr>
    
    <tr>
	    <td><?php echo $person; ?></td>
	    <td><?php echo $balance;?></td>
    </tr>
	
</table>
<a href="index.php">Назад</a>