<?php
include '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingId = $_POST['booking_id'];

    if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
        $query = "UPDATE client SET check_in = ?, check_out = ? WHERE id = ?";
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

    if (isset($_POST['room-selection'])) {
        $query = "UPDATE client SET rooms = ? WHERE id = ?";
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

    if (isset($_POST['options'])) {
        $amenities = $_POST['options'];

        $amenitiesString = implode(',', $amenities);

        if ($bookingId > 0) {
            // Prepare and bind the update statement
            $stmt = $conn->prepare("UPDATE client SET amenities = ? WHERE id = ?");
            $stmt->bind_param("si", $amenitiesString, $bookingId);

            // Execute the update
            if ($stmt->execute()) {
                // Redirect to booking.php after successful update
                header("Location: edit_booking.php?id=" . $bookingId);
                exit(); // Ensure no further code is executed after the redirect
            } else {
                echo "Error updating booking: " . $stmt->error;
            }


            $stmt->close();
        } else {
            echo "Error: Booking ID is not specified or is invalid.";
        }
    }

    if (isset($_POST['addPax'])) {
        $roomPax = $_POST['addPax'];

        foreach ($roomPax as $roomId => $paxValue) {
            $pairs[] = "$roomId:$paxValue";
        }

        $roomPaxString = implode(',', $pairs);

        if ($bookingId > 0) {
            // Prepare and bind the update statement
            $stmt = $conn->prepare("UPDATE client SET room_pax = ? WHERE id = ?");
            $stmt->bind_param("si", $roomPaxString, $bookingId);

            // Execute the update
            if ($stmt->execute()) {
                // Redirect to booking.php after successful update
                header("Location: edit_booking.php?id=" . $bookingId);
                exit(); // Ensure no further code is executed after the redirect
            } else {
                echo "Error updating booking: " . $stmt->error;
            }


            $stmt->close();
        } else {
            echo "Error: Booking ID is not specified or is invalid.";
        }
    }
}
