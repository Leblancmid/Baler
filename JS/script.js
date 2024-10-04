// for whole document
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

// dashboard
document.addEventListener('DOMContentLoaded', () => {
  //for drop down
  const button = document.querySelector(".user-icon");
  const dropdown = document.querySelector(".drop-down");
  const arrow = document.querySelector(".fa-chevron-down");
  let currentTransformStyle = "transform: rotate(180deg);";
  const transformRotate1 = "rotate(0)";
  const transformRotate2 = "rotate(-180deg)";

  button.addEventListener("click", function () {
    dropdown.classList.toggle("dropdown-transition");
    dropdown.style.display = dropdown.style.display === "flex" ? "none" : "flex";

    if (currentTransformStyle === transformRotate2) {
      arrow.style.transform = transformRotate1;
      currentTransformStyle = transformRotate1;
    } else {
      arrow.style.transform = transformRotate2;
      currentTransformStyle = transformRotate2;
    }
  });

  document.addEventListener("click", function (event) {
    // Check if the click is not on the button or dropdown
    if (!event.target.closest(".user-icon,.drop-down")) {
      // If dropdown is visible, hide it
      if (dropdown.style.display === "flex") {
        dropdown.style.display = "none";
        arrow.style.transform = transformRotate1;
        currentTransformStyle = transformRotate1;
      }
    }
  });

  //for date and time
  const weekdays = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
  const monthNames = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  function updateDateTime() {
    const today = new Date();
    const weekday = weekdays[today.getDay()];
    const date = `${monthNames[today.getMonth()]
      } ${today.getDate()}, ${today.getFullYear()}`;
    const hour = today.getHours() % 12 === 0 ? 12 : today.getHours() % 12;
    const minute = today.getMinutes();
    const second = today.getSeconds();
    const amPm = today.getHours() < 12 ? "AM" : "PM";

    document.querySelectorAll(".sub-header").forEach((subHeader) => {
      subHeader.querySelector(".weekdays").textContent = weekday;
      subHeader.querySelector(".date").textContent = date;
      subHeader.querySelector(".time").textContent = `${hour}:${String(
        minute
      ).padStart(2, "0")}:${String(second).padStart(2, "0")}`;
      subHeader.querySelector(".am-pm").textContent = amPm;
    });
  }

  setInterval(updateDateTime, 1000);
  updateDateTime();

  //for sales visibility
  document.querySelectorAll(".eye").forEach((button) => {
    button.addEventListener("click", () => {
      const salesAmounts = button.parentNode.nextElementSibling.querySelectorAll(".heading-3");
      const icon = button.querySelector("i");

      if (icon.classList.contains("fa-eye-slash")) {
        salesAmounts.forEach((amount) => {
          amount.textContent = "₱ " + amount.parentNode.dataset.original;
        });
        icon.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        salesAmounts.forEach((amount) => {
          amount.textContent = "₱ *****.00";
        });
        icon.classList.replace("fa-eye", "fa-eye-slash");
      }
    });
  });

});

// table
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

      link.addEventListener('mouseout', () => {

      });
    });
  });

  //for viewing room content and closing it etc.
  //all about the room content
  const contentContainer = document.querySelectorAll(".room-info");
  const imageContainer = document.querySelectorAll(".image");
  const closeButtons = document.querySelectorAll(".button-close");
  const imageCloseButtons = document.querySelectorAll(".image-close");

  contentContainer.forEach(button => {
    button.addEventListener("click", function (event) {
      event.stopPropagation();
      const roomContent = event.target.parentNode.parentNode.querySelector(".room-content");
      const roomDescription = event.target.parentNode.parentNode.querySelector(".room-description");
      roomContent.style.display = "flex";
      roomContent.style.animationName = "fadeIn";
      roomContent.style.animationDuration = "300ms";
      roomDescription.scrollTop = 0;
    });
  });

  imageContainer.forEach(button => {
    button.addEventListener("click", function (event) {
      event.stopPropagation();
      const imageView = event.target.closest(".image-viewer");
      const viewedImage = imageView.querySelector(".viewed-image");
      viewedImage.style.display = "flex";
    });
  });

//  closeButtons.forEach(button => {
//    button.addEventListener("click", function () {
//      const roomContent = button.closest(".room-content");
//      roomContent.style.display = "none";
//    });
//  });

  imageCloseButtons.forEach(button => {
    button.addEventListener("click", function () {
      const viewedImage = button.parentNode;
      viewedImage.style.display = "none";
    });
  });
});

// collapsing side navigation
document.addEventListener("DOMContentLoaded", function () {
  const navButtons = document.querySelectorAll('.navsize-button');
  const sideNavs = document.querySelectorAll('.side-nav');
  const contentContainer = document.querySelectorAll('.container');
  let isCollapsed = false;

  navButtons.forEach(button => {
    button.addEventListener("click", function () {
      isCollapsed = !isCollapsed;

      const aTags = document.querySelectorAll(".navigation a");
      const aActive = document.querySelectorAll(".active-nav");
      const pTags = document.querySelectorAll(".navigation a p");
      const sideBanners = document.querySelectorAll(".side-banner");

      if (isCollapsed) {
        sideNavs.forEach(sideNav => sideNav.style.width = "80px");
        contentContainer.forEach(contentContainer => contentContainer.style.maxWidth = "calc(100% - 80px)");
        navButtons.forEach(btn => btn.style.transform = "rotatey(-180deg)");
        pTags.forEach(p => p.style.display = "none");
        sideBanners.forEach(sideBanner => sideBanner.children[1].style.display = "none");
        aTags.forEach(a => a.style.justifyContent = "center");
        aTags.forEach(a => a.style.padding = "1rem 0.625rem");
        // aTags.forEach(a => a.style.backgroundColor = "var(--white)");
        aActive.forEach(a => a.style.borderRight = "none");
        aActive.forEach(a => a.style.backgroundColor = "var(--blue-1)");
        aActive.forEach(a => a.style.color = "var(--white)");

      } else {
        sideNavs.forEach(sideNav => sideNav.style.width = "240px");
        contentContainer.forEach(contentContainer => contentContainer.style.maxWidth = "calc(100% - 240px)");
        navButtons.forEach(btn => btn.style.transform = "rotatey(0deg)");
        pTags.forEach(p => p.style.display = "block");
        sideBanners.forEach(sideBanner => sideBanner.children[1].style.display = "block");
        aTags.forEach(a => a.style.justifyContent = "start");
        aTags.forEach(a => a.style.backgroundColor = "");
        aActive.forEach(a => a.style.borderRight = "5px solid var(--blue-1)");
        aActive.forEach(a => a.style.backgroundColor = "var(--blue-2)");
        aActive.forEach(a => a.style.color = "var(--blue-1)");
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const viewDetails = document.querySelectorAll('.view-details');
  const detailsAmount = document.querySelector('.details-amount');
  const closeDetails = document.querySelectorAll('.details-amount .button-close');

  viewDetails.forEach(button => {
    button.addEventListener("click", function (event) {
      event.stopPropagation();
      detailsAmount.style.display = "flex";
      detailsAmount.style.animationName = "fadeIn";
      detailsAmount.style.animationDuration = "300ms";
      detailsAmount.scrollTop = 0;
    });
  });

  closeDetails.forEach(button => {
    button.addEventListener("click", function (event) {
      detailsAmount.style.display = "none";
    });
  });
});