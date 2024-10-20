document.addEventListener('DOMContentLoaded', () => {
    //for dropdown status color
    const selectElements = document.querySelectorAll('.booking-status');

    selectElements.forEach(function (selectElement) {
        selectElement.addEventListener('change', function () {
            const selectedValue = this.value;
            switch (selectedValue) {
                case 'booked':
                    this.style.color = 'green';
                    break;
                case 'pending':
                    this.style.color = 'orange';
                    break;
                case 'canceled':
                    this.style.color = 'red';
                    break;
                case 'checkIn':
                    this.style.color = 'blue';
                    break;
                case 'checkOut':
                    this.style.color = 'gray';
                    break;
            }
        });
        selectElement.dispatchEvent(new Event('change'));
    });

    // another drop down for booking ref no that will direct to payment or penalty
    const pTags = document.querySelectorAll('td.booking-no p');

    pTags.forEach(pTag => {
        pTag.addEventListener('mouseover', () => {
            const dropdown = pTag.nextElementSibling;
            dropdown.style.display = 'flex';
        });

        pTag.addEventListener('mouseout', () => {
            const dropdown = pTag.nextElementSibling;
            dropdown.style.display = 'none';
        });

        const dropdown = pTag.nextElementSibling;
        dropdown.addEventListener('mouseover', () => {
            dropdown.style.display = 'flex';
        });

        dropdown.addEventListener('mouseout', () => {
            dropdown.style.display = 'none';
        });

        const dropdownLinks = dropdown.querySelectorAll('a');
        dropdownLinks.forEach(link => {
            link.addEventListener('mouseover', () => {
                dropdown.style.display = 'flex';
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const deleteButton = document.querySelectorAll('.delete-button');
    const editButton = document.querySelectorAll('.edit-button');
    const errorMessage = document.querySelectorAll('.alert-message');
    const errorContainer2 = document.querySelectorAll('.alert-type-2');
    const errorContainer3 = document.querySelectorAll('.alert-type-3');

    deleteButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            errorMessage.forEach((text) => {
                text.textContent = "Do you want to delete this record?";
            });
            errorContainer3.forEach((alert) => {
                alert.style.display = 'flex';
            });
        });
    });

    editButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            errorMessage.forEach((text) => {
                text.textContent = "Do you want to edit this record?";
            });
            errorContainer2.forEach((alert) => {
                alert.style.display = 'flex';
            });
        });
    });

    document.querySelectorAll('.button-no').forEach((button) => {
        button.addEventListener('click', () => {
            errorContainer2.forEach((alert) => {
                alert.style.display = 'none';
            });
            errorContainer3.forEach((alert) => {
                alert.style.display = 'none';
            });
        });
    });

    document.querySelectorAll('.edit-button').forEach((button) => {
        button.addEventListener('click', () => {
            const bookingId = button.getAttribute('data-id'); // Get the ID from the button
            window.location.href = `Individual/edit_booking.php?id=${bookingId}`; // Redirect with the ID
        });
    });


});