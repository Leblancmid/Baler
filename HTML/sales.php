<?php
include 'connection.php';

// Fetch today's sales
$todaySalesResult = $conn->query("SELECT SUM(amount) as total FROM sales WHERE date = CURDATE()");
$todaySales = $todaySalesResult ? $todaySalesResult->fetch_assoc()['total'] : 0;

// Fetch current month's sales
$currentMonth = date('m');
$monthSalesResult = $conn->query("SELECT SUM(amount) as total FROM sales WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = YEAR(CURDATE())");
$monthSales = $monthSalesResult ? $monthSalesResult->fetch_assoc()['total'] : 0;

// Fetch current year's sales
$currentYear = date('Y');
$yearSalesResult = $conn->query("SELECT SUM(amount) as total FROM sales WHERE YEAR(date) = '$currentYear'");
$yearSales = $yearSalesResult ? $yearSalesResult->fetch_assoc()['total'] : 0;

// Sales data for the current year
$salesDataResult = $conn->query("SELECT MONTH(date) as month, SUM(amount) as total FROM sales WHERE YEAR(date) = '$currentYear' GROUP BY MONTH(date)");
$salesData = array_fill(1, 12, 0); // Initialize an array for 12 months

while ($row = $salesDataResult->fetch_assoc()) {
    $salesData[$row['month']] = $row['total'];
}

// Sales data for the current month (daily)
$currentMonth = date('m');
$monthlySalesDataResult = $conn->query("SELECT DAY(date) as day, SUM(amount) as total FROM sales WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear' GROUP BY DAY(date)");
$monthlySalesData = array_fill(1, 31, 0); // Initialize an array for 31 days (max days in a month)

while ($row = $monthlySalesDataResult->fetch_assoc()) {
    $monthlySalesData[$row['day']] = $row['total'];
}

// Convert the PHP arrays to JSON for use in JavaScript
$salesDataJSON = json_encode(array_values($salesData));

$monthlySalesDataResult = $conn->query("SELECT DAY(date) as day, SUM(amount) as total FROM sales WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear' GROUP BY DAY(date)");
$monthlySalesData = array_fill(1, 31, 0); // Initialize an array for 31 days (max days in a month)

while ($row = $monthlySalesDataResult->fetch_assoc()) {
    $monthlySalesData[$row['day']] = $row['total'];
}

$monthlySalesDataJSON = json_encode(array_values($monthlySalesData));

$conn->close();
