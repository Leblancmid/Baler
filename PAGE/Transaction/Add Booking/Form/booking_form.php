<?php
include '../connection.php';

$query = "SELECT * FROM client";
$result = $conn->query($query);

if ($result) {
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
} else {
    die("Error fetching rooms: " . $conn->error);
}


function formatDate(string $date): string
{
    $date = new DateTime($date);

    return $date->format('F j, Y');
}

function formatDateTime(string $date): string
{
    $date = new DateTime($date);

    return $date->format('F j, Y g:i A');
}
