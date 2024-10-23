<?php
include '../connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the POST request
    $bookingId = (int)$_POST['booking_id']; // Cast to int for safety
    $status = (int)$_POST['status']; // Cast to int for safety

    // Prepare the SQL query
    $query = "UPDATE client SET status = ? WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("ii", $status, $bookingId);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Status updated successfully.";
        } else {
            echo "Error updating status: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Redirect back to the previous page (optional)
header("Location: booking.php");
exit();
?>
