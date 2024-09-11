//new
document.addEventListener("DOMContentLoaded", function () {
  const imageInput = document.getElementById('image-input');
  const imagePreview = document.getElementById('image-preview');

  imageInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onload = () => {
      const imageDataUrl = reader.result;
      imagePreview.src = imageDataUrl;
    };

    reader.readAsDataURL(file);
  });

  imageInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return; // no file selected
    if (!file.type.match('image.*')) {
      alert('Please select an image file');
      return;
    }

    const reader = new FileReader();

    reader.onload = () => {
      const imageDataUrl = reader.result;
      imagePreview.src = imageDataUrl;
    };

    reader.readAsDataURL(file);
  });

});

//pop up for account

document.addEventListener("DOMContentLoaded", function () {
  const popupImageButton = document.querySelectorAll('.image-pop-up');
  const popupNameButton = document.querySelectorAll('.name-pop-up');
  const popupUsernameButton = document.querySelectorAll('.username-pop-up');
  const popupEmailButton = document.querySelectorAll('.email-pop-up');
  const popupPasswordButton = document.querySelectorAll('.password-pop-up');
  const popupPasswordTwoButton = document.querySelectorAll('.pass-proceed');
  const changeCancel = document.querySelectorAll('.change-cancel');

  changeCancel.forEach((btn) => {
    btn.addEventListener('click', () => {
      btn.closest('.pop-up-container').style.display = 'none';
    });
  });

  popupImageButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      document.querySelector('.pop-up-image').style.display = 'flex';
      document.querySelector('.pop-image').style.animationName = 'zoomIn';
    });
  });

  popupNameButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      document.querySelector('.pop-up-name').style.display = 'flex';
      document.querySelector('.pop-name').style.animationName = 'zoomIn';
    });
  });

  popupUsernameButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      document.querySelector('.pop-up-username').style.display = 'flex';
      document.querySelector('.pop-username').style.animationName = 'zoomIn';
    });
  });

  popupEmailButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      document.querySelector('.pop-up-email').style.display = 'flex';
      document.querySelector('.pop-email').style.animationName = 'zoomIn';
    });
  });

  popupPasswordButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      document.querySelector('.pop-up-password-one').style.display = 'flex';
      document.querySelector('.pop-password-one').style.animationName = 'zoomIn';
    });
  });

  popupPasswordTwoButton.forEach((btn) => {
    btn.addEventListener('click', () => {
      document.querySelector('.pop-up-password-one').style.display = 'none';
      document.querySelector('.pop-up-password-two').style.display = 'flex';
      document.querySelector('.pop-password-two').style.animationName = 'zoomIn';
    });
  });

  //pop up for account

  document.addEventListener("DOMContentLoaded", function () {
    const popupImageButton = document.querySelectorAll('.image-pop-up');
    const popupNameButton = document.querySelectorAll('.name-pop-up');
    const popupUsernameButton = document.querySelectorAll('.username-pop-up');
    const popupEmailButton = document.querySelectorAll('.email-pop-up');
    const popupPasswordButton = document.querySelectorAll('.password-pop-up');
    const popupPasswordTwoButton = document.querySelectorAll('.pass-proceed');
    const closePop = document.querySelectorAll('.change-cancel, .pop-close');
    const updateSubmit = document.querySelectorAll('.change-save:not(.password)');

    closePop.forEach((btn) => {
      btn.addEventListener('click', () => {
        btn.closest('.pop-up-container').style.display = 'none';
      });
    });

    updateSubmit.forEach((btn) => {
      btn.addEventListener('click', () => {
        btn.closest('.pop-up-container').style.display = 'none';
        document.querySelector('.pop-up-updated').style.display = 'flex';
        document.querySelector('.pop-updated').style.animationName = 'zoomIn';

        // reseting the check animation
        const lordIcon = document.querySelector('lord-icon');
        const newLordIcon = document.createElement('lord-icon');
        newLordIcon.src = 'https://cdn.lordicon.com/oqdmuxru.json';
        newLordIcon.trigger = 'in';
        newLordIcon.state = 'morph-check-in-1';

        lordIcon.replaceWith(newLordIcon);
      });
    });

    popupImageButton.forEach((btn) => {
      btn.addEventListener('click', () => {
        document.querySelector('.pop-up-image').style.display = 'flex';
        document.querySelector('.pop-image').style.animationName = 'zoomIn';
      });
    });

    popupNameButton.forEach((btn) => {
      btn.addEventListener('click', () => {
        document.querySelector('.pop-up-name').style.display = 'flex';
        document.querySelector('.pop-name').style.animationName = 'zoomIn';
      });
    });

    popupUsernameButton.forEach((btn) => {
      btn.addEventListener('click', () => {
        document.querySelector('.pop-up-username').style.display = 'flex';
        document.querySelector('.pop-username').style.animationName = 'zoomIn';
      });
    });

    popupEmailButton.forEach((btn) => {
      btn.addEventListener('click', () => {
        document.querySelector('.pop-up-email').style.display = 'flex';
        document.querySelector('.pop-email').style.animationName = 'zoomIn';
      });
    });

    popupPasswordButton.forEach((btn) => {
      btn.addEventListener('click', () => {
        document.querySelector('.pop-up-password-one').style.display = 'flex';
        document.querySelector('.pop-password-one').style.animationName = 'zoomIn';
      });
    });

    popupPasswordTwoButton.forEach((btn) => {
      btn.addEventListener('click', () => {
        document.querySelector('.pop-up-password-one').style.display = 'none';
        document.querySelector('.pop-up-password-two').style.display = 'flex';
        document.querySelector('.pop-password-two').style.animationName = 'zoomIn';
      });
    });

    // password visibility
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    const eyeIcons = document.querySelectorAll('.password-visibility');

    eyeIcons.forEach((icon, index) => {
      icon.addEventListener('click', () => {
        // Toggle password visibility
        const passwordInput = passwordInputs[index];
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          icon.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
          passwordInput.type = 'password';
          icon.classList.replace('fa-eye', 'fa-eye-slash');
        }
      });
    });
  });

});