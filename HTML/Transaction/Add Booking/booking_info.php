<?php
include 'booking_info_form.php';
include 'confirm_booking_form.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../../JS/script.js"></script>
    <script src="../../../JS/booking_info.js"></script>
    <link rel="icon" href="../../../IMAGES/Asset 7 (2)@4x.png"><!--icon tab-->
    <link rel="stylesheet" href="../../../CSS/newstyle.css" />
</head>

<body>
    <div class="main-container">
        <div class="side-nav">
            <div class="side-banner">
                <img src="../../../IMAGES/Asset 7 (2)@4x.png" />
                <img src="../../../IMAGES/Asset 10@4x.png" />
            </div>

            <div class="side-nav-content">
                <div class="navigation">
                    <a href="../../dashboard.php">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                    <a class="active-nav" href="../booking.php">
                        <i class="fa-solid fa-bars-progress"></i>
                        <p>Transaction</p>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                        <p>Accounts</p>
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-buffer"></i>
                        <p>Offers</p>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-door-open"></i>
                        <p>Rooms</p>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-window-restore"></i>
                        <p>Content Control</p>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-file-lines"></i>
                        <p>Reports</p>
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-font-awesome"></i>
                        <p>Logs</p>
                    </a>
                </div>
                <button type="button" class="navsize-button">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
            </div>
        </div>
        <div class="container">
            <div class="header">
                <div class="main-header">
                    <p class="heading-1">
                        <i class="fa-solid fa-bars-progress"></i>
                        TRANSACTION
                    </p>
                    <button class="user-icon">
                        <img src="../../../IMAGES/nab.jpg" />
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="drop-down drop-animate">
                        <p class="user-name">Adriane Nabong</p>
                        <div class="button">
                            <a href="#">
                                <i class="fa-solid fa-user-gear"></i>
                                ACCOUNT
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                SIGN OUT
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sub-header">
                    <p class="weekdays">MON</p>
                    <p class="date">June 10, 2024</p>
                    <p class="time">2:00</p>
                    <p class="am-pm">PM</p>
                </div>
            </div>

            <!-- room selection for new booking -->
            <div class="newbooking-container">
                <div class="room-header">
                    <div class="newbooking-heading">
                        <p class="heading-4">Add New Booking</p>
                        <p class="heading-5">Form</p>
                    </div>
                </div>
                <form class="info-container" action="confirm_booking.php" id="bookingInfoForm" method="GET">
                    <?php
                    if (isset($_GET['room-selection'])) {
                        foreach ($_GET['room-selection'] as $room) { ?>
                            <input type="hidden" name="room-selection[]" value="<?php echo $room; ?>">
                    <?php
                        }
                    }
                    ?>
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($_GET['price'] ?? '', ENT_QUOTES); ?>">
                    <input type="hidden" name="startDate" id="startDate" value="<?php echo htmlspecialchars($_GET['startDate'] ?? '', ENT_QUOTES); ?>">
                    <input type="hidden" name="endDate" id="endDate" value="<?php echo htmlspecialchars($_GET['endDate'] ?? '', ENT_QUOTES); ?>">

                    <p class="heading-6">Client information</p>
                    <div class="client-info">
                        <div class="details-input">
                            <label for="clientFirstName">First Name:</label>
                            <input type="text" name="first_name" id="clientFirstName" value="<?php echo $_GET['first_name'] ?? ''; ?>">
                        </div>
                        <div class="details-input">
                            <label for="clientLastName">Last Name:</label>
                            <input type="text" name="last_name" id="clientLastName" value="<?php echo $_GET['last_name'] ?? ''; ?>">
                        </div>
                        <div class="details-input">
                            <label for="clientEmail">Email:</label>
                            <input type="email" name="email" id="clientEmail" value="<?php echo $_GET['email'] ?? ''; ?>">
                        </div>
                        <div class="details-input">
                            <label for="clientContact">Contact #:</label>
                            <input type="text" name="contact" id="clientContact" value="<?php echo $_GET['contact'] ?? ''; ?>">
                        </div>
                        <div class="details-input">
                            <label for="clientAddress">Address:</label>
                            <input type="text" name="address" id="clientAddress" value="<?php echo $_GET['address'] ?? ''; ?>">
                        </div>
                    </div>
                    <p class="heading-6">Booking information</p>
                    <?php foreach ($rooms as $room) { ?>
                        <div class="booked-info">
                            <div class="details-input">
                                <p>Room Name:</p>
                                <p><?php echo $room['pax']; ?></p>
                            </div>
                            <div class="details-input">
                                <p>Room Type:</p>
                                <p><?php echo $roomTypes[$room['type']]; ?></p>
                            </div>
                            <div class="details-input d-flex flex-column fixed-width">
                                <p>Room Pax:</p>
                                <div class="d-flex no-wrap">
                                    <!-- <p class="w-50"><?php echo $room['pax']; ?> pax</p> -->
                                    <?php if (in_array($room['type'], [2, 3])) { ?>
                                        <div class="ms-2">
                                            <button class="counter-btn decrement-btn" id="decrement-btn-<?php echo $room['id']; ?>" type="button">-</button>
                                            <input type="number" name="additionalPax[]" id="counter-value-<?php echo $room['id']; ?>" class="counter-value" value="0" readonly>
                                            <button class="counter-btn increment-btn" id="increment-btn-<?php echo $room['id']; ?>" type="button">+</button>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class=" details-input">
                                <p>Check-in date:</p>
                                <p><?php echo $checkInDate; ?></p>
                            </div>
                            <div class="details-input">
                                <p>Check-out date:</p>
                                <p><?php echo $checkOutDate; ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="booking-info">
                        <div class="details-input">
                            <div class="add-pax">
                                <h1>P350 per head (max of 2 only per ROOM)</h1>
                            </div>
                        </div>
                        <div class="details-input">
                            <p>Add Amenities?</p>
                            <div class="input-container">
                                <div class="amenities-option">
                                    <input type="radio" name="choice" value="none" id="noneAmenities" checked>
                                    <label for="noneAmenities">No</label>
                                    <input type="radio" name="choice" value="yes" id="yesAmenities">
                                    <label for="yesAmenities">Yes</label>
                                </div>
                                <div class="checkbox-container">
                                    <?php foreach ($amenities as $amenity) { ?>
                                        <div class="flex">
                                            <input type="checkbox" name="amenities[]" id="<?php echo $amenity['name']; ?>" value="<?php echo $amenity['id']; ?>">
                                            <label for="<?php echo $amenity['name']; ?>">
                                                <span class="checked-amenities">✔</span>
                                                <?php echo $amenity['name']; ?>
                                            </label>
                                            <span>₱<?php echo $amenity['price']; ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
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
                                <p>Total no.: <span id="total-counts">0</span></p>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="hidden-total-amount" name="totalAmount" value="0">
                    <button type="button" class="view-details">
                        <p>Overall Total:</p>
                        <p class="total-amount" id="booking-total-amount">₱0.00</p>
                    </button>
                    <div class="transaction-button">
                        <?php $parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); ?>
                        <a href="date_selection.php?<?php echo $parsedUrl; ?>" class="back-button">back</a>
                        <a href="#" class="next-button date-next">next</a>

                        <div class="details-amount">
                            <button type="button" class="button-close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <p class="summary-heading">Summary</p>
                            <div class="summary-main-container">
                                <div class="summary-container">
                                    <!-- <p class="summary-subheading">ROOM 1</p>                             -->
                                    <table class="detail-summary">
                                        <tr class="summary-title">
                                            <td colspan="3">ROOM DETAILS</td>
                                        </tr>
                                        <?php foreach ($rooms as $room) { ?>
                                            <tr>
                                                <td>Room Name</td>
                                                <td>:</td>
                                                <td><?php echo $room['pax']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Room Type</td>
                                                <td>:</td>
                                                <td><?php echo $roomTypes[$room['type']]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <td>:</td>
                                                <td>₱ <?php echo $room['price']; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>=======================================</td>
                                                <td></td>
                                            </tr>
                                        <?php  } ?>
                                        <tr>
                                            <td>Check-in date</td>
                                            <td>:</td>
                                            <td><?php echo $_GET['startDate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Check-out date</td>
                                            <td>:</td>
                                            <td><?php echo $_GET['endDate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total no. of stay</td>
                                            <td>:</td>
                                            <td>4</td>
                                        </tr>
                                        <tr class="price-text">
                                            <td>AMOUNT</td>
                                            <td>=</td>
                                            <td>₱ 0.00</td>
                                        </tr>
                                    </table>
                                    <table class="detail-summary">
                                        <tr class="summary-title">
                                            <td colspan="3">OTHER</td>
                                        </tr>
                                        <!-- if no amenities avail. This is the display -->
                                        <tr>
                                            <td>Availed Amenities</td>
                                            <td>:</td>
                                            <td id="availed-amenities"><?php echo count($amenities); ?></td>
                                        </tr>
                                        <!-- else this will be displayed -->
                                        <tr>
                                            <td>Gasul</td>
                                            <td>:</td>
                                            <td>₱ 0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Karaoke</td>
                                            <td>:</td>
                                            <td>₱ 0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Additional Pax x0</td>
                                            <td>:</td>
                                            <td>none</td>
                                        </tr>
                                        <!-- if theres additional pax -->
                                        <tr>
                                            <td>Additional Pax x2</td>
                                            <td>:</td>
                                            <td>₱ 0.00</td>
                                        </tr>
                                        <tr class="price-text">
                                            <td>AMOUNT</td>
                                            <td>=</td>
                                            <td>₱ 0.00</td>
                                        </tr>
                                    </table>
                                    <table class="detail-summary">
                                        <tr class="summary-title">
                                            <td colspan="3">COMPUTATION</td>
                                        </tr>
                                        <tr>
                                            <td>ROOM</td>
                                            <td>:</td>
                                            <td>+ ₱ 0.00</td>
                                        </tr>
                                        <tr>
                                            <td>OTHER</td>
                                            <td>:</td>
                                            <td>+ ₱ 0.00</td>
                                        </tr>
                                        <tr>
                                            <td>DISCOUNTS</td>
                                        </tr>
                                        <tr class="discount-text">
                                            <td>PWD/Senior Discount</td>
                                            <td>:</td>
                                            <td>%</td>
                                        </tr>
                                        <tr class="discount-text">
                                            <td>Promo Discount</td>
                                            <td>:</td>
                                            <td>%</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>:</td>
                                            <td>- (amount)</td>
                                        </tr>
                                        <tr class="overall-amount">
                                            <td>TOTAL</td>
                                            <td>=</td>
                                            <td>₱ 0,000.00</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="message-alert">
                    <div class="alert-container">
                        <p class="alert-heading">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            Warning
                        </p>
                        <p class="alert-message"></p>
                        <button type="button" class="ok-button">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Iterate over each room to initialize their respective counters
        <?php foreach ($rooms as $room): ?>
            <?php
            if ($room['type'] == 1) {
                continue;
            }
            ?>
            let counter<?php echo $room['id']; ?> = 0;

            // Elements
            const decrementBtn<?php echo $room['id']; ?> = document.getElementById('decrement-btn-<?php echo $room['id']; ?>');
            const incrementBtn<?php echo $room['id']; ?> = document.getElementById('increment-btn-<?php echo $room['id']; ?>');
            const counterValue<?php echo $room['id']; ?> = document.getElementById('counter-value-<?php echo $room['id']; ?>');

            // Update counter value display
            function updateCounter<?php echo $room['id']; ?>() {
                counterValue<?php echo $room['id']; ?>.value = counter<?php echo $room['id']; ?>;
                incrementBtn<?php echo $room['id']; ?>.classList.toggle('disabled', counter<?php echo $room['id']; ?> === 2);
                decrementBtn<?php echo $room['id']; ?>.classList.toggle('disabled', counter<?php echo $room['id']; ?> === 0);
            }

            // Increment button
            incrementBtn<?php echo $room['id']; ?>.addEventListener('click', function() {
                if (counter<?php echo $room['id']; ?> < 2) {
                    counter<?php echo $room['id']; ?>++;
                    updateCounter<?php echo $room['id']; ?>();
                }
            });

            // Decrement button
            decrementBtn<?php echo $room['id']; ?>.addEventListener('click', function() {
                if (counter<?php echo $room['id']; ?> > 0) {
                    counter<?php echo $room['id']; ?>--;
                    updateCounter<?php echo $room['id']; ?>();
                }
            });

            // Initialize counter
            updateCounter<?php echo $room['id']; ?>();
        <?php endforeach; ?>
    });
</script>

</html>