<?php
include 'booking_form.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaction | Baler Nina</title>
  <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
  <script src="../../JS/script.js"></script>
  <link rel="icon" href="../../IMAGES/Asset 7 (2)@4x.png"><!--icon tab-->
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
        <a class="active-content" href="booking.php">Booking</a>
        <a href="rebooking.php">Re-Booking</a>
        <a href="#">Payment</a>
        <a href="#">Penalty</a>
      </div>

      <div class="section">
        <div class="search-bar">
          <!-- live search po ito so no need button echendes? -->
          <label for="search">
            <i class="fa-solid fa-magnifying-glass"></i>
          </label>
          <input id="search" type="text" placeholder="search...">
        </div>
        <button type="button" class="add-new" onclick="window.location.href='Add Booking/room_selection.php'">
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
                <th>Total</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Modify</th>
              </tr>
            </thead>

            <tbody class="record-list">
              <?php
              foreach ($bookings as $booking) {
              ?>
                <tr>
                  <td><?php echo htmlspecialchars($booking['reference_no']); ?></td>
                  <td><?php echo $booking['id']; ?></td>
                  <td><?php echo formatDate($booking['created_at']); ?></td>
                  <td><?php echo $booking['first_name'] . ' ' . $booking['last_name']; ?></td>
                  <td><?php echo formatDate($booking['check_in']); ?></td>
                  <td><?php echo formatDate($booking['check_out']); ?></td>
                  <td><?php echo $booking['total']; ?></td>
                  <td><?php echo $booking['balance']; ?></td>
                  <td class="record-status">
                    <select class="booking-status" name="status">
                      <option value="booked">Booked</option>
                      <option value="pending">Pending</option>
                      <option value="canceled">Canceled</option>
                      <option value="checkIn">Checked-In</option>
                      <option value="checkOut">Checked-Out</option>
                    </select>
                  </td>
                  <td class="modify-button">
                    <form action="edit_booking.php" method="POST">
                      <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                      <button type="submit" class="edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="modify-edit">edit</span>
                      </button>
                      <button class="delete-button">
                        <i class="fa-solid fa-ban"></i>
                        <span class="modify-delete">delete</span>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php
              }
              if (empty($bookings)) {
                echo "<tr><td colspan='3'>No records found</td></tr>";
              }
              ?>
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