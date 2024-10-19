document.addEventListener("DOMContentLoaded", function () {
    const messageAlerts = document.querySelectorAll('.alert-type-2');
    const buttonConfirms = document.querySelectorAll('.confirm-button');
    const messageTexts = document.querySelectorAll('.alert-message');

    buttonConfirms.forEach((btn) => {
        btn.addEventListener('click', () => {
            messageTexts.forEach((text) => {
                text.textContent = "Confirm this updated payment?";
            });
            messageAlerts.forEach((alert) => {
                alert.style.display = 'flex';
            });
        });
    });

    document.querySelectorAll('.button-no').forEach((button) => {
        button.addEventListener('click', () => {
            messageAlerts.forEach((alert) => {
                alert.style.display = 'none';
            });
        });
    });

    document.querySelectorAll('.button-yes').forEach((button) => {
        button.addEventListener('click', () => {
            messageAlerts.forEach(() => {
                window.location.href = '3_PaymentConfirmed.php';
            });
        });
    });
  
});