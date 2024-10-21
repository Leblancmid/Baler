<?php
include '../../connection.php';

// Room selection
$rooms = $conn->query("SELECT * from rooms");
$rooms = $rooms->fetch_all(MYSQLI_ASSOC);
