//for room selection
document.addEventListener('DOMContentLoaded', () => {
    const checks = document.querySelectorAll('.room-selection');

    const nextButton = document.querySelector('.room-next');
    let errorContainer = document.querySelectorAll('.message-alert');
    const errorMessage = document.querySelector('.alert-message');
    let total = 0;
    let selectedRooms = [];

    checks.forEach((check) => {
        check.addEventListener('change', (event) => {
            // Get the parent element with class "room"
            const room = event.target.parentNode;
            const roomId = room.querySelectorAll('.room-selection')[0].value
            const roomSummaries = document.querySelectorAll(`.room-summary-` + roomId);

            let price = parseInt(room.querySelector('.form-price').textContent);
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

                total = total + price;
                localStorage.setItem('totalPrice', total);
                selectedRooms.push(roomId);
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
                total = total - price;

                selectedRooms = selectedRooms.filter(room => room !== roomId);
            }

            roomSummaries.forEach(roomSummary => {
                if (selectedRooms.includes(roomId)) {
                    roomSummary.classList.remove('display-none');
                } else {
                    roomSummary.classList.add('display-none');
                }
            });

            document.getElementById('total-amount').textContent = total.toLocaleString('en-US', { style: 'currency', currency: 'PHP' });; // Submit the form
            document.getElementById('total-price').value = total

            document.getElementById('total-amount-summary').textContent = total.toLocaleString('en-US', { style: 'currency', currency: 'PHP' });
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

    // Check if any checkbox is selected on page load
    if (!Array.prototype.some.call(checks, (check) => check.checked)) {
        nextButton.disabled = true;
        nextButton.style.backgroundColor = 'gray';
    }

    // Add an event listener to the next button to display the error message
    nextButton.addEventListener('click', () => {
        if (!Array.prototype.some.call(checks, (check) => check.checked)) {
            errorMessage.textContent = "Select a room first before proceeding";
            errorContainer.forEach((element) => {
                element.style.display = 'flex';
            });
        } else {
            document.getElementById('roomSelectionForm').submit(); // Submit the form
        }
    });

    // Add an event listener to the OK button to hide the error message
    document.querySelectorAll('.ok-button').forEach((button) => {
        button.addEventListener('click', () => {
            button.parentNode.parentNode.style.display = 'none';
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
