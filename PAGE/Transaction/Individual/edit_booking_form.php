<?php
include '../../connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the booking ID from the hidden input
    $bookingId = isset($_POST['booking_id']) ? intval($_POST['booking_id']) : 0;

    // Get the other form data
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // Check if the booking ID is valid
    if ($bookingId > 0) {
        // Prepare and bind the update statement
        $stmt = $conn->prepare("UPDATE bookings SET first_name = ?, last_name = ?, email = ?, contact = ?, address = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $first_name, $last_name, $email, $contact, $address, $bookingId);

        // Execute the update
        if ($stmt->execute()) {
            // Redirect to booking.php after successful update
            header("Location: ../booking.php");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            echo "Error updating booking: " . $stmt->error;
        }


        $stmt->close();
    } else {
        echo "Error: Booking ID is not specified or is invalid.";
    }
}

$conn->close(); // Close the database connection
