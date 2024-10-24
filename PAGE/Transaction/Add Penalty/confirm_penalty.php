<?php
include 'header';
?>

<body>
    <div class="main-container">
        <div class="side-nav">
            <div class="side-banner">
                <img src="../../../IMAGE/Asset 7 (2)@4x.png" />
                <img src="../../../IMAGE/Asset 10@4x.png" />
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
                        <img src="../../../IMAGE/nab.jpg" />
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
                    <div class="form-heading">
                        <p class="heading-4">Modify Penalty</p>
                        <p class="heading-5">Summary</p>
                    </div>
                </div>

                <form action="3_PenaltyConfirmed" class="main-form-container confirmation-container">
                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">PENALTY DETAILS</td>
                        </tr>
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

                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">PENALTY LIST</td>
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
                        <tr>
                            <td>Damge Pillow</td>
                            <td>:</td>
                            <td>₱ 300.00</td>
                        </tr>

                    </table>

                    <table class="detail-summary">
                        <tr class="summary-title">
                            <td colspan="3">COMPUTATION</td>
                        </tr>
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
                        <tr class="overall-amount">
                            <td>TOTAL</td>
                            <td>=</td>
                            <td>₱ 0.00</td>
                        </tr>
                    </table>
                </form>
                <div class="transaction-button">
                    <a href="1_AddPenalty" class="back-button">Back</a>
                    <a href="#" class="next-button confirm-button">confirm</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include '../../alert.php';
?>