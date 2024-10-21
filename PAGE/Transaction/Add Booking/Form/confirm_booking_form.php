<?php
include '../../connection.php';

$paxPrice = 350;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data using $_POST
    $firstName = $_GET['first_name'] ?? '';
    $lastName = $_GET['last_name']  ?? '';
    $email = $_GET['email']  ?? '';
    $contact = $_GET['contact']  ?? '';
    $address = $_GET['address'] ?? '';
    $totalAmount = $_GET['totalAmount'] ?? '';
    $selectedAmenities = $_GET['amenities'] ?? [];
    $additionalPax = $addedPax = $_GET['additionalPax'] ?? [];
    $selectedRooms = $_GET['room-selection'];

    $roomPax = '';
    foreach ($selectedRooms as $id) {
        $query = $query = "SELECT * FROM rooms WHERE id = " . $id;
        $result = $conn->query($query);

        $room = $result->fetch_assoc();
        if (in_array($room['type'], [2, 3])) { // Assuming 2 and 3 represent big or suite rooms
            $pax = array_shift($additionalPax);
            $roomPax = $roomPax . $room['id'] . ":$pax";
            $roomPax = $roomPax . ',';
        }
        if ($result) {
        } else {
            die("Error fetching room: " . $conn->error);
        }
    }

    // Validate and sanitize input if needed
    $firstName = htmlspecialchars($firstName);
    $lastName = htmlspecialchars($lastName);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $contact = htmlspecialchars($contact);
    $address = htmlspecialchars($address);

    // Use these values, for example, insert them into the database or display a confirmation
    //echo "First Name: " . $firstName . "<br>";
    //echo "Last Name: " . $lastName . "<br>";
    //echo "Email: " . $email . "<br>";
    //echo "Contact: " . $contact . "<br>";
    //echo "Address: " . $address . "<br>";
    //echo "Total Amount: " . $totalAmount . "<br>";

    $query = "SELECT * FROM amenities";
    $result = $conn->query($query);
    if ($result) {
        $amenities = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        die("Error fetching rooms: " . $conn->error);
    }

    $amenitiesString = implode(',', $selectedAmenities);

    if (!empty($amenitiesString)) {
        $query = "SELECT * FROM amenities WHERE id IN ($amenitiesString)";
        $result = $conn->query($query);
        if ($result) {
            $result = $result->fetch_all();
            $amenitiesTotal = 0;
            foreach ($result as $amenity) {
                $price = (int)$amenity[2]; // Make sure to cast the price to an integer
                $amenitiesTotal += $price; // Add the price to the total sum
            }
        } else {
            die("Error fetching selected amenities: " . $conn->error);
        }
    } else {
        // Handle the case where no options were selected
        $amenitiesTotal = 0; // Ensure $amenitiesTotal is initialized
    }

    $paxTotals = [];

    foreach ($addedPax as $key => $pax) {
        $paxTotals[] = $pax * $paxPrice;
    }

    $totalSum = array_sum($paxTotals) + $amenitiesTotal;

    // Proceed with your booking confirmation logic here
}
