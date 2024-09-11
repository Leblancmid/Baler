<?php
include '../../connection.php';

$roomTypes = [
    1 => 'Small Room',
    2 => 'Big Room',
    3 => 'Sweet Room'
];

$roomClass = [
    1 => 'small',
    2 => 'big',
    3 => 'sweet'
];


// Room selection
$rooms = $conn->query("SELECT * from rooms");
$rooms = $rooms->fetch_all(MYSQLI_ASSOC);
