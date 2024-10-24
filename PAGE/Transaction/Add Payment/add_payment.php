<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../../JS/script.js"></script>
    <script src="../../../JS/Transaction/new_payment.js"></script>
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

            <div class="form-container">
                <div class="form-header">
                    <div class="formt-heading">
                        <p class="heading-4">Modify Payment</p>
                        <p class="heading-5">Form</p>
                    </div>
                </div>

                <form action="" class="main-form-container info-container">
                    <p class="heading-6">Payment Information</p>
                    <div class="payment-info">
                        <div class="details-input">
                            <label for="#">Booking Ref No</label>
                            <p>1234567890</p>
                        </div>
                        <div class="details-input">
                            <label for="#">Date of Payment</label>
                            <p>02/10/2024</p>
                        </div>
                        <div class="details-input">
                            <label for="#">Payment Type</label>
                            <select name="payment-type">
                                <option value="down">Down Payment</option>
                                <option value="full">Full Payment</option>
                            </select>
                        </div>
                        <div class="details-input">
                            <label for="#">Payment Type</label>
                            <select class="payment-option" name="mode-of-payment">
                                <option value="cash">CASH</option>
                                <option value="gcash">GCASH</option>
                                <option value="bank">ONLINE BANKING</option>
                            </select>
                        </div>
                        <!-- if the payment is cash this will not appear -->
                        <div class="details-input payment-ref">
                            <label for="refNo">Payment Ref No</label>
                            <input type="text" id="refNo">
                        </div>
                        <!--  -->
                        <div class="details-input payment-amount">
                            <label for="amount">Amount:</label>
                            <div class="amount">
                                <p>₱</p>
                                <input type="text" id="amount">
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Transaction buttons and summary -->
                <div class="transaction-button">
                    <a href="#" class="back-button">back</a>
                    <a href="confirm_payment.php" class="next-button payment-next">next</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include '../../alert.php';
?>