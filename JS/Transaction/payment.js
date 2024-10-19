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

    document.querySelectorAll('.button-yes').forEach((button) => {
        button.addEventListener('click', () => {
            window.location.href = 'Add Payment/payment_record.php';
        });
    });
});