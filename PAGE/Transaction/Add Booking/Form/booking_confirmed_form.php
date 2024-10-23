<?php
include '../../connection.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$totalAmount = $_POST['totalAmount'];
$paxTotal = $_POST['paxTotal'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$additionalPax = $_POST['additionalPax'] ?? [];
$today = date('Y-m-d H:i:s');
$roomPax = $_POST['roomPax'];
$amenitiesString = $_POST['amenitiesString'];
$rooms = $_POST['rooms'];
$roomString = implode(',', $rooms);

do {
    $bookingRef = mt_rand(1000000, 9999999);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM client WHERE reference_no = ?");
    $stmt->bind_param("i", $bookingRef);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
} while ($count > 0); // Repeat until a unique number is generated

$stmt = $conn->prepare("INSERT INTO client (reference_no, rooms, room_pax, amenities, first_name, last_name, email, contact, address, total, additional_pax, check_in, check_out, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssiisss", $bookingRef, $roomString, $roomPax, $amenitiesString, $firstName, $lastName, $email, $contact, $address, $totalAmount, $paxTotal, $startDate, $endDate, $today);

if ($stmt->execute()) {
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
