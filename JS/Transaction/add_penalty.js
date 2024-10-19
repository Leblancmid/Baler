document.addEventListener('DOMContentLoaded', () => {
    const checks = document.querySelectorAll('.penalty-selection');
    const nextButton = document.querySelector('.penalty-next');
    let errorContainer = document.querySelectorAll('.alert-type-1');
    const errorMessage = document.querySelector('.alert-message');

    // Check the state of the checkboxes when the page loads
    checks.forEach((check) => {
        if (check.checked) {
            // Apply the styles for the checked elements
            const penalty = check.parentNode;
            penalty.style.backgroundColor = 'var(--pending-2)';
            penalty.querySelectorAll('.penalty-name').forEach((element) => {
                element.style.color = 'var(--white)';
                element.style.letterSpacing = '2px';
            });
            penalty.querySelectorAll('.penalty-amount').forEach((element) => {
                element.style.color = 'var(--white)';
            });
            penalty.querySelectorAll('.penalty-type').forEach((element) => {
                element.style.color = 'var(--white)';
            });
            penalty.querySelectorAll('p.penalty-type').forEach((element) => {
                element.style.setProperty('--before-penalty-color', 'var(--red-2)');
                element.style.setProperty('--after-penalty-color', 'var(--red-2)');
            });
        }
    });

    // Add event listeners for the checkboxes
    checks.forEach((check) => {
        check.addEventListener('change', (event) => {
            // Get the parent element with class "room"
            const penalty = event.target.parentNode;

            if (event.target.checked) {
                // Add the background color to the selected room element
                penalty.style.backgroundColor = 'var(--pending-2)';
                penalty.querySelectorAll('.penalty-name').forEach((element) => {
                    element.style.color = 'var(--white)';
                    element.style.letterSpacing = '2px';
                });
                penalty.querySelectorAll('.penalty-amount').forEach((element) => {
                    element.style.color = 'var(--white)';
                });
                penalty.querySelectorAll('.penalty-type').forEach((element) => {
                    element.style.color = 'var(--white)';
                });
                penalty.querySelectorAll('p.penalty-type').forEach((element) => {
                    element.style.setProperty('--before-penalty-color', 'var(--white)');
                    element.style.setProperty('--after-penalty-color', 'var(--white)');
                });

            } else {
                // Reset styles of deselected room
                penalty.style.backgroundColor = 'var(--white)';
                penalty.querySelectorAll('.penalty-name').forEach((element) => {
                    element.style.color = 'var(--red-2)';
                });
                penalty.querySelectorAll('.penalty-amount').forEach((element) => {
                    element.style.color = 'var(--red-2)';
                });
                penalty.querySelectorAll('.penalty-type').forEach((element) => {
                    element.style.color = 'var(--red-2)';
                });
                penalty.querySelectorAll('p.penalty-type').forEach((element) => {
                    element.style.setProperty('--before-penalty-color', 'var(--red-2)');
                    element.style.setProperty('--after-penalty-color', 'var(--red-2)');
                });
            }

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
            errorMessage.textContent = "Select a penalty first before proceeding";
            errorContainer.forEach((element) => {
                element.style.display = 'flex';
            });
        } else {
            document.getElementById('penaltySelectionForm').submit(); // Submit the form
        }
    });

    // Add an event listener to the OK button to hide the error message
    document.querySelectorAll('.ok-button').forEach((button) => {
        button.addEventListener('click', () => {
            button.parentNode.parentNode.style.display = 'none';
        });
    });
});