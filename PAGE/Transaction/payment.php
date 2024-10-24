<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../JS/script.js"></script>
    <script src="../../JS/Transaction/payment.js"></script>
    <link rel="icon" href="../../IMAGES/Asset 7 (2)@4x.png"><!--icon tab-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!--chart-->
    <link rel="stylesheet" href="../../CSS/newstyle.css" />
</head>

<body>
    <div class="main-container">
        <div class="side-nav">
            <div class="side-banner">
                <img src="../../IMAGES/Asset 7 (2)@4x.png" />
                <img src="../../IMAGES/Asset 10@4x.png" />
            </div>

            <div class="side-nav-content">
                <div class="navigation">
                    <a href="../Index/dashboard.php">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                    <a class="active-nav" href="booking.php">
                        <i class="fa-solid fa-bars-progress"></i>
                        <p>Transaction</p>
                    </a>
                    <a href="../accounts.php">
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
                        <img src="../../IMAGES/nab.jpg" />
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

            <!-- CONTENT -->
            <div class="content-navigation">
                <a href="booking.php">Booking</a>
                <a class="active-content" href="payment.php">Payment</a>
                <a href="penalty.php">Penalty</a>
            </div>

            <div class="section">
                <div class="search-bar">
                    <!-- live search po ito so no need button echendes? -->
                    <label for="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input id="search" type="text" placeholder="search...">
                </div>
                <button type="button" class="add-new" onclick="window.location.href='add_payment.php'">
                    <i class="fa-solid fa-plus"></i>
                    <!-- <span></span> -->
                    <p>add</p>
                </button>
            </div>

            <div class="table-container">
                <div class="record-container">
                    <table class="overall-table">
                        <thead class="record-header">
                            <tr>
                                <th>Earning ID</th>
                                <th>Booking Ref No</th>
                                <th>Payment Date</th>
                                <th>Payment Time</th>
                                <th>Payment Type</th>
                                <th>Payment Method</th>
                                <th>Payment Ref No</th>
                                <th>Amount</th>
                                <th>Modify</th>
                            </tr>
                        </thead>

                        <tbody class="record-list">
                            <tr>
                                <td>1234567890</td>
                                <td>1234567890</td>
                                <td>10-13-2024</td>
                                <td>5:41</td>
                                <td>Full</td>
                                <td>Gcash</td>
                                <td>1234567890</td>
                                <td>₱ 1,500</td>
                                <td class="modify-button">
                                    <button class="edit-button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span class="modify-edit">edit</span>
                                    </button>
                                    <button class="delete-button">
                                        <i class="fa-solid fa-ban"></i>
                                        <span class="modify-delete">delete</span>
                                    </button>
                                </td>
                            </tr>

                            <!-- wag mo gagalawin to for extra space sa baba to para di matabunan yung dropdown ng booking ref no -->
                            <tr>
                                <td>
                                    <br>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="sort">
                    <div class="sorting-section">
                        <div>
                            <label for="sort-day">Payment Date</label>
                            <input type="date" id="sort-day">
                        </div>
                        <div>
                            <label for="sort-type">Payment Type</label>
                            <select name="sort-paymentType">
                                <option value="default-status">Default</option>
                                <option value="fullPayment">Full</option>
                                <option value="downPayment">Down</option>
                            </select>
                        </div>
                        <div>
                            <label for="sort-method">Payment Method</label>
                            <select name="sort-paymentMethod">
                                <option value="default-status">Default</option>
                                <option value="cash">Cash</option>
                                <option value="gcash">Gcash</option>
                                <option value="bank">Online bank</option>
                            </select>
                        </div>
                        <fieldset class="header-sort">
                            <div>
                                <label>
                                    <input id="earning-id" type="checkbox" name="earning-id">
                                    Earning ID
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="booking-ref" type="checkbox" name="booking-ref">
                                    Booking Ref No.
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="payment-date" type="checkbox" name="payment-date">
                                    Payment Date
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="payment-time" type="checkbox" name="payment-time">
                                    Payment Time
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="payment-method" type="checkbox" name="payment-method">
                                    Payment Method
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="payment-ref" type="checkbox" name="payment-ref">
                                    Payment Ref No
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="payment-amount" type="checkbox" name="payment-amount">
                                    Amount
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <button class="reset-button">RESET</button>
                </div>
            </div>
        </div>
</body>

</html>

<?php
include '../alert.php';
?>