document.addEventListener('DOMContentLoaded', () => {
    // screen size to set the width according to current size of the screen
    const mainContainer = document.querySelector('.main-container');

    function updateScreenSize() {
        let widthContainer = window.innerWidth;
        mainContainer.style.maxWidth = `${widthContainer}px`;
    }
    window.addEventListener('resize', updateScreenSize);
    updateScreenSize();
});

document.addEventListener('DOMContentLoaded', function () {
    const passVisibilityButtons = document.querySelectorAll('.pass-visibility');
    const signIn = document.querySelector('.sign-in');

    passVisibilityButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            const input = button.previousElementSibling;
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('login-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        fetch(form.action, {
            method: form.method,
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                const errorMessage = document.getElementById('error-message');
                const errorContainer = document.querySelector(".note");
                if (data.error) {
                    errorMessage.textContent = data.error;
                    // errorMessage.style.opacity = '1';
                    errorContainer.style.opacity = '1';
                } else {
                    window.location.href = '../Index/dashboard.php';
                }
            });
    });
});