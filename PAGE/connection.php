<?php

$sname= "localhost";
$username= "root";
$password = "";

$db_name = "baler_db2";

$conn = mysqli_connect($sname, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

$roomTypes = [
    1 => 'Small Room',
    2 => 'Big Room',
    3 => 'Suite Room'
];

$roomClass = [
    1 => 'small',
    2 => 'big',
    3 => 'sweet'
];