<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../../JS/script.js"></script>
    <script src="../../../JS/Transaction/add_penalty.js"></script>
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

            <div class="individual-container">
                <div class="individual-heading">
                    <a href="../penalty.php">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Back
                    </a>
                </div>
                <div class="individual-content">
                    <div class="record">
                        <p class="record-subheading">
                            <span>
                                <i class="fa-solid fa-bars-staggered"></i>
                                Penalty Details
                            </span>
                        </p>
                        <table class="content">
                            <tr>
                                <td>Booking Ref No</td>
                                <td>:</td>
                                <td>1234567890</td>
                            </tr>
                            <tr>
                                <td>Date/Time of Penalty</td>
                                <td>:</td>
                                <td class="date-time">
                                    <p>02/10/2024</p>
                                    <p>9:49</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="record">
                        <p class="record-subheading">
                            <span>
                                <i class="fa-solid fa-circle-exclamation"></i>
                                Penalty List
                            </span>
                        </p>
                        <table class="content">
                            <tr>
                                <td>Damge Pillow</td>
                                <td>:</td>
                                <td>₱ 300.00</td>
                            </tr>
                            <tr>
                                <td>Damge Pillow</td>
                                <td>:</td>
                                <td>₱ 300.00</td>
                            </tr>
                            <tr>
                                <td>Damge Pillow</td>
                                <td>:</td>
                                <td>₱ 300.00</td>
                            </tr>
                            <tr>
                                <td>Damge Pillow</td>
                                <td>:</td>
                                <td>₱ 300.00</td>
                            </tr>
                            <tr>
                                <td>Damge Pillow</td>
                                <td>:</td>
                                <td>₱ 300.00</td>
                            </tr>
                        </table>
                        <table class="content">
                            <tr>
                                <td>Amount</td>
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
                                <td>Booking Total</td>
                                <td>:</td>
                                <td>₱ 0.00</td>
                            </tr>
                            <tr>
                                <td>Penalty Total</td>
                                <td>:</td>
                                <td>₱ 0.00</td>
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
                    <div class="modif-button">
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

<?php
include '../../alert.php';
?>