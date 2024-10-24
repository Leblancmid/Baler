<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../JS/script.js"></script>
    <script src="../../JS/Transaction/rebooking.js"></script>
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
                    <a href="../dashboard.php">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                    <a class="active-nav" href="booking.php">
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
                <a class="active-content" href="rebooking.php">Re-Booking</a>
                <a href="payment.php">Payment</a>
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
                <button type="button" class="add-new" onclick="window.location.href='Add Booking/date_selection.php'">
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
                                <th>Booking Ref No</th>
                                <th>Room ID</th>
                                <th>Date Booked</th>
                                <th>Name</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Modify</th>
                            </tr>
                        </thead>

                        <tbody class="record-list">
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-09-2024</td>
                                <td>Michael Nabong</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Shayne Danos</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Precious Yanga</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Jeff Calamay</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Ayevin Hao</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Andrea Lopez</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Shaine Ortiz</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Kyle Liezel</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Charles Bisnan</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Ransy Magalong</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Samuela Due</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Jamie Lozada</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Aliyah Roque</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234567890</td>
                                <td>103</td>
                                <td>11-08-2024</td>
                                <td>Sean Consignado</td>
                                <td>11-10-2024</td>
                                <td>11-15-2024</td>
                                <td class="modify-button">
                                    <button class="confirm-rebook">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="modify-confirm">confirm</span>
                                    </button>
                                    <button class="decline-rebook">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="modify-decline">decline</span>
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
                            <label for="sort-day">Name</label>
                            <select name="sort-day">
                                <option value="default">Default</option>
                                <option value="ascending">Ascending</option>
                                <option value="descending">Descending</option>
                            </select>
                        </div>
                        <div>
                            <label for="sort-day">Date Booked</label>
                            <!-- <select name="sort-day">
              <option value="default">Default</option>
              <option value="ascending">Ascending</option>
              <option value="descending">Descending</option>
            </select> -->
                            <input type="date" id="sort-day">
                        </div>
                        <div>
                            <label for="sort-status">Status</label>
                            <select name="sort-day">
                                <option value="default-status">Default</option>
                                <option value="booked">Booked</option>
                                <option value="pending">Pending</option>
                                <option value="canceled">Canceled</option>
                                <option value="checkIn">Checked-In</option>
                                <option value="checkOut">Checked-Out</option>
                            </select>
                        </div>
                        <fieldset class="header-sort">
                            <div>
                                <label>
                                    <input id="booking-ref" type="checkbox" name="booking-ref">
                                    Booking Ref No.
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="room-id" type="checkbox" name="room-id">
                                    Room Id
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="date-booked" type="checkbox" name="date-booked">
                                    Date Booked
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="client-name" type="checkbox" name="client-name">
                                    Name
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="check-in" type="checkbox" name="check-in">
                                    Check-In
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="check-out" type="checkbox" name="check-out">
                                    Check-Out
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="booking-status" type="checkbox" name="booking-status">
                                    Status
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="check-in" type="checkbox" name="check-in">
                                    Check-In
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="check-out" type="checkbox" name="check-out">
                                    Check-Out
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="booking-status" type="checkbox" name="booking-status">
                                    Status
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="check-in" type="checkbox" name="check-in">
                                    Check-In
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="check-out" type="checkbox" name="check-out">
                                    Check-Out
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="booking-status" type="checkbox" name="booking-status">
                                    Status
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