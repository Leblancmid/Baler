<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rooms | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/accounts.js"></script>
    <link rel="icon" href="../IMAGES/Asset 7 (2)@4x.png"><!--icon tab-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!--chart-->
    <link rel="stylesheet" href="../CSS/newstyle.css" />
</head>

<body>
    <table class="overall-table">
                <thead class="record-header">
                <tr>
                    <th>Room ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>PAX</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody class="record-list">
                <?php
                foreach ($rooms as $room) {
                ?>
                    <tr>
                    <td><?php echo $room['id']; ?></td>
                    <!-- 
                    <td><?php echo formatDate($booking['created_at']); ?></td>
                    <td><?php echo $booking['first_name'] . ' ' . $booking['last_name']; ?></td>
                    <td><?php echo formatDate($booking['check_in']); ?></td>
                    <td><?php echo formatDate($booking['check_out']); ?></td>
                    <td><?php echo $booking['total']; ?></td>
                    <td><?php echo $booking['balance']; ?></td>
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
                    -->
                <?php
                }
                if (empty($rooms)) {
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

</body>
</html>
