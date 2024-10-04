
document.addEventListener("DOMContentLoaded", function () {
    const messageAlerts = document.querySelectorAll('.message-alert');
    const buttonConfirms = document.querySelectorAll('.confirm-button');
    const messageTexts = document.querySelectorAll('.alert-message');

    buttonConfirms.forEach((btn) => {
        btn.addEventListener('click', () => {
            messageTexts.forEach((text) => {
                text.textContent = "Confirm this booking?";
            });
            messageAlerts.forEach((alert) => {
                alert.style.display = 'flex';
            });
        });
    });

    document.querySelectorAll('.no-button').forEach((button) => {
        button.addEventListener('click', () => {
            messageAlerts.forEach((alert) => {
                alert.style.display = 'none';
            });
        });
    });

    document.querySelectorAll('.yes-button').forEach((button) => {
        button.addEventListener('click', () => {
            messageAlerts.forEach((alert) => {
                document.getElementById('confirmBookingForm').submit(); // Submit the form
            });
        });
    });

});