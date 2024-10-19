<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../../../IMAGES/Asset 7 (2)@4x.png"><!--icon tab-->
    <link rel="stylesheet" href="../../../STYLE/style.css" />
    <!-- the rest of js -->
    <script src="../../../JS/script.js"></script>
    <script src="../../../JS/Transaction/add_penalty.js"></script>
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

            <div class="form-container">
                <div class="form-header">
                    <div class="newpenalty-heading">
                        <p class="heading-4">Modify Penalty</p>
                        <p class="heading-5">Form</p>
                    </div>
                    <div class="main-form-navigation">
                        <div class="form-navigation">
                            <a class="active-penalty" href="#">All</a>
                            <a href="#">Property</a>
                            <a href="#">Appliance</a>
                            <a href="#">Equipment</a>
                            <a href="#">Facility</a>
                            <a href="#">Outdoor</a>
                            <a href="#">Rules</a>
                        </div>
                    </div>
                </div>
                <form action="2_ConfirmPenalty.php" class="main-form-container" id="penaltySelectionForm">
                    <div class="penalty-list">
                        <div class="penalty">
                            <label for="penalty-1">
                                <div class="penalty-text">
                                    <div class="penalty-details">
                                        <p class="penalty-name">Damage Pillow</p>
                                        <p class="penalty-type">property</p>
                                    </div>
                                    <p class="penalty-amount">₱ 300.00</p>
                                </div>
                            </label>
                            <input class="penalty-selection" type="checkbox" id="penalty-1" name="penalty-selection"
                                value="penalty-1">
                        </div>
                        <div class="penalty">
                            <label for="penalty-2">
                                <div class="penalty-text">
                                    <div class="penalty-details">
                                        <p class="penalty-name">Damage Pillow</p>
                                        <p class="penalty-type">property</p>
                                    </div>
                                    <p class="penalty-amount">₱ 300.00</p>
                                </div>
                            </label>
                            <input class="penalty-selection" type="checkbox" id="penalty-2" name="penalty-selection"
                                value="penalty-2">
                        </div>
                        <div class="penalty">
                            <label for="penalty-3">
                                <div class="penalty-text">
                                    <div class="penalty-details">
                                        <p class="penalty-name">Damage Pillow</p>
                                        <p class="penalty-type">property</p>
                                    </div>
                                    <p class="penalty-amount">₱ 300.00</p>
                                </div>
                            </label>
                            <input class="penalty-selection" type="checkbox" id="penalty-3" name="penalty-selection"
                                value="penalty-3">
                        </div>

                    </div>
                </form>
                <div class="transaction-button">
                    <a href="../penalty.php" class="back-button">back</a>
                    <a href="#" class="next-button penalty-next">next</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include '../../alert.php';
// include 'summary.php';
?>