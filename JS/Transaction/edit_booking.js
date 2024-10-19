document.addEventListener('DOMContentLoaded', () => {
    const popupClientInfo = document.querySelectorAll('.pop-indiv-clientInfo');
    const closePop = document.querySelectorAll('.cancel');
    const closeButton = document.querySelectorAll('.close-button');
    const popupRoom = document.querySelectorAll('.pop-indiv-room')
    const selectRoom = document.querySelectorAll('.room-option');
    const selectDate = document.querySelectorAll('.check-date-option');
    const popOther = document.querySelectorAll('.pop-indiv-other');
    const selectPax = document.querySelectorAll('.pax-option');
    const selectAmenities = document.querySelectorAll('.amenities-option');
    const selectID = document.querySelectorAll('.id-option');
    const selectPenalty = document.querySelectorAll('.penalty-option');
    const popPenalty = document.querySelectorAll('.pop-indiv-penalty');
    const buttonPayment = document.querySelectorAll('.payment');
    const buttonPenalty = document.querySelectorAll('.penalty');
    const buttonEdit = document.querySelectorAll('.edit-record');
    const buttonDelete = document.querySelectorAll('.delete-record');

    popupClientInfo.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.clientInfo-pop-up').style.display = 'flex';
            document.querySelector('.pop-clientInfo').style.animationName = 'zoomIn';
            document.querySelector('.pop-clientInfo form').style.display = 'flex';
        });
    });

    popupRoom.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.room-pop-up').style.display = 'flex';
            document.querySelector('.pop-room').style.animationName = 'zoomIn';
            document.querySelector('.room-pop-options').style.display = 'flex';
            document.querySelector('.room-content-2').style.display = 'none';
            document.querySelector('.room-content-1').style.display = 'none';
        });
    });

    popOther.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.other-pop-up').style.display = 'flex';
            document.querySelector('.pop-other').style.animationName = 'zoomIn';
            document.querySelector('.other-pop-options').style.display = 'flex';
            document.querySelector('.other-content-1').style.display = 'none';
            document.querySelector('.other-content-2').style.display = 'none';
            document.querySelector('.other-content-3').style.display = 'none';
            document.querySelector('.other-content-4').style.display = 'none';
        });
    });

    selectRoom.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.room-pop-options').style.display = 'none';
            document.querySelector('.room-content-2').style.display = 'flex';
        });
    });

    selectDate.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.room-pop-options').style.display = 'none';
            document.querySelector('.room-content-1').style.display = 'flex';
        });
    });

    selectPax.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.other-pop-options').style.display = 'none';
            document.querySelector('.other-content-1').style.display = 'flex';
        });
    });

    selectAmenities.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.other-pop-options').style.display = 'none';
            document.querySelector('.other-content-2').style.display = 'flex';
        });
    });

    selectID.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.other-pop-options').style.display = 'none';
            document.querySelector('.other-content-3').style.display = 'flex';
        });
    });

    selectPenalty.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.other-pop-options').style.display = 'none';
            document.querySelector('.other-content-4').style.display = 'flex';
        });
    });

    popPenalty.forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelector('.other-pop-up').style.display = 'flex';
            document.querySelector('.pop-other').style.animationName = 'zoomIn';
            document.querySelector('.other-content-4').style.display = 'flex';
            document.querySelector('.other-pop-options').style.display = 'none';
            document.querySelector('.other-content-1').style.display = 'none';
            document.querySelector('.other-content-2').style.display = 'none';
            document.querySelector('.other-content-3').style.display = 'none';
        });
    });

    closePop.forEach((btn) => {
        btn.addEventListener('click', () => {
            btn.closest('.indiv-pop-container').style.display = 'none';
        });
    });

    closeButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            btn.closest('.indiv-pop-container').style.display = 'none';
        });
    });

    buttonPayment.forEach((btn) => {
        btn.addEventListener('click', () => {
            window.location.href = '../Add Payment/add_payment.php';
        });
    });

    buttonPenalty.forEach((btn) => {
        btn.addEventListener('click', () => {
            window.location.href = '../Add Penalty/1_AddPenalty.php';
        });
    });

    buttonEdit.forEach((btn) => {
        btn.addEventListener('click', () => {
            window.location.href = 'Add Booking/edit.php';
        });
    });


    const errorContainer = document.querySelectorAll('.alert-type-3');
    const errorMessage = document.querySelectorAll('.alert-message');
    buttonDelete.forEach((btn) => {
        btn.addEventListener('click', () => {
            errorMessage.forEach((text) => {
                text.textContent = "Do you want to delete this record?";
            });
            errorContainer.forEach((alert) => {
                alert.style.display = 'flex';
            });
        });
    });

    document.querySelectorAll('.button-no').forEach((button) => {
        button.addEventListener('click', () => {
            errorContainer.forEach((alert) => {
                alert.style.display = 'none';
            });
        });
    });
});

// for pop up room
document.addEventListener('DOMContentLoaded', () => {
    const checks = document.querySelectorAll('.room-selection');

    checks.forEach((check) => {
        check.addEventListener('change', (event) => {
            // Get the parent element with class "room"
            const room = event.target.parentNode;

            if (event.target.checked) {
                // Add the background color to the selected room element
                room.style.backgroundColor = 'var(--blue-1)';
                room.style.backgroundBlendMode = 'color-burn';
                room.querySelectorAll('.pax-number').forEach((element) => {
                    element.style.color = 'var(--white)';
                });
                room.querySelectorAll('.room-price').forEach((element) => {
                    element.style.color = 'var(--white)';
                });
                room.querySelectorAll('.room-type').forEach((element) => {
                    element.style.color = 'var(--white)';
                });
                room.querySelectorAll('p.room-type').forEach((element) => {
                    const beforeStyle = getComputedStyle(element, '::before');
                    const afterStyle = getComputedStyle(element, '::after');

                    element.style.setProperty('--before-background-color', 'var(--white)');
                    element.style.setProperty('--after-background-color', 'var(--white)');
                });
                room.querySelectorAll('.room-info').forEach((element) => {
                    element.style.backgroundColor = 'var(--white)'; // set background color
                    element.style.color = 'var(--blue-1)';
                });
                room.querySelectorAll('.actual-image').forEach((element) => {
                    element.style.scale = '1.15';
                });

            } else {
                // Reset styles of deselected room
                room.style.backgroundColor = 'var(--white)';
                room.style.backgroundBlendMode = '';
                room.querySelectorAll('.pax-number').forEach((element) => {
                    element.style.color = 'var(--blue-1)';
                });
                room.querySelectorAll('.room-price').forEach((element) => {
                    element.style.color = 'var(--blue-1)';
                });
                room.querySelectorAll('.room-type').forEach((element) => {
                    element.style.color = 'var(--blue-1)';
                });
                room.querySelectorAll('.room-info').forEach((element) => {
                    element.style.backgroundColor = 'var(--blue-1)';
                    element.style.color = 'var(--white)';
                });
                room.querySelectorAll('p.room-type').forEach((element) => {
                    const beforeStyle = getComputedStyle(element, '::before');
                    const afterStyle = getComputedStyle(element, '::after');

                    element.style.setProperty('--before-background-color', 'var(--blue-1)');
                    element.style.setProperty('--after-background-color', 'var(--blue-1)');
                });
                room.querySelectorAll('.actual-image').forEach((element) => {
                    element.style.scale = '';
                });

                total = total - price;
            }
            document.getElementById('total-amount').textContent = total.toLocaleString('en-US', { style: 'currency', currency: 'PHP' });; // Submit the form
            document.getElementById('total-price').value = total
            // Check if any checkbox is selected
            if (Array.prototype.some.call(checks, (check) => check.checked)) {
                nextButton.disabled = false;
                nextButton.style.backgroundColor = 'var(--blue-1)';
                nextButton.style.cursor = 'pointer';
                errorContainer.forEach((element) => {
                    element.style.display = 'none';
                });
            } else {
                nextButton.disabled = true;
                nextButton.style.backgroundColor = 'gray';
            }
        });
    });

    document.querySelectorAll('.room-navigation a').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            // Remove 'active-room' class from all links
            document.querySelectorAll('.room-navigation a').forEach(link => {
                link.classList.remove('active-room');
            });

            // Add 'active-room' class to the clicked link
            this.classList.add('active-room');

            // Get the filter value (all, small, big, sweet)
            const filter = this.getAttribute('data-filter');
            // Show or hide rooms based on the filter
            document.querySelectorAll('.room').forEach(room => {
                if (filter === 'all') {
                    room.style.display = 'block'; // Show all rooms
                } else if (room.classList.contains(`room-${filter}`)) {
                    room.style.display = 'block'; // Show matching rooms
                } else {
                    room.style.display = 'none';  // Hide other rooms
                }
            });
        });
    });
});

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
            document.getElementById('total-amount').textContent = `₱${totalPrice.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

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
            let classList = "day";
            const currentDate = new Date(currentYear, currentMonth, i);

            if (currentDate < today) {
                classList += " day-over"; // Add "day-over" class if the day is in the past
            }

            if (selectedStartDate && selectedStartDate.getTime() === currentDate.getTime()) {
                classList += " selected-start";
            }

            if (selectedEndDate && selectedEndDate.getTime() === currentDate.getTime()) {
                classList += " selected-end";
            }

            if (selectedStartDate && selectedEndDate &&
                currentDate > selectedStartDate && currentDate < selectedEndDate) {
                classList += " in-range";
            }


            if (
                i === new Date().getDate() &&
                currentMonth === new Date().getMonth() &&
                currentYear === new Date().getFullYear()
            ) {
                classList += " today";
            }

            days += `<div class="${classList}" data-date="${currentYear}-${currentMonth + 1}-${i}">${i}</div>`;
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
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            if (currentDisplayedMonth > 0) {
                currentDisplayedMonth -= 2;
                renderCalendar(currentMonthContainer, 0);
                renderCalendar(nextMonthContainer, 1);
            }
        });
        if (currentDisplayedMonth === 0) {
            btn.disabled = true;
            btn.style.backgroundColor = 'var(--gray-1)';
        } else {
            btn.disabled = false;
        }
    });

    renderCalendar(currentMonthContainer, 0);
    renderCalendar(nextMonthContainer, 1);

    //for next button of selecting of check in and out dates 
    const nextButton = document.querySelector(".date-next");
    const errorContainer = document.querySelector(".message-alert");
    const errorMessage = document.querySelector(".alert-message");

    //updating the button if theres a selected check in and check out dates
    function updateButtonColor() {
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

});

document.addEventListener('DOMContentLoaded', () => {
    const addButton = document.getElementById("add-id");
    const inputsContainer = document.getElementById("input-container");
    const checkboxContainer = document.querySelector('.checkbox-container');

    let inputCount = 0;

    addButton.addEventListener("click", function () {
        if (inputCount === 0) {
            inputCount++;
            const inputContainer = document.createElement("div");
            inputContainer.classList.add("id-container");
            addButton.style.display = 'none';

            const idInput = document.createElement("input");
            idInput.setAttribute("type", "text");
            idInput.classList.add("id-input");
            idInput.setAttribute("placeholder", "ID Number");
            inputContainer.appendChild(idInput);

            const selectInput = document.createElement("select");
            const options = [
                { value: "idPWD", text: "PWD" },
                { value: "idSenior", text: "Senior" }
            ];
            options.forEach(option => {
                const optionElement = document.createElement("option");
                optionElement.value = option.value;
                optionElement.textContent = option.text;
                selectInput.appendChild(optionElement);
            });
            inputContainer.appendChild(selectInput);

            const removeButton = document.createElement("button");
            removeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            removeButton.classList.add("id-remove");
            removeButton.addEventListener("click", function () {
                inputContainer.remove();
                inputCount--;
                addButton.style.display = 'block';
            });
            inputContainer.appendChild(removeButton);

            inputsContainer.appendChild(inputContainer);
        }
    });

    document.querySelectorAll('.amenities-option input').forEach((input) => {
        input.addEventListener('change', () => {
            checkboxContainer.style.display = input.id === 'yesAmenities' ? 'flex' : 'none';

            // Reset amenities when 'No' is selected
            if (input.id === 'noneAmenities') {
                checkboxContainer.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
            }
        });
    });

    // Get all the add and minus buttons
    const addButtons = document.querySelectorAll('.add');
    const minusButtons = document.querySelectorAll('.minus');

    // Get the alert message elements
    const messageAlert = document.querySelector('.alert-type-1');
    const messageNote = document.querySelector('.alert-message');
    const okButton = document.querySelector('.ok-button');

    // Add event listeners to the buttons
    addButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const container = button.closest('.add-pax-container');
            const inputField = container.querySelector('.add-pax');
            const currentValue = parseInt(inputField.value);
            if (currentValue < 2) {
                inputField.value = currentValue + 1;
            } else {
                inputField.value = 2;
                messageNote.textContent = "max of additional 2 pax only";
                messageAlert.style.display = "flex";
            }
        });
    });

    minusButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const container = button.closest('.add-pax-container');
            const inputField = container.querySelector('.add-pax');
            const currentValue = parseInt(inputField.value);
            if (currentValue > 0) {
                inputField.value = currentValue - 1;
            }
        });
    });

    // Add event listener to the input field
    const inputFields = document.querySelectorAll('.add-pax');
    inputFields.forEach((inputField) => {
        inputField.value = 0;
        inputField.addEventListener('input', function () {
            const inputValue = this.value;
            if (inputValue.startsWith('0') && inputValue.length > 1) {
                this.value = inputValue.substring(1);
            }
            const numericValue = parseInt(this.value);
            if (numericValue < 0 || numericValue > 2) {
                this.value = 0;
                messageNote.textContent = "max of additional 2 pax only";
                messageAlert.style.display = "flex";
            } else {
                inputField.style.outline = "none";
            }
        });
    });

    // Add event listener to the OK button
    okButton.addEventListener("click", () => {
        messageAlert.style.display = "none";
    });
});

// document.addEventListener("DOMContentLoaded", function () {
//     // Get the radio input and checkbox container
//     const checkboxContainer = document.querySelector('.checkbox-container');

//     document.querySelectorAll('.amenities-option input').forEach((input) => {
//         if (input.checked) {
//             checkboxContainer.style.display = input.id === 'yesAmenities' ? 'flex' : 'none';
//         }

//         input.addEventListener('change', () => {
//             checkboxContainer.style.display = input.id === 'yesAmenities' ? 'flex' : 'none';
//         });
//     });

//     const addButton = document.getElementById("add-id");
//     const inputsContainer = document.getElementById("input-container");
//     const totalInputs = document.getElementById("total-counts");

//     let inputCount = 0;

//     addButton.addEventListener("click", function () {
//         inputCount++;
//         const inputContainer = document.createElement("div");
//         inputContainer.classList.add("id-container");

//         const idInput = document.createElement("input");
//         idInput.setAttribute("type", "text");
//         idInput.classList.add("id-input");
//         idInput.setAttribute("placeholder", "ID Number");
//         inputContainer.appendChild(idInput);

//         const selectInput = document.createElement("select");
//         const options = [
//             { value: "idPWD", text: "PWD" },
//             { value: "idSenior", text: "Senior" }
//         ];
//         options.forEach(option => {
//             const optionElement = document.createElement("option");
//             optionElement.value = option.value;
//             optionElement.textContent = option.text;
//             selectInput.appendChild(optionElement);
//         });
//         inputContainer.appendChild(selectInput);

//         const removeButton = document.createElement("button");
//         removeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
//         removeButton.classList.add("id-remove");
//         removeButton.addEventListener("click", function () {
//             inputContainer.remove();
//             inputCount--;
//             totalInputs.textContent = inputCount;
//         });
//         inputContainer.appendChild(removeButton);

//         inputsContainer.appendChild(inputContainer);
//         totalInputs.textContent = inputCount;
//     });

//     const messageAlert = document.querySelector('.message-alert');
//     const messageNote = document.querySelector('.alert-message');
//     const okButton = document.querySelector('.ok-button');
//     const inputField = document.querySelector('.add-pax input');

//     okButton.addEventListener("click", () => {
//         messageAlert.style.display = "none";
//     });

//     inputField.value = 0;

//     inputField.addEventListener('input', function () {
//         const inputValue = this.value;
//         if (inputValue.startsWith('0') && inputValue.length > 1) {
//             this.value = inputValue.substring(1);
//         }
//         const numericValue = parseInt(this.value);
//         if (numericValue < 0 || numericValue > 2) {
//             this.value = 0;
//             messageNote.textContent = "max of additional 2 pax only";
//             messageAlert.style.display = "flex";
//             inputField.style.outline = "1px solid red";
//         } else {
//             inputField.style.outline = "none";
//         }
//     });
// });