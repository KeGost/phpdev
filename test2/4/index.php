<?php 

require ('simplehtmldom/simple_html_dom.php');

$seasons = [
	"2009-10", 
	"2010-11", 
	"2011-12", 
	"2012-13", 
	"2013-14", 
	"2014-15", 
	"2015-16", 
	"2016-17", 
	"2017-18", 
	"2018-19", 
	"2019-20" 
];

if (isset($_POST['submit']) && empty($_POST['team'])) {
	echo "<p style=\"color: red;\">Пожалуйста заполните поле для ввода.</p>";
}elseif (!empty($_POST['team'])) {
	getTeamResult($_POST['team']);
	getCurrentTeamResult($_POST['team']);
}

function getTableForSeason($year)
{	
	$html = file_get_html("https://terrikon.com/football/italy/championship/$year/table");
	$season = [];
	for ($j = 1; $j < 21; ++$j){

			$team = $html->find('#container .content-site .maincol .tab .colored', 0)->find('tr', $j)->find('td', 1);
			$points = $html->find('#container .content-site .maincol .tab .colored', 0)->find('tr', $j)->find('td', 10);
			$season += [$j =>[$team->plaintext => $points->plaintext]];

	}
	return $season;
}

function getTeamResult($team)
{
	global $seasons;
	for ($i = 0; $i <= 10; ++$i) {
		$table = getTableForSeason($seasons[$i]);
		$place = 1;
		foreach ($table as $results) {
			if(mb_strtolower($team) == mb_strtolower(key($results))) {
				echo "Сезон " . $seasons[$i] .  " место " . $place . ".<br>";
			}
			$place++;
		}

	}
}

function getCurrentTable()
{
	$html = file_get_html("https://terrikon.com/football/italy/championship/table");
	$season = [];
	for ($j = 1; $j < 21; ++$j){
			$team = $html->find('#container .content-site .maincol .tab .colored', 0)->find('tr', $j)->find('td', 1);
			$points = $html->find('#container .content-site .maincol .tab .colored', 0)->find('tr', $j)->find('td', 10);
			$season += [$j =>[$team->plaintext => $points->plaintext]];

	}
	return $season;
}

function getCurrentTeamResult($team)
{
	$table = getCurrentTable();
	$place = 1;
	foreach ($table as $results) {
		if(mb_strtolower($team) == mb_strtolower(key($results))) {
			echo "Место в текущем сезоне " . $place . ".<br>";
		}
		$place++;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Получи результаты своей команды</title>
</head>
<body>
	<form action="index.php" method="post">
		<p>Введите название команды<p>
		<input type="text" name="team">
		<input type="submit" name="submit" value="Получить">
	</form>
</body>
</html>
