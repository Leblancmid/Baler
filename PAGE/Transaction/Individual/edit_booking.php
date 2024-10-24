<?php
include 'edit_booking_form.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../../JS/script.js"></script>
    <script src="../../../JS/Transaction/date_selection.js"></script>
    <script src="../../../JS/Transaction/edit_booking.js"></script>
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
                    <a href="../../Index/dashboard.php">
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

            <div class="individual-container">
                <div class="individual-heading">
                    <a href="../booking.php">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Back
                    </a>
                    <p>
                        Booking Reference No.:
                        <span><?php echo isset($reference_no) ? htmlspecialchars($reference_no) : 'N/A'; ?></span>
                    </p>
                </div>
                <div class="individual-content">
                    <div class="record">
                        <p class="record-subheading">
                            <span>
                                <i class="fa-solid fa-user-tag"></i>
                                Client Details
                            </span>
                            <?php
                            // Get the ID from the URL parameter
                            $bookingId = isset($_GET['id']) ? intval($_GET['id']) : 0; // Default to 0 if not set
                            ?>

                            <button class="pop-indiv-clientInfo" data-id="<?php echo $bookingId; ?>">
                                <span>edit</span>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>


                        </p>
                        <table class="content">
                            <input type="hidden" name="id" value="<?php echo $bookingId; ?>">

                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?php echo $result['first_name'] . ' ' . $result['last_name']; ?></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $result['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Contact #</td>
                                <td>:</td>
                                <td><?php echo $result['contact']; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?php echo $result['address']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="record">
                        <p class="record-subheading">
                            <span>
                                <i class="fa-solid fa-door-closed"></i>
                                Room Details
                            </span>
                            <button class="pop-indiv-room">
                                <span>edit</span>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </p>
                        <table class="content">
                            <tr>
                                <td>Check In </td>
                                <td>:</td>
                                <td><?php echo $result['check_in']; ?></td>
                            </tr>
                            <tr>
                                <td>Check Out </td>
                                <td>:</td>
                                <td><?php echo $result['check_out']; ?></td>
                            </tr>
                            <?php foreach ($selectedRooms as $room) { ?>
                                <tr>
                                    <td><?php echo $room['pax']; ?> pax</td>
                                    <td>:</td>
                                    <td><?php echo $roomTypes[$room['type']]; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="record">
                        <p class="record-subheading">
                            <span>
                                <i class="fa-solid fa-square-plus"></i>
                                OTHER
                            </span>
                            <button class="pop-indiv-other">
                                <span>edit</span>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </p>
                        <table class="content">
                            <tr>
                                <td>Availed Amenities</td>
                                <td>:</td>
                                <td id="availed-amenities">
                                    <?php
                                    if (empty($selectedAmenities)) {
                                        echo "No availed amenities";
                                    } else {
                                        // Convert comma-separated string to array
                                        $amenitiesArray = explode(',', $selectedAmenities);
                                        echo count($amenitiesArray) . " availed amenities";
                                    }
                                    ?>
                                </td>
                            </tr>

                            <?php
                            if (!empty($amenities)) {
                                foreach ($amenities as $amenity) {
                            ?>
                                    <tr>
                                        <td><?php echo ucfirst($amenity['name']); ?></td>
                                        <td>:</td>
                                        <td>₱<?php echo number_format($amenity['price'], 2); ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                // If there are no amenities, display "No availed amenities"
                                echo "<tr><td>No availed amenities</td></tr>";
                            }
                            ?>

                            <tr>
                                <?php
                                // Check if the room type is 2 or 3
                                if (in_array($room['type'], [2, 3])) {
                                    // Ensure $index is defined and within bounds
                                    if (isset($index) && isset($paxTotals[$index]) && isset($addedPax[$index])) { ?>
                                        <td>Additional Pax</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo '₱' . number_format($paxTotals[$index], 2) . '  [' . intval($addedPax[$index]) . ']'; ?>
                                        </td>
                                    <?php } else { ?>
                                        <td colspan="3">No additional pax details available</td>
                                <?php }
                                }
                                ?>
                            </tr>

                        </table>

                        <table class="content">
                            <tr>
                                <td>AMOUNT</td>
                                <td>:</td>
                                <td><?php echo number_format($amenitiesTotal, 2); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="record">
                        <p class="record-subheading">
                            <span>
                                <i class="fa-solid fa-circle-exclamation"></i>
                                Penalty
                            </span>
                            <button class="pop-indiv-penalty">
                                <span>edit</span>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </p>
                        <table class="content">
                            <tr>
                                <td>Penaly 1 name</td>
                                <td>:</td>
                                <td>₱ 0.00</td>
                            </tr>
                            <tr>
                                <td>Penaly 2 name</td>
                                <td>:</td>
                                <td>₱ 0.00</td>
                            </tr>
                        </table>
                        <table class="content">
                            <tr>
                                <td>AMOUNT</td>
                                <td>:</td>
                                <td>₱ 0.00</td>
                            </tr>
                        </table>
                    </div>
                    <div class="record">
                        <p class="record-subheading">
                            <span>
                                <i class="fa-solid fa-rectangle-list"></i>
                                Computation
                            </span>
                        </p>
                        <table class="content">
                            <tr>
                                <td>Room</td>
                                <td>:</td>
                                <td>+ ₱ 0.00</td>
                            </tr>
                            <tr>
                                <td>Other</td>
                                <td>:</td>
                                <td>+ ₱ 0.00</td>
                            </tr>
                            <tr>
                                <td>Penalty</td>
                                <td>:</td>
                                <td>+ ₱ 0.00</td>
                            </tr>
                            <tr>
                                <td>PWD/Senior Discount %0</td>
                                <td>:</td>
                                <td>- ₱ 0.00</td>
                            </tr>
                            <tr>
                                <td>Promo Discount %0</td>
                                <td>:</td>
                                <td>- ₱ 0.00</td>
                            </tr>
                        </table>
                        <table class="content">
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>₱ 0.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="individual-button">
                    <div class="add-button">
                        <button class="payment">
                            <i class="fa-solid fa-peseta-sign"></i>
                            Add Payment
                        </button>
                        <button class="penalty">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            Add Penalty
                        </button>
                    </div>
                    <div class="modif-button">
                        <button class="print-record">
                            <i class="fa-solid fa-print"></i>
                            PRINT
                        </button>
                        <button class="edit-record">
                            <i class="fa-solid fa-pen-to-square"></i>
                            EDIT
                        </button>
                        <button class="delete-record">
                            <i class="fa-regular fa-trash-can"></i>
                            DELETE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    var selectedRoomsJs = "<?php echo $result['rooms']; ?>";
</script>

<?php
include '../../alert.php';
include 'pop_room.php';
include 'pop_client.php';
include 'pop_other.php';
?>