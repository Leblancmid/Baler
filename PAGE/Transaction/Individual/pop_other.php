<?php

include 'edit_booking_form.php';

$roomPaxRatio = [];

$pairs = explode(',', $result['room_pax']);
// Loop through each pair and split by colon to get room id and pax values
foreach ($pairs as $pair) {
    $roomId = null;
    $pax = null;

    // Split the pair by colon and check if both values exist
    if (strpos($pair, ':') !== false) {
        list($roomId, $pax) = explode(':', $pair);
        $roomId = trim($roomId); // Optional: trim whitespace
        $pax = trim($pax);       // Optional: trim whitespace
    }

    // Set the pax value in the array only if both roomId and pax are valid
    if ($roomId !== null && $pax !== null) {
        $roomPaxRatio[$roomId] = (int)$pax; // Convert pax to integer
    }
}

function getPaxValue($roomId, $roomPaxRatio)
{
    return isset($roomPaxRatio[$roomId]) ? $roomPaxRatio[$roomId] : null;
}
?>

<!-- pop pop pop -->
<div class="individual-pop indiv-pop-container other-pop-up">
    <input type="hidden" name="booking_id" value="<?php echo $bookingId; ?>">
    <div class="pop-other">
        <div class="content">
            <p class="record-subheading">
                <i class="fa-solid fa-door-closed"></i>
                <span>Other</span>
                <button type="button" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </p>
            <div class="other-pop-options">
                <button class="pax-option">
                    <i class="fa-solid fa-person-circle-plus"></i>
                    <p>Update Additional Pax</p>
                </button>
                <button class="amenities-option" data-id="<?php echo $bookingId; ?>">
                    <i class="fa-solid fa-layer-group"></i>
                    <p>Update Amenities Selected</p>
                </button>
                <button class="id-option">
                    <i class="fa-solid fa-id-card"></i>
                    <p>Update PWD/Senior ID Record</p>
                </button>
                <button class="penalty-option">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <p>Update Penalty Record</p>
                </button>
            </div>

            <form class="other-content-1" action="pop_room_form.php" method="POST">
                <input type="hidden" name="booking_id" value="<?php echo $bookingId; ?>">
                <?php foreach ($selectedRooms as $key => $room) { ?>
                    <div class="selected-room-list">
                        <div class="selected-room">
                            <div class="selected-room-info">
                                <!-- <div class="room-IMAGES">
                                    <img src="../../../IMAGES/hao.jpg" alt="" class="actual-IMAGES">
                                </div> -->
                                <div class="room-text">
                                    <div class="room-details">
                                        <div class="room-heading">
                                            <p class="pax-number"><?php echo $room['pax']; ?></p>
                                            <p class="room-type">[<?php echo $roomTypes[$room['type']]; ?>]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (!in_array($room['type'], [2, 3])) { ?>
                                <input type="hidden" name="additionalPax[]" value="0">
                                <p>No additional pax</p>
                            <?php } else { ?>
                                if theres big rooms selected
                                <div class="add-pax-container">
                                    <label for="add-pax">Additional Pax:</label>
                                    <div class="add-pax-input">
                                        <button type="button" class="minus">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input type="text" name="addPax[<?php echo $room['id']; ?>]" class="add-pax" id="add-pax-<?php echo $room['id']; ?>" data-id="<?php echo $room['id']; ?>" value="<?php echo getPaxValue($room['id'], $roomPaxRatio); ?>">
                                        <button type="button" class="add">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                <?php } ?>
                <p class="note"><span>Note:</span> max of 2 addtional pax per room only</p>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="submit" class="update-room">save</button>
                </div>

            </form>

            <form class="other-content-2" action="pop_room_form.php" method="POST">
                <input type="hidden" name="booking_id" value="<?php echo $bookingId; ?>">
                <div class="details-input">
                    <p>Amenities:</p>
                    <div class="input-container">
                        <div class="amenities-option">
                            <input type="radio" name="choice" value="none" id="noneAmenities" checked data-id="<?php echo $bookingId; ?>">
                            <label for="noneAmenities">No</label>
                            <input type="radio" name="choice" value="yes" id="yesAmenities" data-id="<?php echo $bookingId; ?>">
                            <label for="yesAmenities">Add</label>
                        </div>
                        <div class="checkbox-container" style="display: none;"> <!-- Initially hidden -->
                            <div class="flex">
                                <input type="checkbox" name="options[]" id="gasul" value="<?php echo 1; ?>" <?php if (in_array(1, $amenitiesIds)) echo 'checked'; ?>>
                                <label for="gasul">
                                    Gasul
                                </label>
                                <span>₱ 300</span>
                            </div>
                            <div class="flex">
                                <input type="checkbox" name="options[]" id="karaoke" value="<?php echo 2; ?>" <?php if (in_array(2, $amenitiesIds)) echo 'checked'; ?>>
                                <label for="karaoke">
                                    Karaoke
                                </label>
                                <span>₱ 500</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="submit" class="update-room">save</button>
                </div>
            </form>

            <form action="" class="other-content-3">
                <div class="details-input">
                    <p>Senior Citizen/PWDs:</p>
                    <div id="input-container">
                        <!-- for id -->
                        <!-- <div class="id-container">
                                    <input type="text" placeholder="ID Number">
                                    <select name="idType">
                                        <option value="idPWD">PWD</option>
                                        <option value="idSenior">Senior</option>
                                    </select>
                                    <button type="button" class="id-remove">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div> -->
                    </div>
                    <div class="id-count">
                        <button type="button" id="add-id">Add ID</button>
                    </div>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-room">save</button>
                </div>
            </form>

            <form action="" class="other-content-4">
                <div class="penalty-record-list">
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <p>click here to add penalty to the record <button class="penalty">ADD PENALTY</button> </p>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-room">save</button>
                </div>
            </form>
        </div>
    </div>
</div>