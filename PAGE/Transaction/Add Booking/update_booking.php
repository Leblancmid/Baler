<?php
// Include your database connection here
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    // Add more fields as needed

    // Update the booking details in the database
    $stmt = $conn->prepare("UPDATE bookings SET first_name = ?, last_name = ? WHERE id = ?");
    $stmt->bind_param("ssi", $first_name, $last_name, $booking_id);

    if ($stmt->execute()) {
        // Redirect to booking.php after a successful update
        header("Location: booking.php?message=success");
        exit;
    } else {
        // Redirect to booking.php after a successful update
        header("Location: booking.php?message=success");
        exit;
    }
}
