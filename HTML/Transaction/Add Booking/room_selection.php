<?php
include 'room_selection_form.php';
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
                    <a href="../../Dashboard.html">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                    <a class="active-nav" href="../Booking.html">
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
                        <p class="heading-5">Room Selection</p>
                    </div>
                    <div class="room-navigation">
                        <a href="#" class="active-room">All</a>
                        <a href="#">Small</a>
                        <a href="#">Big</a>
                        <a href="#">Sweet</a>
                    </div>
                </div>
                <form class="room-container" action="booking_info.php" method="POST">
                    <input type="hidden" name="startDate" id="startDate" value="<?php echo $_GET['startDate'] ?? ''; ?>">
                    <input type="hidden" name="endDate" id="endDate" value="<?php echo $_GET['endDate'] ?? ''; ?>">

                    <?php foreach ($rooms as $room) { ?>
                        <div class="room">
                            <label for="room-1">
                                <div class="room-image">
                                    <img class="actual-image" src="<?php echo $room['image'];?>" />
                                </div>
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number"><?php echo $room['name']; ?></p>
                                        <p class="room-price">₱ <?php echo $room['price']; ?><span>.00</span></p>
                                    </div>
                                    <button type="button" class="room-info">
                                        <i class="fa-solid fa-info"></i>
                                    </button>
                                    <div class="room-content">
                                        <button type="button" class="button-close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                        <div class="room-description">
                                            <div class="image-container">
                                                <img class="main-image" src="<?php echo $room['image'];?>">
                                            </div>
                                            <div class="room-pax">
                                                <div>
                                                    <p><?php echo $room['name'];?></p>
                                                    <p class="sub-room-type">&#91; ROOM TYPE: <span><?php echo $roomTypes[$room['type']]; ?></span>&#93;</p>
                                                </div>
                                                <button>SELECT</button>
                                            </div>
                                            <p class="price">₱ <?php echo $room['price']; ?></p>
                                            <p class="details"><?php echo $room['description']; ?></p>
                                            <p class="inclusion-title">Room Inclusions:</p>
                                            <div class="room-inclusion">
                                                <ul type="none">
                                                    <li>Full Aircondtioned Room</li>
                                                    <li>Private Bathroom</li>
                                                    <li>Cable TV</li>
                                                    <li>Towels</li>
                                                    <li>Parking Space</li>
                                                    <li>Common Kitchen at Ground Floor</li>
                                                    <li>Grill</li>
                                                    <li>Standby Generator</li>
                                                    <li>Driver’s Quarter(for Travel and Tours Only)</li>
                                                    <li>Swimming Pool</li>
                                                    <li>Rooftop with Billiards (strictly exclusive for our guest)</li>
                                                    <li>Surfboard Rental w/ Instructor</li>
                                                    <li>Videoke Rental (for Ground Floor & Rooftop only)</li>
                                                    <li>Convenince Store at Ground Floor</li>
                                                    <li>24/7 Euronet ATM</li>
                                                </ul>
                                            </div>
                                            <div class="other-image"><!--max of 4 image per room-->
                                                <div class="image-viewer">
                                                    <button type="button" class="image">
                                                        <img src="../../../IMAGES/shayne.jpeg">
                                                    </button>
                                                    <div class="viewed-image">
                                                        <button type="button" class="image-close">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                        <p class="image-name">Room for 1-2 Pax Room for 1-2 Pax Pax</p>
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
                                                        <p class="image-name">Room for 1-2 Pax Room for 1-2 Pax Pax</p>
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
                                                        <p class="image-name">Room for 1-2 Pax Room for 1-2 Pax Pax</p>
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
                                                        <p class="image-name">Room for 1-2 Pax Room for 1-2 Pax Pax</p>
                                                        <img src="../../../IMAGES/hao.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="room-type"><?php echo $roomTypes[$room['type']]; ?></p>
                            </label>
                            <input type="checkbox" id="room-1" name="room-selection" value="<?php echo $room['id']; ?>">
                        </div>
                    <?php } ?>
                </form>
                <div class="transaction-button">
                    <a href="../Booking.html" class="back-button">back</a>
                    <button type="button" class="view-details">
                        <p class="total-amount">₱ 0,000.00</p>
                        <p>Overall Total:</p>
                    </button>
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
                                        <td colspan="3">ROOM</td>
                                    </tr>
                                    <tr>
                                        <td>Room 1 Name</td>
                                        <td>:</td>
                                        <td>Room for 1-2 pax</td>
                                    </tr>
                                    <tr>
                                        <td>Room 1 Type</td>
                                        <td>:</td>
                                        <td>Small</td>
                                    </tr>
                                    <tr>
                                        <td>Room 1 Pax</td>
                                        <td>:</td>
                                        <td>2 pax</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>:</td>
                                        <td>₱ 0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Room 2 Name</td>
                                        <td>:</td>
                                        <td>Room for 1-2 pax</td>
                                    </tr>
                                    <tr>
                                        <td>Room 2 Type</td>
                                        <td>:</td>
                                        <td>Small</td>
                                    </tr>
                                    <tr>
                                        <td>Room 2 Pax</td>
                                        <td>:</td>
                                        <td>2 pax</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>:</td>
                                        <td>₱ 0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Check-in date</td>
                                        <td>:</td>
                                        <td>11-02-2024</td>
                                    </tr>
                                    <tr>
                                        <td>Check-out date</td>
                                        <td>:</td>
                                        <td>11-05-2024</td>
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
                                        <td>none</td>
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
                    <a href="javascript:void(0)" class="next-button room-next">next</a>
                </div>
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

</html>