<?php
include '../../connection.php';

$roomTypes = [
    1 => 'Small Room',
    2 => 'Big Room',
    3 => 'Sweet Room'
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