<?php
include '../../connection.php';

// Initialize variables for output
$first_name = '';
$last_name = '';
$email = '';
$contact = '';
$address = '';
$reference_no = '';
$selectedAmenities = '';  // Initialize it as an empty string by default


// Check if the 'id' parameter is present in the URL and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $bookingId = intval($_GET['id']); // Convert to integer to prevent SQL injection

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM client WHERE id = ?");
    $stmt->bind_param("i", $bookingId); // "i" means the parameter is an integer

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Output data of the booking
        $result = $result->fetch_assoc();
        $selectedAmenities = isset($result['amenities']) ? $result['amenities'] : '';
    } else {
        echo "No results found for the specified booking ID.";
    }

    $stmt->close();

    // Fetch selected rooms
    $selectedRooms = $result['rooms'];
    $query = "SELECT * FROM rooms WHERE id IN ($selectedRooms)";
    $selectedRooms = $conn->query($query);

    if ($result) {
        $selectedRooms = $selectedRooms->fetch_all(MYSQLI_ASSOC);
    } else {
        die("Error fetching rooms: " . $conn->error);
    }

    // Fetch amenities details if available
    if (!empty($selectedAmenities)) {
        // Convert comma-separated string to an array of IDs
        $amenitiesIds = explode(',', $selectedAmenities);
        $amenitiesIdsString = implode(',', array_map('intval', $amenitiesIds));

        // Prepare the SQL query to fetch amenities details
        $query = "SELECT * FROM amenities WHERE id IN ($amenitiesIdsString)";
        $amenitiesResult = $conn->query($query);

        if ($amenitiesResult) {
            $amenities = $amenitiesResult->fetch_all(MYSQLI_ASSOC);
            $amenitiesTotal = 0;

            foreach ($amenities as $amenity) {
                // Assuming the price is in the third column (index 2)
                $price = (int)$amenity['price']; // Make sure to cast the price to an integer
                $amenitiesTotal += $price; // Add the price to the total sum
            }
        } else {
            die("Error fetching amenities: " . $conn->error);
        }
    } else {

    }
} else {
    echo "Error: Booking ID is not specified or is invalid.";
}

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
        $stmt = $conn->prepare("UPDATE client SET first_name = ?, last_name = ?, email = ?, contact = ?, address = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $first_name, $last_name, $email, $contact, $address, $bookingId);

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

$conn->close(); // Close the database connection
