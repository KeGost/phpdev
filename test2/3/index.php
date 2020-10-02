<?php 

$array = explode(" ", $argv[1]);

$emptyArray = ["", null, false];

for ($j = 0; $j <= count($array); ++$j) {
	if (preg_match("/[a-zA-Z.]/", $array[$j]) ) {
		$deleteArray[] = $array[$j];
	}
}

$resultArray = array_diff($array, $deleteArray);

foreach ($resultArray as $element) {
    if(!empty($element)){
    	if ($element != -0 || $element != +0) {
    		$newArray[] = $element;
    	}
    }elseif ($element == 0) {
    	$newArray[] = $element;
    }
}

$newArray = array_unique($newArray);
sort($newArray);

for ($j = 0; $j <= count($newArray); ++$j) {
	echo $newArray[$j] . " ";
}




