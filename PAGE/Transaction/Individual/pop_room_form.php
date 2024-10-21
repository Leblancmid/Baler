<?php
include '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingId = $_POST['booking_id'];

    if ($_POST['startDate'] && $_POST['endDate']) {
        $query = "UPDATE bookings SET check_in = ?, check_out = ? WHERE id = ?";
        $checkIn = $_POST['startDate'];
        $checkOut = $_POST['endDate'];

        // Prepare the statement
        if ($stmt = $conn->prepare($query)) {
            // Bind parameters
            $stmt->bind_param("ssi", $checkIn, $checkOut, $bookingId);

            // Execute the statement
            if ($stmt->execute()) {
                header("Location: edit_booking.php?id=" . $bookingId);
            } else {
                echo "Error updating status: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

    if ($_POST['room-selection']) {
        $query = "UPDATE bookings SET rooms = ? WHERE id = ?";
        $roomSelection = $_POST['room-selection'];
        $roomSelectionString = implode(',', $roomSelection);

        // Prepare the statement
        if ($stmt = $conn->prepare($query)) {
            // Bind parameters
            $stmt->bind_param("si", $roomSelectionString, $bookingId);

            // Execute the statement
            if ($stmt->execute()) {
                header("Location: edit_booking.php?id=" . $bookingId);
            } else {
                echo "Error updating status: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
}
