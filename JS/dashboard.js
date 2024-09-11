document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('myChart').getContext('2d');
    const data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [
            {
                label: 'Category1',
                data: salesData,
                backgroundColor: '#22326e'
            }
        ]
    };

    const monthData = {
        labels: Array.from({ length: 31 }, (_, i) => `August ${i + 1}`),
        datasets: [
            {
                label: 'Category1',
                data: monthlySalesData, // Replace this with actual daily data for the month
                backgroundColor: '#22326e'
            }
        ]
    };

    const options = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: false,
                text: 'Monthly Data'
            },
            legend: {
                display: false,
                position: 'top'
            }
        },
        scales: {
            x: {
                stacked: true,
            },
            y: {
                stacked: true
            }
        }
    };

    // Create the chart
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });

    const chartSelect = document.getElementById('chart-select');
    const leftButton = document.getElementById('left-button');
    const rightButton = document.getElementById('right-button');

    function toggleChart() {
        myChart.destroy(); // Destroy current chart instance

        if (chartSelect.textContent === "Year") {
            chartSelect.textContent = "Year";
            myChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        } else {
            chartSelect.textContent = "Month";
            myChart = new Chart(ctx, {
                type: 'bar',
                data: monthData,
                options: options
            });
        }
    }

    // Event listeners for buttons
    leftButton.addEventListener("click", toggleChart);
    rightButton.addEventListener("click", toggleChart);

    // Update the chart on resize of screen
    window.addEventListener('resize', () => {
        myChart.destroy();
        myChart = new Chart(ctx, {
            type: 'bar',
            data: chartSelect.textContent === "Year" ? data : monthData, // Use the correct data based on the current view
            options: options
        });
    });
});