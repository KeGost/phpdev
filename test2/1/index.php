<?php 

class First
{
	public $name;
	public $letter;

	function __construct($name, $letter)
	{
		$this->name = $name;
		$this->letter = $letter;
	}

	public function getClassname ()
	{
		echo ($this->name . "<br>");
	}

	public function getLetter ()
	{
		echo ($this->letter . "<br>");
	}
}

class Second extends First
{
	
}

$first = new First("First", "A");
$second = new Second("Second", "B");
$first->getClassname();
$second->getClassname();
$first->getLetter();
$second->getLetter();
