<?php
include '../../connection.php';

// Fetch the existing data from the database
$sql = "SELECT first_name, last_name, email, contact, address FROM bookings WHERE id = 15"; // Adjust this for dynamic ID
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $email = $row["email"];
    $contact = $row["contact"];
    $address = $row["address"];
} else {
    echo "No results found.";
}

$conn->close();
?>

<div class="individual-pop indiv-pop-container clientInfo-pop-up">
    <div class="pop-clientInfo">
        <div class="content">
            <p class="record-subheading">
                <i class="fa-solid fa-user-tag"></i>
                <span>Client Details</span>
                <button type="button" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </p>
            <form action="edit_booking_form.php" method="POST">
                <div class="pop-input">
                    <div class="details-input">
                        <label for="clientFirstName">First Name:</label>
                        <input type="text" id="clientFirstName" name="first_name" value="<?php echo $first_name; ?>">
                    </div>
                    <div class="details-input">
                        <label for="clientLastName">Last Name:</label>
                        <input type="text" id="clientLastName" name="last_name" value="<?php echo $last_name; ?>">
                    </div>
                    <div class="details-input">
                        <label for="clientEmail">Email:</label>
                        <input type="email" id="clientEmail" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="details-input">
                        <label for="clientContact">Contact #:</label>
                        <input type="text" id="clientContact" name="contact" value="<?php echo $contact; ?>">
                    </div>
                    <div class="details-input">
                        <label for="clientAddress">Address:</label>
                        <input type="text" id="clientAddress" name="address" value="<?php echo $address; ?>">
                    </div>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">Cancel</button>
                    <button type="submit" class="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>