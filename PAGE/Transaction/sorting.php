<?php
include '../connection.php'; // Include MySQLi connection
include 'Add Booking/Form/booking_form.php';

// Initialize query with default filtering
$query = "SELECT * FROM client WHERE 1";

// Handle filtering by date
if (isset($_GET['sort-date']) && !empty($_GET['sort-date'])) {
    $sortDate = $_GET['sort-date'];
    $query .= " AND DATE(created_at) = '$sortDate'";
}

// Handle filtering by first name
if (isset($_GET['sort-first-name']) && !empty($_GET['sort-first-name'])) {
    $sortFirstName = mysqli_real_escape_string($conn, $_GET['sort-first-name']); // Escape for SQL injection
    $query .= " AND first_name LIKE '%$sortFirstName%'";
}

// Handle filtering by last name
if (isset($_GET['sort-last-name']) && !empty($_GET['sort-last-name'])) {
    $sortLastName = mysqli_real_escape_string($conn, $_GET['sort-last-name']); // Escape for SQL injection
    $query .= " AND last_name LIKE '%$sortLastName%'";
}

// Handle filtering by email
if (isset($_GET['sort-email']) && !empty($_GET['sort-email'])) {
    $sortEmail = mysqli_real_escape_string($conn, $_GET['sort-email']); // Escape for SQL injection
    $query .= " AND email LIKE '%$sortEmail%'";
}

// Handle filtering by status (assuming numeric status values)
if (isset($_GET['sort-status']) && $_GET['sort-status'] != 'default-status') {
    $sortStatus = (int)$_GET['sort-status']; // Convert to integer
    $query .= " AND status = $sortStatus"; // Use numeric comparison
}

// Handle sorting by name
if (isset($_GET['sort-name']) && $_GET['sort-name'] != 'default') {
    $sortName = $_GET['sort-name'];
    if ($sortName == 'ascending') {
        $query .= " ORDER BY first_name ASC, last_name ASC";
    } elseif ($sortName == 'descending') {
        $query .= " ORDER BY first_name DESC, last_name DESC";
    }
}

// Debugging: Print the SQL query
echo $query;

// Execute the query using MySQLi
$result = mysqli_query($conn, $query);

if ($result) {
    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "No records found."; // Notify if no records are fetched
    }
} else {
    echo "Error: " . mysqli_error($conn); // Display any SQL error
}

// Display sorted results
?>
<table>
    <thead>
        <tr>
            <th>Reference No</th>
            <th>Room ID</th>
            <th>Date Booked</th>
            <th>Name</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Total</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($bookings) && !empty($bookings)): ?>
            <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?php echo htmlspecialchars($booking['reference_no']); ?></td>
                    <td><?php echo htmlspecialchars($booking['id']); ?></td>
                    <td><?php echo htmlspecialchars(formatDate($booking['created_at'])); ?></td>
                    <td><?php echo htmlspecialchars($booking['first_name'] . ' ' . $booking['last_name']); ?></td>
                    <td><?php echo htmlspecialchars(formatDate($booking['check_in'])); ?></td>
                    <td><?php echo htmlspecialchars(formatDate($booking['check_out'])); ?></td>
                    <td><?php echo number_format($booking['total'], 2); ?></td>
                    <td><?php echo number_format($booking['balance'], 2); ?></td>
                    <td><?php echo htmlspecialchars($booking['status']); ?></td>
                    <td>
                        <button class="edit-button" data-id="<?php echo $booking['id']; ?>">Edit</button>
                        <button class="delete-button">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="10">No records found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>