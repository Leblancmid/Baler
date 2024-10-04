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
    $options = $_GET['options'] ?? [];
    $additionalPax = $_GET['additionalPax'] ?? 0;
    $selectedRooms = $_GET['room-selection'];

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

    $optionsString = implode(',', $options);

    if (!empty($optionsString)) {
        $query = "SELECT * FROM amenities WHERE id IN ($optionsString)";
        $result = $conn->query($query);
        if ($result) {
            $selectedAmenities = $result->fetch_all();
            $amenitiesTotal = 0;
            foreach ($selectedAmenities as $amenity) {
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

    $paxTotal = $additionalPax * $paxPrice;
    $totalSum = $paxTotal + $amenitiesTotal;

    // Proceed with your booking confirmation logic here
}
