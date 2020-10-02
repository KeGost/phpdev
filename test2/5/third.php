<?php 

$db = mysqli_connect("localhost", "root", "root", "test");

function third ()
{
	global $db;
	$query = "SELECT transactions.transaction_id, cities.name FROM transactions
				join persons on persons.id = transactions.from_person_id
				join cities on cities.id = persons.city_id
				join(
				SELECT transactions.transaction_id as 'transaction_id', transactions.to_person_id, cities.name as 'city_name' FROM transactions
				join persons on persons.id = transactions.to_person_id
				join cities on cities.id = persons.city_id
				ORDER BY transactions.transaction_id) toTransactions on transactions.transaction_id = toTransactions.transaction_id and 
				cities.name = toTransactions.city_name
				ORDER BY transactions.transaction_id;";
	$result = mysqli_query($db, $query);

	return $result;
}

$third = third();

?>

<h1>Пункт В)</h1>
<table>
  	<tr>
        <th>ID сделки</th>
        <th>Город</th>
  	</tr>
    <?php while($result = mysqli_fetch_assoc($third)) { ?>
    <tr>
	    <td><?php echo $result['transaction_id']; ?></td>
	    <td><?php echo $result['name'];?></td>
    </tr>
	<?php } ?>
</table>
<a href="index.php">Назад</a>