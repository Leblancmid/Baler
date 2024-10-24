<?php
include 'Add Booking/Form/booking_form.php';

// Initialize sorting variables with default values
$orderBy = 'created_at'; // Default sorting column
$orderDirection = 'ASC'; // Default sorting direction

// Check if the form has been submitted
if (isset($_POST['sort_name'])) {
  if ($_POST['sort_name'] === 'ascending') {
    $orderBy = 'first_name';
    $orderDirection = 'ASC';
  } elseif ($_POST['sort_name'] === 'descending') {
    $orderBy = 'first_name';
    $orderDirection = 'DESC';
  }
}

// Use the sorting variables in your query
$query = "SELECT * FROM client ORDER BY $orderBy $orderDirection";
$bookings = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Baler Nina</title>
  <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
  <script src="../../JS/script.js"></script>
  <script src="../../JS/Transaction/booking.js"></script>
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
        <a class="active-content" href="booking.php">Booking</a>
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
        <button type="button" class="add-new" onclick="window.location.href='Add Booking/room_selection.php'">
          <i class="fa-solid fa-plus"></i>
          <!-- <span></span> -->
          <p>add</p>
        </button>
      </div>

      <div class="table-container">
        <div class="record-container">
          <table class="overall-table" id="bookingTable">
            <thead class="record-header">
              <tr>
                <th class="booking-ref">Booking Ref No.</th>
                <th class="room-id">Room Id</th>
                <th class="date-booked">Date Booked</th>
                <th class="client-name">Name</th>
                <th class="check-in">Check-In</th>
                <th class="check-out">Check-Out</th>
                <th class="total">Total</th>
                <th class="balance">Balance</th>
                <th class="booking-status">Status</th>
                <th class="modify-button">Modify</th>
              </tr>
            </thead>

            <tbody class="record-list" id="bookingBody">
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
                  <td>₱ <?php echo number_format($booking['total'], 2); ?></td>
                  <td><?php echo $booking['balance']; ?></td>
                  <td class="record-status">
                    <form method="POST" action="update_status.php">
                      <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                      <select class="booking-status" name="status">
                        <option value="1" <?php echo ($booking['status'] == 1) ? 'selected' : ''; ?>>Booked</option>
                        <option value="2" <?php echo ($booking['status'] == 2) ? 'selected' : ''; ?>>Pending</option>
                        <option value="3" <?php echo ($booking['status'] == 3) ? 'selected' : ''; ?>>Canceled</option>
                        <option value="4" <?php echo ($booking['status'] == 4) ? 'selected' : ''; ?>>Checked-In</option>
                        <option value="5" <?php echo ($booking['status'] == 5) ? 'selected' : ''; ?>>Checked-Out</option>
                      </select>
                      <button type="submit" class="update-button">
                        <i class="fa-solid fa-save"></i>
                      </button>
                    </form>
                  </td>
                  <td class="modify-button">
                    <button class="edit-button" data-id="<?php echo $booking['id']; ?>">
                      <i class="fa-solid fa-pen-to-square"></i>
                      <span class="modify-edit">edit</span>
                    </button>
                    <button class="delete-button">
                      <i class="fa-solid fa-ban"></i>
                      <span class="modify-delete">delete</span>
                    </button>
                  </td>
                </tr>
              <?php
              }
              if (empty($bookings)) {
                echo "<tr><td colspan='10'>No records found</td></tr>";
              }
              ?>
              <tr>
                <td colspan="10">
                  <br><br><br>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Sorting Controls -->
        <div class="sort">
          <div class="sorting-section">
            <!-- Make sure the select is inside a form element -->
            <form method="POST" action="booking.php">
              <label for="sort-name">Name</label>
              <select id="sort-name" name="sort_name" onchange="this.form.submit()">
                <option value="default" <?php echo (isset($_POST['sort_name']) && $_POST['sort_name'] == 'default') ? 'selected' : ''; ?>>Default</option>
                <option value="ascending" <?php echo (isset($_POST['sort_name']) && $_POST['sort_name'] == 'ascending') ? 'selected' : ''; ?>>Ascending</option>
                <option value="descending" <?php echo (isset($_POST['sort_name']) && $_POST['sort_name'] == 'descending') ? 'selected' : ''; ?>>Descending</option>
              </select>
            </form>

            <div>
              <label for="sort-date">Date Booked</label>
              <input type="date" id="sort-date">
            </div>
            <div>
              <label for="sort-status">Status</label>
              <select id="sort-status">
                <option value="default-status">Default</option>
                <option value="1">Booked</option>
                <option value="2">Pending</option>
                <option value="3">Canceled</option>
                <option value="4">Checked-In</option>
                <option value="5">Checked-Out</option>
              </select>
            </div>
          </div>
        </div>
      </div>

    </div>
</body>

</html>

<?php
include '../alert.php';
?>