<?php
include '../../connection.php'
?>
<div class="details-amount">
    <button type="button" class="button-close">
        <i class="fa-solid fa-xmark"></i>
    </button>

    <p class="summary-heading">Summary</p>

    <div class="summary-main-container">
        <div class="summary-container">
            <!-- Room details -->
            <table class="detail-summary">
                <tr class="summary-title">
                    <td colspan="3">ROOM</td>
                </tr>

                <?php
                // Modify the loop to display only selected rooms
                foreach ($rooms as $room) { ?>
                    <tr class="display-none room-summary-<?php echo $room['id']; ?>">
                        <td>Room Name</td>
                        <td>:</td>
                        <td><?php echo $room['pax']; ?></td>
                    </tr>
                    <tr class="display-none room-summary-<?php echo $room['id']; ?>">
                        <td>Room Type</td>
                        <td>:</td>
                        <td><?php echo $roomTypes[$room['type']]; ?></td>
                    </tr>
                    <tr class="display-none room-summary-<?php echo $room['id']; ?>">
                        <td>Room Pax</td>
                        <td>:</td>
                        <td><?php echo $room['pax']; ?> pax</td>
                    </tr>
                    <tr class="display-none room-summary-<?php echo $room['id']; ?>">
                        <td>Price</td>
                        <td>:</td>
                        <td>₱ <?php echo $room['price']; ?></td>
                    </tr>
                    <tr class="display-none room-summary-<?php echo $room['id']; ?>">
                        <td></td>
                        <td>=======================================</td>
                        <td></td>
                    </tr>
                    <?php
                }
                ?>
                <tr class="price-text">
                    <td>AMOUNT</td>
                    <td>=</td>
                    <td>
                        <button type="button" class="view-details">
                            <p>Overall Total:</p>
                            <p class="total-amount" id="total-amount-summary">₱0.00</p>
                        </button>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>