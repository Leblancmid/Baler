<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../JS/script.js"></script>
    <script src="../../JS/Transaction/penalty.js"></script>
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
                <a href="rebooking.php">Re-Booking</a>
                <a href="payment.php">Payment</a>
                <a class="active-content" href="penalty.php">Penalty</a>
            </div>

            <div class="section">
                <div class="search-bar">
                    <!-- live search po ito so no need button echendes? -->
                    <label for="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input id="search" type="text" placeholder="search...">
                </div>
                <button type="button" class="add-new" onclick="window.location.href='Add Penalty/1_AddPenalty.php'">
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
                                <th>Penalty ID</th>
                                <th>Booking Ref No</th>
                                <th>Penalty Name</th>
                                <th>Penalty Type</th>
                                <th>Penalty Fee</th>
                                <th>Modify</th>
                            </tr>
                        </thead>

                        <tbody class="record-list">
                            <tr>
                                <td>1234567890</td>
                                <td>1234567890</td>
                                <td>Damage Pillow</td>
                                <td>Property</td>
                                <td>₱ 300</td>
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
                            <tr>
                                <td>1234567890</td>
                                <td>1234567890</td>
                                <td>Damage Refrigerator</td>
                                <td>Appliance</td>
                                <td>₱ 500</td>
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
                            <label for="sort-penalty">Penalty ID</label>
                            <select name="sort-penalty">
                                <option value="default">Default</option>
                                <option value="ascending">Ascending</option>
                                <option value="descending">Descending</option>
                            </select>
                        </div>
                        <div>
                            <label for="sort-bookRef">Booking Ref No</label>
                            <select name="sort-bookRef">
                                <option value="default">Default</option>
                                <option value="ascending">Ascending</option>
                                <option value="descending">Descending</option>
                            </select>
                        </div>
                        <div>
                            <label for="sort-penaltyType">Penalty Type</label>
                            <select name="sort-penaltyType">
                                <option value="default-status">Default</option>
                                <option value="property">Property</option>
                                <option value="appliance">Appliance</option>
                                <option value="outdoor">Outdoor</option>
                                <!-- these aren't enough for penalty Type's--padagdag yung kulang -->
                            </select>
                        </div>
                        <fieldset class="header-sort">
                            <div>
                                <label>
                                    <input id="penalty-id" type="checkbox" name="penalty-id">
                                    Penalty ID
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
                                    <input id="penalty-name" type="checkbox" name="penalty-name">
                                    Payment Date
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="penalty-type" type="checkbox" name="penalty-type">
                                    Payment Type
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="penalty-fee" type="checkbox" name="penalty-fee">
                                    Payment Fee
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