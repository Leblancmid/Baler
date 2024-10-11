<?php
// Include your database connection here
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];

    // Fetch the booking information from the database
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if ($booking) {
        // Display the form to edit the booking
?>
        <form action="update_booking.php" method="POST">
            <label for="last_name">Date Booked:</label>
            <input type="created_at" name="created_at" value="<?php echo htmlspecialchars($booking['created_at']); ?>">
            <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($booking['first_name']); ?>">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($booking['last_name']); ?>">
            <!-- Add more fields as needed -->
            <button type="submit">Save Changes</button>
        </form>
<?php
    } else {
        echo "Booking not found.";
    }
}
?>