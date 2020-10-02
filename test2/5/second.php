<?php 

$db = mysqli_connect("localhost", "root", "root", "test");
	
function second()
{
	global $db;
	$query = "SELECT cities.name, (count(persons.fullname)+to_transactions.to) as 'transactions' FROM cities 
			JOIN persons on persons.city_id = cities.id
			JOIN transactions on transactions.from_person_id = persons.id
			JOIN 
			(SELECT cities.name, count(persons.fullname) as 'to' FROM cities 
			JOIN persons on persons.city_id = cities.id
			JOIN transactions on transactions.to_person_id = persons.id
			GROUP BY cities.name)
			to_transactions on to_transactions.name = cities.name
			GROUP BY cities.name
			ORDER BY (count(persons.fullname)+to_transactions.to) DESC LIMIT 1;";
	$result = mysqli_query($db, $query);
	return $result;
}

$second = second();

?>


<h1>Пункт б)</h1>
<table>
  	<tr>
        <th>Город</th>
        <th>Кол-во сделок</th>
  	</tr>
    <?php while($result = mysqli_fetch_assoc($second)) { ?>
    <tr>
	    <td><?php echo $result['name']; ?></td>
	    <td><?php echo $result['transactions'];?></td>
    </tr>
	<?php } ?>
</table>
<a href="index.php">Назад</a>