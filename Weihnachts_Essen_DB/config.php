<?php

require_once('../WeihnachtsWunsch/DataBase.php');

// define('servername', 'localhost');
// define('username', 'Sepax');
// define('password', '123');
// define('databasename', 'WeihnachtsWunschDB');
$servername = 'localhost';
$username = "Sepax";
$password = '123';
$databasename = 'WeihnachtsEssenDB';
$tablename = 'Guests';

$db = new DataBase($servername, $username, $password, $databasename);

?>