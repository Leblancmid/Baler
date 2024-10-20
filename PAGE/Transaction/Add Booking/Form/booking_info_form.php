<?php
include '../../connection.php';

$roomTypes = [
    1 => 'Small Room',
    2 => 'Big Room',
    3 => 'Suite Room'
];

if (isset($_GET['room-selection']) && is_array($_GET['room-selection'])) {
    $selectedRooms = implode(',', array_map('intval', $_GET['room-selection']));

    $query = "SELECT * FROM rooms WHERE id IN ($selectedRooms)";
    $result = $conn->query($query);

    if ($result) {
        $rooms = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        die("Error fetching rooms: " . $conn->error);
    }
} else {
    die("No rooms selected.");
}

$checkInDate = $_GET['startDate'];
$checkOutDate = $_GET['endDate'];

$query = "SELECT * FROM amenities";
$result = $conn->query($query);
if ($result) {
    $options = $result->fetch_all(MYSQLI_ASSOC);
} else {
    die("Error fetching rooms: " . $conn->error);
}

$i = 0; // Counter for big rooms
$bigRooms = []; // To store selected big rooms

// Check how many big rooms or suite rooms are selected
foreach ($rooms as $room) {
    if (in_array($room['type'], [2, 3])) { // Assuming 2 and 3 represent big or suite rooms
        $isBigRoom = true;
        $bigRooms[] = $room; // Add big room to the array
        ++$i;
    }
}

$totalPax = 2 * $i;
