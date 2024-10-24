document.addEventListener("DOMContentLoaded", function () {

    const currentMonthContainer = document.getElementById("currentMonthCalendar");
    const nextMonthContainer = document.getElementById("nextMonthCalendar");

    // Retrieve the total price from local storage and set roomPrice
    const storedTotalPrice = localStorage.getItem('totalPrice');
    let roomPrice = 0; // Default value if no price is found in local storage

    if (storedTotalPrice) {
        roomPrice = parseFloat(storedTotalPrice);
    }

    let currentDisplayedMonth = 0;
    let selectedStartDate = null;
    let selectedEndDate = null;

    function calculateTotal() {
        if (selectedStartDate && selectedEndDate) {
            const startTime = selectedStartDate.getTime();
            const endTime = selectedEndDate.getTime();
            const timeDiff = endTime - startTime;

            // Calculate the number of days between the start and end date
            const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
            let totalPrice = roomPrice * daysDiff;

            // Update the UI with the total price
            if (document.getElementById('total-amount')) {
                document.getElementById('total-amount').textContent = `₱${totalPrice.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            }

            // Store the total price in local storage
            localStorage.setItem('newTotalPrice', totalPrice.toFixed(2)); // Store as string
        }
    }


    // Call the function at the right place in your code (e.g., after date selection)

    function renderCalendar(container, offsetMonth) {
        const daysContainer = container.querySelector(".days");
        const month = container.querySelector(".calendar-month");

        const months = [
            "January", "February", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December"
        ];

        const date = new Date();
        let currentMonth = date.getMonth() + offsetMonth + currentDisplayedMonth;
        let currentYear = date.getFullYear();

        while (currentMonth > 11) {
            currentMonth -= 12;
            currentYear++;
        }
        while (currentMonth < 0) {
            currentMonth += 12;
            currentYear--;
        }

        date.setFullYear(currentYear, currentMonth, 1);
        date.setDate(1);

        const firstDay = new Date(currentYear, currentMonth, 1);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
        const lastDayIndex = lastDay.getDay();
        const lastDayDate = lastDay.getDate();
        const prevLastDay = new Date(currentYear, currentMonth, 0);
        const prevLastDayDate = prevLastDay.getDate();
        const nextDays = 7 - lastDayIndex - 1;
        const today = new Date();

        month.innerHTML = `${months[currentMonth]} ${currentYear}`;

        let days = "";

        for (let x = firstDay.getDay(); x > 0; x--) {
            days += `<div class="day prev">${prevLastDayDate - x + 1}</div>`;
        }

        for (let i = 1; i <= lastDayDate; i++) {
            let classList = ["day"];  // Start with "day" as the base class
            const currentDate = new Date(currentYear, currentMonth, i);
            if (currentDate < today) {
                classList.push("day-over");  // Add "day-over" class if the day is in the past
            }

            const year = currentDate.getFullYear();
            const month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Month is zero-based, so +1
            const day = currentDate.getDate().toString().padStart(2, '0');

            // Format the date as Y-m-d
            const formattedDate = `${year}-${month}-${day}`;

            let startDateDB = document.getElementById('startDate').value;
            let endDateDB = document.getElementById('endDate').value;

            console.log(startDateDB, formattedDate);
            if (startDateDB == formattedDate) {
                classList.push("selected-start");
            }

            if (formattedDate > startDateDB && formattedDate < endDateDB) {
                classList.push("in-range");
            }

            if (endDateDB == formattedDate) {
                classList.push("selected-end");
            }

            if (selectedStartDate) {
                let formattedSelectedStartDate = formatDate(selectedStartDate);
                let formattedSelectedCurrentDate = formatDate(currentDate);
                if (formattedSelectedStartDate === formattedSelectedCurrentDate) {
                    classList.push("selected-start");
                }
            }

            if (selectedEndDate) {
                let formattedSelectedEndDate = formatDate(selectedEndDate);
                let formattedSelectedCurrentDate = formatDate(currentDate);
                if (formattedSelectedEndDate === formattedSelectedCurrentDate) {
                    classList.push("selected-end");
                }
            }

            if (selectedStartDate && selectedEndDate &&
                currentDate > selectedStartDate && currentDate < selectedEndDate) {
                classList.push("in-range");
            }

            if (
                i === new Date().getDate() &&
                currentMonth === new Date().getMonth() &&
                currentYear === new Date().getFullYear()
            ) {
                classList.push("today");
            }

            // Join the classes into a single string
            const classString = classList.join(" ");

            days += `<div class="${classString}" data-date="${currentYear}-${currentMonth + 1}-${i}">${i}</div>`;
        }


        for (let j = 1; j <= nextDays; j++) {
            days += `<div class="day next">${j}</div>`;
        }

        daysContainer.innerHTML = days;

        // adding the text check in and out to the days
        const updateCheckInOutText = () => {
            const allDays = document.querySelectorAll(".day");
            allDays.forEach(day => {
                const checkedText = day.querySelector('p.checked-text');
                if (checkedText) {
                    checkedText.remove();
                }
            });

            allDays.forEach(day => {
                const dateStr = day.getAttribute("data-date");
                const date = new Date(dateStr);
                if (selectedStartDate && date.getTime() === selectedStartDate.getTime()) {
                    const checkedText = document.createElement('p');
                    checkedText.textContent = 'Check-in';
                    checkedText.classList.add("checked-text");
                    day.appendChild(checkedText);
                    day.style.backgroundColor = "var(--blue-1)";
                } else if (selectedEndDate && date.getTime() === selectedEndDate.getTime()) {
                    const checkedText = document.createElement('p');
                    checkedText.textContent = 'Check-out';
                    checkedText.classList.add("checked-text");
                    day.appendChild(checkedText);
                    day.style.backgroundColor = "var(--blue-1)";
                }
            });
        };

        updateCheckInOutText();

        // Add event listeners for date selection
        const calendarDays = container.querySelectorAll(".day:not(.next):not(.prev)");
        const errorMessage = document.querySelector(".alert-message");
        const errorContainer = document.querySelector(".message-alert");

        calendarDays.forEach(day => {
            day.addEventListener("click", () => {
                const clickedDate = new Date(day.getAttribute("data-date"));

                // Ensure the clicked date is not earlier than today
                // I know this will not be needed becoz I already disabled all the days that are finished. But just in case.
                if (clickedDate < new Date(new Date().setHours(0, 0, 0, 0))) {
                    errorContainer.style.display = "flex";
                    errorMessage.textContent = "You cannot select a check-in date earlier than today.";
                    return; // Exit if the date is invalid
                }

                if (!selectedStartDate) {
                    selectedStartDate = clickedDate;
                } else if (!selectedEndDate) {
                    if (clickedDate >= selectedStartDate) {
                        selectedEndDate = clickedDate;
                    } else {
                        errorContainer.style.display = "flex";
                        errorMessage.textContent = "Selected date must be later than the start date.";
                    }
                } else {
                    // Reset selection if both start and end dates are already selected
                    selectedStartDate = clickedDate;
                    selectedEndDate = null;
                }

                document.getElementById("startDate").value = shortenDate(selectedStartDate);
                document.getElementById("endDate").value = shortenDate(selectedEndDate);

                renderCalendar(currentMonthContainer, 0);
                renderCalendar(nextMonthContainer, 1);
                updateButtonColor();
                calculateTotal();
            });
        });
    };

    function formatDate(date) {
        return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
    }
    // for closing the alert message
    document.querySelectorAll('.ok-button').forEach((button) => {
        button.addEventListener('click', () => {
            button.parentNode.parentNode.style.display = 'none';
        });
    });


    function shortenDate(longDate) {
        var dateObj = new Date(longDate);
        var month = (dateObj.getMonth() + 1).toString().padStart(2, '0'); // Add 1 to month since it's zero-based
        var day = dateObj.getDate().toString().padStart(2, '0');
        var year = dateObj.getFullYear();

        return `${year}-${month}-${day}`;
    }

    const currentBtn = document.querySelector(".today");

    currentBtn.addEventListener("click", () => {
        currentDisplayedMonth = 0;
        selectedStartDate = null;
        selectedEndDate = null;
        renderCalendar(currentMonthContainer, 0);
        renderCalendar(nextMonthContainer, 1);
    });

    const nextBtns = document.querySelectorAll(".next");
    const prevBtns = document.querySelectorAll(".prev");

    nextBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            currentDisplayedMonth += 2;
            renderCalendar(currentMonthContainer, 0);
            renderCalendar(nextMonthContainer, 1);

            let prevBtn = document.querySelector('.prev');

            prevMonthDisable(prevBtn)
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            if (currentDisplayedMonth > 0) {
                currentDisplayedMonth -= 2;
                renderCalendar(currentMonthContainer, 0);
                renderCalendar(nextMonthContainer, 1);
            }
            prevMonthDisable(btn)
        });
        prevMonthDisable(btn)

    });

    function prevMonthDisable(btn) {
        if (currentDisplayedMonth === 0) {
            btn.disabled = true;
            btn.style.backgroundColor = 'var(--gray-1)';
        } else {
            btn.disabled = false;
            btn.style.backgroundColor = 'var(--blue-1)';
        }
    }

    renderCalendar(currentMonthContainer, 0);
    renderCalendar(nextMonthContainer, 1);

    //for next button of selecting of check in and out dates 
    const nextButton = document.querySelector(".date-next");
    const errorContainer = document.querySelector(".message-alert");
    const errorMessage = document.querySelector(".alert-message");

    //updating the button if theres a selected check in and check out dates
    function updateButtonColor() {
        if (!nextButton) {
            return;
        }
        if (selectedStartDate && selectedEndDate) {
            nextButton.style.backgroundColor = 'var(--blue-1)';
            nextButton.style.cursor = 'pointer';
            nextButton.addEventListener('mouseover', () => {
                nextButton.style.backgroundColor = 'var(--blue-4)';
            });
            nextButton.addEventListener('mouseout', () => {
                nextButton.style.backgroundColor = 'var(--blue-1)';
            });
        } else {
            nextButton.style.backgroundColor = 'var(--gray-1)';
            nextButton.style.cursor = 'not-allowed';
            nextButton.addEventListener('mouseover', () => {
                nextButton.style.backgroundColor = 'var(--gray-4)';
            });
            nextButton.addEventListener('mouseout', () => {
                nextButton.style.backgroundColor = 'var(--gray-1)';
            });
        }
    }

    //alert if theres a selected check in and check out dates before proceeding
    if (nextButton) {
        nextButton.addEventListener("click", () => {
            const newTotalPrice = localStorage.getItem('newTotalPrice');
            if (!(selectedStartDate && selectedEndDate)) {
                errorContainer.style.display = "flex";
                if (!selectedStartDate) {
                    errorMessage.textContent = "You must select a check-in and check-out date.";
                } else {
                    errorMessage.textContent = "You must select a check-out date.";
                }
            } else {
                document.getElementById('bookingForm').submit(); // Submit the form
            }
        });
        // Call this function whenever you update the displayed month
        updateButtonColor();
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const viewDetails = document.querySelectorAll('.view-details');
    const detailsAmount = document.querySelector('.details-amount');
    const closeDetails = document.querySelectorAll('.details-amount .button-close');

    viewDetails.forEach(button => {
        button.addEventListener("click", function (event) {
            event.stopPropagation();
            detailsAmount.style.display = "flex";
            detailsAmount.style.animationName = "fadeIn";
            detailsAmount.style.animationDuration = "200ms";
            detailsAmount.scrollTop = 0;
        });
    });

    closeDetails.forEach(button => {
        button.addEventListener("click", function (event) {
            detailsAmount.style.display = "none";
        });
    });
});