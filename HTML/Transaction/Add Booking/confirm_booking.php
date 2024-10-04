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
    <script src="../../../JS/confirm_booking.js"></script>
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
                        <p class="heading-5">Summary</p>
                    </div>
                </div>

                <form class="confirmation-container" action="booking_confirmed.php">
                    <input type="hidden" name="startDate" id="startDate" value="<?php echo $_GET['startDate'] ?? ''; ?>">
                    <input type="hidden" name="endDate" id="endDate" value="<?php echo $_GET['endDate'] ?? ''; ?>">
                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">ROOM DETAILS</td>
                        </tr>
                        <!-- Loop through rooms to populate details -->
                        <?php foreach ($rooms as $index => $room) { ?>
                            <tr>
                                <td>Room Name</td>
                                <td>:</td>
                                <td><?php echo $room['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Room Type</td>
                                <td>:</td>
                                <td><?php echo $roomTypes[$room['type']]; ?></td>
                            </tr>
                            <tr>
                                <td>Room Pax</td>
                                <td>:</td>
                                <td><?php echo $room['pax']; ?> pax</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>:</td>
                                <td>₱ <span id="totalPrice<?php echo $index; ?>"><?php echo $room['price']; ?></span></td>
                            </tr>
                            <tr>
                                <td>Check-in date</td>
                                <td>:</td>
                                <td><?php echo $_GET['startDate'] ?? ''; ?></td>
                            </tr>
                            <tr>
                                <td>Check-out date</td>
                                <td>:</td>
                                <td><?php echo $_GET['endDate'] ?? ''; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>==============</td>
                                <td></td>
                            </tr>

                        <?php } ?>
                    </table>

                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">OTHER</td>
                        </tr>
                        <!-- Availed Amenities -->
                        <tr>
                            <td>Availed Amenities</td>
                            <td>:</td>
                            <td id="availed-amenities"><?php echo count($options); ?></td>
                        </tr>

                        <!-- Individual Amenity Rows -->
                        <?php foreach ($amenities as $amenity) { ?>
                            <?php if (in_array($amenity['id'], $options)) { ?>
                                <tr>
                                    <td><?php echo ucfirst($amenity['name']); ?></td>
                                    <td>:</td>
                                    <td data-item="gasul">₱ <?php echo $amenity['price']; ?></td> <!-- Add data-item="gasul" here -->
                                </tr>
                        <?php }
                        } ?>

                        <!-- Additional Pax -->
                        <tr>
                            <td>Additional Pax x<?php echo $additionalPax; ?></td>
                            <td>:</td>
                            <td>₱ <?php echo $paxTotal; ?></td>
                        </tr>

                        <!-- Total Amount -->
                        <tr class="price-text">
                            <td>AMOUNT</td>
                            <td>=</td>
                            <td>₱<?php echo $totalSum; ?></td>
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
                        <tr id="booking-total-amount" class="overall-amount">
                            <td>TOTAL</td>
                            <td>=</td>
                            <td><?php echo '₱' . number_format($totalAmount, 2, '.', ','); ?></td> <!-- This will be updated by JavaScript -->
                        </tr>
                    </table>
                    <div class="transaction-button">
                        <?php $parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); ?>
                        <a href="booking_info.php?<?php echo $parsedUrl; ?>" class="back-button">back</a>
                        <a href="#" class="next-button confirm-button">confirm</a>
                    </div>
                </form>

                <div class="message-alert">
                    <div class="alert-container">
                        <p class="alert-heading">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            Warning
                        </p>
                        <p class="alert-message"></p>
                        <div class="confirm-option">
                            <button type="button" class="no-button">NO</button>
                            <button type="button" class="yes-button">YES</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    if (startDate && endDate) {
        var start = new Date(startDate);
        var end = new Date(endDate);
        var timeDifference = end - start;
        var daysDifference = timeDifference / (1000 * 3600 * 24);
        if (daysDifference < 1) {
            daysDifference = 1;
        }

        <?php foreach ($rooms as $index => $room) { ?>
            var roomPrice<?php echo $index; ?> = <?php echo $room['price']; ?>;
            var totalPrice<?php echo $index; ?> = roomPrice<?php echo $index; ?> * daysDifference;
            document.getElementById("totalPrice<?php echo $index; ?>").textContent = totalPrice<?php echo $index; ?>.toFixed(2);
        <?php } ?>
    }
</script>