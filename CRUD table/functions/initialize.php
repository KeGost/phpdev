<?php

include ('database.php');
include ('query_functions.php');

define ("DB_SERVER" , "localhost");
define ("DB_USER" , "root");
define ("DB_PASS" , "root");
define ("DB_NAME" , "workers");


$db = db_connect ();
