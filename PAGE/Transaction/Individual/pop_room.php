<?php
include '../Add Booking/Form/room_selection_form.php';

// Initialize $rooms as an empty array to avoid warnings
$rooms = [];

$query = "SELECT * FROM rooms"; // Adjust this to your table structure
$db_result = $conn->query($query);

if ($db_result && $db_result->num_rows > 0) {
    // Fetch all rooms into the $rooms array
    $rooms = $db_result->fetch_all(MYSQLI_ASSOC);
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

            <div class="room-content-1 main-form-container calendar-form">
                <div class="calendar" id="currentMonthCalendar">
                    <div class="calendar-header">
                        <div class="calendar-btn prev">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="calendar-month"></div>
                        <!-- today -->
                        <div class="calendar-btn today">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>
                    </div>
                    <div class="weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days">
                        <!-- displaying of days-->
                    </div>
                </div>

                <!-- Right Calendar: Next Month -->
                <div class="calendar" id="nextMonthCalendar">
                    <div class="calendar-header">
                        <div class="calendar-btn btn-disabled">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>
                        <div class="calendar-month"></div>
                        <div class="calendar-btn next">
                            <!-- next month -->
                            <div class="btn next">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days">
                    </div>
                </div>
                <form action="pop_room_form.php" method="POST">
                    <?php
                    if (isset($_GET['room-selection'])) {
                        foreach ($_GET['room-selection'] as $room) { ?>
                            <input type="hidden" name="room-selection[]" value="<?php echo $room; ?>">
                    <?php
                        }
                    }

                    ?>
                    <input type="hidden" name="booking_id" value="<?php echo $bookingId; ?>">
                    <input type="hidden" name="price" value="<?php echo $_GET['price'] ?? ''; ?>">
                    <input type="hidden" name="startDate" id="startDate" value="<?php echo $result['check_in'] ?? ''; ?>">
                    <input type="hidden" name="endDate" id="endDate" value="<?php echo $result['check_out'] ?? ''; ?>">
                    <button type="submit" class="pop-indiv-other">
                        <span>edit</span>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </form>
            </div>

            <form class="room-content-2" action="pop_room_form.php" method="POST">
                <input type="hidden" name="booking_id" value="<?php echo $bookingId; ?>">
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
                <button type="submit" class="pop-indiv-other">
                    <span>edit</span>
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>

            </form>
        </div>
    </div>
</div>