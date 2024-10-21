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
        nextButton.style.cursor = 'warning';
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

    document.querySelectorAll('.form-navigation a').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            // Remove 'active-room' class from all links
            document.querySelectorAll('.form-navigation a').forEach(link => {
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

//for viewing room content and closing it etc.
//all about the room content
document.addEventListener('DOMContentLoaded', () => {
    const contentContainer = document.querySelectorAll(".room-info");
    const imageContainer = document.querySelectorAll(".image");
    const closeButtons = document.querySelectorAll(".button-close");
    const imageCloseButtons = document.querySelectorAll(".image-close");

    contentContainer.forEach(button => {
        button.addEventListener("click", function (event) {
            event.stopPropagation();
            const room = event.target.closest(".room"); // Get the closest .room container
            const roomContent = room.querySelector(".room-content"); // Find the .room-content container inside the .room container
            roomContent.style.display = "flex";
            roomContent.style.animationName = "fadeIn";
            roomContent.style.animationDuration = "300ms";
            roomDescription.scrollTop = 0;
        });
    });

    imageContainer.forEach(button => {
        button.addEventListener("click", function (event) {
            event.stopPropagation();
            const imageView = event.target.closest(".image-viewer");
            const viewedImage = imageView.querySelector(".viewed-image");
            viewedImage.style.display = "flex";
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener("click", function () {
            const roomContent = button.closest(".room-content");
            roomContent.style.display = "none";
        });
    });

    imageCloseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const viewedImage = button.parentNode;
            viewedImage.style.display = "none";
        });
    });
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

