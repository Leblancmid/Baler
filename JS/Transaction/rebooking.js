document.addEventListener('DOMContentLoaded', () => {
    const confirmButton = document.querySelectorAll('.confirm-rebook');
    const declineButton = document.querySelectorAll('.decline-rebook');
    const errorMessage = document.querySelectorAll('.alert-message');
    const errorContainer = document.querySelectorAll('.alert-type-2');

    confirmButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            errorMessage.forEach((text) => {
                text.textContent = "Confirm this rebooking request?";
            });
            errorContainer.forEach((alert) => {
                alert.style.display = 'flex';
            });
        });
    });

    declineButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            errorMessage.forEach((text) => {
                text.textContent = "Confirm declining this rebooking request?";
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