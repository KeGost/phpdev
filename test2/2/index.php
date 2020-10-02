<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-size: 40px;">

<?php 

class Test{

	public $colors = ["red", "blue", "green", "yellow", "lime", "magenta", "black", "gold", "gray", "tomato"];

	function __construct()
	{
		for ($j = 0; $j <= 4; ++$j) {
			$this->getstring();
		}
	}

	public function getString()
	{
		for ($j = 0; $j <= 4; ++$j) {
			$randomWord = array_rand($this->colors);
			$string[$j] = $this->colors[$randomWord];
		}

		foreach ($string as $word) {
			$color = array_rand($this->colors);
			if ($word != $this->colors[$color]) {
				echo "<span style='color:" . $this->colors[$color] . "'>" . $word . "</span>" . " ";
			}elseif ($word == $this->colors[$color]){
				$color = array_rand($this->colors);
				echo "<span style='color:" . $this->colors[$color] . "'>" . $word . "</span>" . " ";
			} else {
				echo "<p style='color: red; font-weight: bold;'>WARNING!!!</p>";// шансы получить два раза подряд одинаковые значения цвета равны 1 к 100
			}
		}
		echo "<br>";
	}
}

$result = new Test();

?>

</body>
</html>
