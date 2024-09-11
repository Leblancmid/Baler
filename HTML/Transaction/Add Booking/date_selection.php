<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../../JS/script.js"></script>
    <script src="../../../JS/date_selection.js"></script>
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
                        <p class="heading-5">Check-In and Check-Out Dates Selection</p>
                    </div>
                </div>
                <div class="date-container">
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
                            <div class="calendar-btn">
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
                </div>
                <form action="booking_info.php" method="GET" id="bookingForm">

                    <?php
                    if (isset($_GET['room-selection'])) {
                        foreach ($_GET['room-selection'] as $room) { ?>
                            <input type="hidden" name="room-selection[]" value="<?php echo $room; ?>">
                    <?php
                        }
                    }

                    $parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
                    ?>
                    <input type="hidden" name="price" value="<?php echo $_POST['price'] ?? ''; ?>">
                    <input type="hidden" name="startDate" id="startDate" value="<?php echo $_GET['startDate'] ?? ''; ?>">
                    <input type="hidden" name="endDate" id="endDate" value="<?php echo $_GET['endDate'] ?? ''; ?>">

                    <div class="transaction-button">
                        <a href="room_selection.php?<?php echo $parsedUrl; ?>" class="back-button">back</a>
                        <button type="button" class="view-details">
                            <p>Overall Total:</p>
                            <p class="total-amount" id="total-amount">₱0.00</p>
                        </button>
                        <a href="#" class="next-button date-next">next</a>
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

</html>