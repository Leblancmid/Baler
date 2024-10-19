const checkmark = document.querySelector('.checkmark');

//Add event listener to trigger animation
checkmark.addEventListener('click', () => {
    checkmark.classList.add('animate');
    setTimeout(() => {
        checkmark.classList.remove('animate');
    }, 500);
});

