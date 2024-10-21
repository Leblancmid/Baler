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
            const bookingId = btn.getAttribute('data-id'); // Get the ID from the button
            document.querySelector('.clientInfo-pop-up').style.display = 'flex';
            document.querySelector('.pop-clientInfo').style.animationName = 'zoomIn';
            document.querySelector('.pop-clientInfo form').style.display = 'flex';

            // You can use the bookingId here to fetch or display additional client information
            console.log('Booking ID:', bookingId); // Just for demonstration; you can replace this with your logic
        });
    });


    popupRoom.forEach((btn) => {
        console.log(document.querySelector('.room-content-2'))
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
function applyRoomClass(room, roomId) {
    if (roomId != null) {
        document.getElementById(`room-${roomId}`).checked = true;
    }

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
}

// for pop up room
document.addEventListener('DOMContentLoaded', () => {
    const checks = document.querySelectorAll('.room-selection');

    checks.forEach((check) => {
        let roomIds = selectedRoomsJs.split(',');
        const roomId = check.value
        if (roomIds.includes(roomId)) {
            applyRoomClass(check.parentElement, roomId)
        }

        check.addEventListener('change', (event) => {
            // Get the parent element with class "room"
            const room = event.target.parentNode;

            if (event.target.checked) {
                // Add the background color to the selected room element
                applyRoomClass(room);

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

document.addEventListener('DOMContentLoaded', () => {
    const checkboxContainer = document.querySelector('.checkbox-container');

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