<?php
include '../Add Booking/Form/room_selection_form.php';

// Initialize $rooms as an empty array to avoid warnings
$rooms = [];

$query = "SELECT id, type, image, pax, price, room_id, description FROM rooms"; // Adjust this to your table structure
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    // Fetch all rooms into the $rooms array
    $rooms = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Optional: you can set a message for no rooms found
    echo "No rooms found.";
}
?>

<div class="individual-pop indiv-pop-container room-pop-up">
    <div class="pop-room">
        <div class="content">
            <p class="record-subheading">
                <i class="fa-solid fa-door-closed"></i>
                <span>Room Details</span>
                <button type="button" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </p>

            <div class="room-pop-options">
                <button class="room-option">
                    <i class="fa-solid fa-door-open"></i>
                    <p>Update Room Selected</p>
                </button>
                <button class="check-date-option">
                    <i class="fa-solid fa-calendar-days"></i>
                    <p>Update Check-in and Check-out dates</p>
                </button>
            </div>

            <form class="room-content-2" action="">
                <div class="room-list">
                    <?php if (!empty($rooms)) { // Only loop if $rooms is not empty 
                    ?>
                        <?php foreach ($rooms as $room) { ?>
                            <div class="room room-<?php echo $roomClass[$room['type']]; ?>">
                                <label for="room-<?php echo $room['id']; ?>">
                                    <div class="room-image">
                                        <img class="actual-image" src="<?php echo $room['image']; ?>" />
                                    </div>
                                    <div class="room-text">
                                        <div class="room-details">
                                            <div class="room-heading">
                                                <p class="pax-number"><?php echo $room['pax'] . ' [Room ' . $room['room_id'] . ']'; ?></p>
                                                <p class="room-price">₱ <?php echo number_format($room['price'], 2); ?></p>
                                            </div>
                                        </div>
                                        <p class="room-type"><?php echo $roomTypes[$room['type']]; ?></p>
                                    </div>
                                </label>
                                <div class="room-content">
                                    <!-- Room content details here -->
                                </div>

                                <!-- Room Selection Checkbox -->
                                <input class="room-selection" type="checkbox" id="room-<?php echo $room['id']; ?>"
                                    name="room-selection[]" value="<?php echo $room['id']; ?>">
                                <span class="display-none form-price"><?php echo $room['price']; ?></span>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <p>No rooms available.</p>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>