<?php
include 'Form/booking_info_form.php';
include 'Form/confirm_booking_form.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../../JS/script.js"></script>
    <script src="../../../JS/Transaction/confirm_booking.js"></script>
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
                    <a href="#">
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

            <div class="form-container">
                <div class="form-header">
                    <div class="form-heading">
                        <p class="heading-4">Add New Booking</p>
                        <p class="heading-5">Summary</p>
                    </div>
                </div>

                <form class="main-form-container confirmation-container" action="booking_confirmed.php" id="confirmBookingForm" method="POST">
                    <input type="hidden" name="startDate" id="startDate"
                        value="<?php echo $_GET['startDate'] ?? ''; ?>">
                    <input type="hidden" name="endDate" id="endDate" value="<?php echo $_GET['endDate'] ?? ''; ?>">
                    <input type="hidden" name="firstName" value="<?php echo $firstName; ?>">
                    <input type="hidden" name="lastName" value="<?php echo $lastName; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                    <input type="hidden" name="address" value="<?php echo $address; ?>">
                    <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
                    <input type="hidden" name="paxTotal" value="<?php echo $paxTotal; ?>">
                    <input type="hidden" name="additionalPax[]" value="<?php echo $additionalPax; ?>">
                    <input type="hidden" name="roomPax" value="<?php echo $roomPax; ?>">
                    <input type="hidden" name="amenitiesString" value="<?php echo $amenitiesString; ?>">

                    <?php foreach ($amenities as $amenity) { ?>
                        <input type="hidden" name="amenities[]" value="<?php echo $amenity; ?>">
                    <?php } ?>

                    <?php
                    $selectedRooms = isset($selectedRooms) && is_array($selectedRooms) ? $selectedRooms : [];
                    ?>

                    <?php foreach ($selectedRooms as $selectedRoom) { ?>
                        <input type="hidden" name="rooms[]" value="<?php echo $selectedRoom; ?>">
                    <?php } ?>

                    <input type="hidden" name="paxTotal" value="<?php echo $paxTotal; ?>">

                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">CLIENT DETAILS</td>
                        </tr>
                        <tr>
                            <td>Client Name</td>
                            <td>:</td>
                            <td><?php echo $firstName; ?> <?php echo $lastName; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>:</td>
                            <td><?php echo $contact; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $address; ?></td>
                        </tr>
                    </table>
                    <table class="detail-summary room-confirm-list">
                        <tr class="summary-title">
                            <td colspan="3">ROOM DETAILS</td>
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
                        <!-- Loop through rooms to populate details -->
                        <?php foreach ($rooms as $index => $room) { ?>
                            <table class="detail-summary confirm-room">
                                <tr class="room-name">
                                    <td colspan="3">Room <?php echo $room['pax']; ?></td>
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
                                    <td>₱<span id="totalPrice<?php echo $index; ?>"><?php echo number_format($room['price'], 2); ?></span></td>

                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    if (!in_array($room['type'], [2, 3])) { ?>

                                    <?php } else { ?>
                                        <td>Additional Pax</td>
                                        <td>:</td>
                                        <td><?php echo $paxTotals[$index] . ' [' . $addedPax[$index] . ']'; ?> </td>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        <?php } ?>
                        <table class="detail-summary">
                            <tr class="price-text">
                                <td>Price</td>
                                <td>:</td>
                                <td><span id=""></span></td>

                            </tr>
                        </table>
                    </table>


                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">OTHER</td>
                        </tr>
                        <!-- Availed Amenities -->
                        <tr>
                            <td>Availed Amenities</td>
                            <td>:</td>
                            <td id="availed-amenities">
                                <?php echo empty($selectedAmenities) ? "No availed amenities" : count($selectedAmenities); ?>
                            </td>
                        </tr>

                        <!-- Individual Amenity Rows -->
                        <?php foreach ($amenities as $amenity) { ?>
                            <?php if (in_array($amenity['id'], $selectedAmenities)) { ?>
                                <tr>
                                    <td><?php echo ucfirst($amenity['name']); ?></td>
                                    <td>:</td>
                                    <td data-item="gasul">₱ <?php echo $amenity['price']; ?></td>
                                    <!-- Add data-item="gasul" here -->
                                </tr>
                        <?php }
                        } ?>

                        <!-- Total Amount -->
                        <tr class="price-text">
                            <td>AMOUNT</td>
                            <td>=</td>
                            <td>₱<?php echo number_format($totalSum, 2); ?></td>

                        </tr>
                    </table>


                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">COMPUTATION</td>
                        </tr>
                        <tr>
                            <td>ROOM</td>
                            <td>:</td>
                            <td id="roomTotal">₱ 0.00</td>
                        </tr>
                        <tr>
                            <td>OTHER</td>
                            <td>:</td>
                            <td>₱<?php echo number_format($totalSum, 2); ?></td>

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
                            <td><?php echo '₱' . number_format($totalAmount, 2, '.', ','); ?></td>
                            <!-- This will be updated by JavaScript -->
                        </tr>
                    </table>
                    <div class="transaction-button">
                        <?php $parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); ?>
                        <a href="booking_info.php?<?php echo $parsedUrl; ?>" class="back-button">back</a>
                        <a href="#" class="next-button confirm-button">confirm</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include '../../alert.php';
?>

<script>
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;
    let roomTotal = 0;
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
            document.getElementById("totalPrice<?php echo $index; ?>").textContent = totalPrice<?php echo $index; ?>.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            roomTotal += totalPrice<?php echo $index; ?>;
        <?php } ?>
        roomTotal = roomTotal.toLocaleString('en-US', {
            style: 'currency',
            currency: 'PHP'
        });
        document.getElementById('roomTotal').textContent = roomTotal;
    }
</script>