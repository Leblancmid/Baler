<?php
include 'Form/room_selection_form.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../../JS/script.js"></script>
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
                    <a href="../../accounts.php">
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
                        <p class="heading-5">Room Selection</p>
                    </div>
                    <div class="main-form-navigation">
                        <div class="form-navigation">
                            <a href="#" class="active-room" data-filter="all">All</a>
                            <a href="#" data-filter="small">Small</a>
                            <a href="#" data-filter="big">Big</a>
                            <a href="#" data-filter="sweet">Sweet</a>
                        </div>
                    </div>
                </div>

                <!-- Add form element and method -->
                <form class="main-form-container" action="date_selection.php" method="GET" id="roomSelectionForm">
                    <div class="room-list">
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
                                            <button type="button" class="room-info">
                                                <i class="fa-solid fa-info"></i>
                                            </button>

                                        </div>
                                        <p class="room-type"><?php echo $roomTypes[$room['type']]; ?></p>
                                    </div>
                                </label>
                                <div class="room-content">
                                    <button type="button" class="button-close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <div class="room-description">
                                        <div class="image-container">
                                            <img class="main-image" src="<?php echo $room['image']; ?>">
                                        </div>
                                        <div class="room-pax">
                                            <div>
                                                <p><?php echo $room['pax']; ?></p>
                                                <p class="sub-room-type">&#91; ROOM TYPE:
                                                    <span><?php echo $roomTypes[$room['type']]; ?></span>&#93;
                                                </p>
                                            </div>
                                            <!-- <button type="button">SELECT</button> -->
                                        </div>
                                        <p class="price">₱ <?php echo number_format($room['price'], 2); ?></p>
                                        <p class="details"><?php echo $room['description']; ?></p>
                                        <p class="inclusion-title">Room Inclusions:</p>
                                        <div class="room-inclusion">
                                            <ul>
                                                <li>Full Airconditioned Room</li>
                                                <li>Private Bathroom</li>
                                                <li>Cable TV</li>
                                                <li>Towels</li>
                                                <li>Parking Space</li>
                                                <li>Common Kitchen at Ground Floor</li>
                                                <li>Grill</li>
                                                <li>Standby Generator</li>
                                                <li>Driver’s Quarter (for Travel and Tours Only)</li>
                                                <li>Swimming Pool</li>
                                                <li>Rooftop with Billiards (strictly exclusive for our guest)
                                                </li>
                                                <li>Surfboard Rental w/ Instructor</li>
                                                <li>Videoke Rental (for Ground Floor & Rooftop only)</li>
                                                <li>Convenience Store at Ground Floor</li>
                                                <li>24/7 Euronet ATM</li>
                                            </ul>
                                        </div>
                                        <!-- Other images for the room -->
                                        <div class="other-image">
                                            <div class="image-viewer">
                                                <button type="button" class="image">
                                                    <img src="../../../IMAGES/shayne.jpeg">
                                                </button>
                                                <div class="viewed-image">
                                                    <button type="button" class="image-close">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <p class="image-name">Room for 1-2 Pax</p>
                                                    <img src="../../../IMAGES/shayne.jpeg">
                                                </div>
                                            </div>
                                            <div class="image-viewer">
                                                <button type="button" class="image">
                                                    <img src="../../../IMAGES/room.jpg">
                                                </button>
                                                <div class="viewed-image">
                                                    <button type="button" class="image-close">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <p class="image-name">Room for 1-2 Pax</p>
                                                    <img src="../../../IMAGES/room.jpg">
                                                </div>
                                            </div>
                                            <div class="image-viewer">
                                                <button type="button" class="image">
                                                    <img src="../../../IMAGES/nab.jpg">
                                                </button>
                                                <div class="viewed-image">
                                                    <button type="button" class="image-close">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <p class="image-name">Room for 1-2 Pax</p>
                                                    <img src="../../../IMAGES/nab.jpg">
                                                </div>
                                            </div>
                                            <div class="image-viewer">
                                                <button type="button" class="image">
                                                    <img src="../../../IMAGES/hao.jpg">
                                                </button>
                                                <div class="viewed-image">
                                                    <button type="button" class="image-close">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <p class="image-name">Room for 1-2 Pax</p>
                                                    <img src="../../../IMAGES/hao.jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Room Selection Checkbox -->

                                <input class="room-selection" type="checkbox" id="room-<?php echo $room['id']; ?>"
                                    name="room-selection[]" value="<?php echo $room['id']; ?>">
                                <span class="display-none form-price"><?php echo $room['price']; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="price" id="total-price" value="">
                    <input type="hidden" name="startDate" id="startDate"
                        value="<?php echo htmlspecialchars($_GET['startDate'] ?? '', ENT_QUOTES); ?>">
                    <input type="hidden" name="endDate" id="endDate"
                        value="<?php echo htmlspecialchars($_GET['endDate'] ?? '', ENT_QUOTES); ?>">

                </form>

                <!-- Transaction buttons and summary -->
                <div class="transaction-button">
                    <!-- Back button -->
                    <div>
                        <a href="../booking.php" class="back-button">Back</a>
                    </div>

                    <!-- Button for viewing the details and total amount -->
                    <button type="button" class="view-details">
                        <p>Overall Total:</p>
                        <p class="total-amount" id="total-amount">₱0.00</p>
                    </button>

                    <!-- Submit and next buttons -->
                    <div class="transaction-button">
                        <a href="#" class="next-button room-next">next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include '../../alert.php';
include 'summary.php';
?>
<script src="../../../JS/Transaction/room_selection.js"></script>