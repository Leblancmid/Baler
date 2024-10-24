<?php
include 'sales.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script>
        const salesData = <?php echo $salesDataJSON; ?>;
        const monthlySalesData = <?php echo $monthlySalesDataJSON; ?>;
    </script> <!--chart database-->
    <script src="../../JS/script.js"></script>
    <script src="../../JS/Index/dashboard.js"></script>
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
                    <a class="active-nav" href="dashboard.php">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                    <a href="../Transaction/booking.php">
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
                        <i class="fa-solid fa-chart-line"></i>
                        DASHBOARD
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
                            <a href="login.php">
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
            <div class="content-section">
                <p class="heading-2">Status</p>
                <div class="status-content">
                    <a href="#" class="status">
                        <div class="status-info">
                            <p class="status-name">Current Booking</p>
                            <p class="status-count">10</p>
                        </div>
                        <i class="fa-solid fa-book"></i>
                    </a>
                    <a href="#" class="status">
                        <div class="status-info">
                            <p class="status-name">Canceled Booking</p>
                            <p class="status-count">2</p>
                        </div>
                        <i class="fa-solid fa-rectangle-xmark"></i>

                    </a>
                    <a href="#" class="status">
                        <div class="status-info">
                            <p class="status-name">Re-Booking Request</p>
                            <p class="status-count">2</p>
                        </div>
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a href="#" class="status">
                        <div class="status-info">
                            <p class="status-name">Pending Booking</p>
                            <p class="status-count">5</p>
                        </div>
                        <i class="fa-solid fa-book-open-reader"></i>
                    </a>
                    <a href="#" class="status">
                        <div class="status-info">
                            <p class="status-name">Available Rooms</p>
                            <p class="status-count">3</p>
                        </div>
                        <i class="fa-solid fa-door-closed"></i>

                    </a>
                </div>
            </div>
            <div class="sales-section">
                <div class="content-section">
                    <div class="content-heading">
                        <p class="heading-2">Total Sales</p>
                        <button class="eye" id="toggleVisibility"><i class="fa-solid fa-eye-slash"></i></button>
                    </div>
                    <div class="sales">
                        <div class="sales-amount" data-original="<?= number_format($todaySales, 2) ?: '0.00'; ?>">
                            <div class="sub-heading">Today</div>
                            <div class="heading-3">₱ <?= number_format($todaySales, 2); ?></div>
                        </div>
                        <div class="sales-amount" data-original="<?= number_format($monthSales, 2) ?: '0.00'; ?>">
                            <div class="sub-heading">Month (<?= strtoupper(date('F')); ?>)</div>
                            <div class="heading-3">₱ <?= number_format($monthSales, 2); ?></div>
                        </div>
                        <div class="sales-amount" data-original="<?= number_format($yearSales, 2) ?: '0.00'; ?>">
                            <div class="sub-heading">Year (<?= $currentYear; ?>)</div>
                            <div class="heading-3">₱ <?= number_format($yearSales, 2); ?></div>
                        </div>
                    </div>
                </div>


                <div class="content-section">
                    <div class="content-heading">
                        <div class="heading-2">Sales Chart</div>
                        <div class="chart-button">
                            <button id="left-button">
                                <i class="fa-solid fa-caret-left"></i>
                            </button>
                            <p class="chart-select" id="chart-select">Year</p>
                            <button id="right-button">
                                <i class="fa-solid fa-caret-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="chart">
                        <div class="chart-heading">
                            <button><i class="fa-solid fa-chevron-left"></i></button>
                            <p class="chart-name"><?php echo date('Y'); ?></p>
                            <button><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                        <div class="graph">
                            <canvas id="myChart" class="chart-size"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    const chartSelect = document.getElementById("chart-select");
    const leftButton = document.getElementById("left-button");
    const rightButton = document.getElementById("right-button");

    function toggleChart() {
        if (chartSelect.textContent === "Year") {
            chartSelect.textContent = "Month";
        } else {
            chartSelect.textContent = "Year";
        }
    }

    leftButton.addEventListener("click", toggleChart);
    rightButton.addEventListener("click", toggleChart);

    // Get the button and sales amount elements
    const toggleButton = document.getElementById('toggleVisibility');
    const salesAmounts = document.querySelectorAll('.sales-amount');

    // Initial state to track visibility
    let areVisible = true;

    // Add click event listener to the button
    toggleButton.addEventListener('click', () => {
        // Toggle visibility
        areVisible = !areVisible;

        // Change the display of sales amounts
        salesAmounts.forEach(amount => {
            const amountValue = amount.querySelector('.heading-3');
            if (areVisible) {
                amountValue.textContent = `₱ ${amount.dataset.original}`;
            } else {
                amountValue.textContent = '₱ ******';
            }
        });

        // Change the icon based on visibility state
        toggleButton.innerHTML = `<i class="fa-solid ${areVisible ? 'fa-eye-slash' : 'fa-eye'}"></i>`;
    });
</script>