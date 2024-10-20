<?php
include '../../connection.php';

// Initialize variables for output
$name = '';
$email = '';
$contact = '';
$address = '';

// Check if the 'id' parameter is present in the URL and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $bookingId = intval($_GET['id']); // Convert to integer to prevent SQL injection

    // Prepare and bind
    $stmt = $conn->prepare("SELECT first_name, last_name, email, contact, address FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $bookingId); // "i" means the parameter is an integer

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of the booking
        $row = $result->fetch_assoc();
        $name = $row["first_name"] . " " . $row["last_name"];
        $email = $row["email"];
        $contact = $row["contact"];
        $address = $row["address"];
    } else {
        echo "No results found for the specified booking ID.";
    }

    $stmt->close();
} else {
    echo "Error: Booking ID is not specified or is invalid.";
}
