document.addEventListener('DOMContentLoaded', () => {
    const paymentOption = document.querySelector('.payment-option');
    const paymentRefNoInput = document.querySelector('#refNo');

    paymentOption.addEventListener('change', () => {
        if (paymentOption.value === 'gcash' || paymentOption.value === 'bank') {
            paymentRefNoInput.parentNode.style.display = 'flex';
        } else {
            paymentRefNoInput.parentNode.style.display = 'none';
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const messageAlerts = document.querySelectorAll('.alert-type-2');
    const buttonConfirms = document.querySelectorAll('.confirm-button');
    const messageTexts = document.querySelectorAll('.alert-message');

    buttonConfirms.forEach((btn) => {
        btn.addEventListener('click', () => {
            messageTexts.forEach((text) => {
                text.textContent = "Confirm this payment?";
            });
            messageAlerts.forEach((alert) => {
                alert.style.display = 'flex';
            });
        });
    });

    document.querySelectorAll('.change-cancel').forEach((button) => {
        button.addEventListener('click', () => {
            messageAlerts.forEach((alert) => {
                alert.style.display = 'none';
            });
        });
    });

    document.querySelectorAll('.change-save').forEach((button) => {
        button.addEventListener('click', () => {
            messageAlerts.forEach(() => {
                window.location.href = '3_PaymentConfirmed.php';
            });
        });
    });
  
});