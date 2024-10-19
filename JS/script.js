// for whole document
document.addEventListener('DOMContentLoaded', () => {
  const mainContainer = document.querySelector('.main-container');

  function updateScreenSize() {
      let widthContainer = window.innerWidth;
      mainContainer.style.maxWidth = `${widthContainer}px`;
  }

  // Create a media query that listens for changes in screen size
  const mediaQuery = window.matchMedia('(max-width: ' + window.innerWidth + 'px)');

  // Add an event listener to the media query
  mediaQuery.addEventListener('change', updateScreenSize);

  // Call the updateScreenSize function initially
  updateScreenSize();
});

// for icon dropdown
document.addEventListener('DOMContentLoaded', () => {
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
});

// getting the date and time
document.addEventListener('DOMContentLoaded', () => {
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

          const navigationBar = document.querySelectorAll(".navigation");
          const aTags = document.querySelectorAll(".navigation a");
          const aActive = document.querySelectorAll(".active-nav");
          const iTags = document.querySelectorAll(".navigation a i");
          const pTags = document.querySelectorAll(".navigation a p");
          const sideBanners = document.querySelectorAll(".side-banner");

          if (isCollapsed) {
              sideNavs.forEach(sideNav => sideNav.style.width = "5rem");
              contentContainer.forEach(contentContainer => contentContainer.style.maxWidth = "calc(100% - 5rem)");
              navButtons.forEach(btn => btn.style.transform = "rotatey(-180deg)");
              navButtons.forEach(btn => btn.style.alignSelf = "center");
              pTags.forEach(p => p.style.display = "none");
              sideBanners.forEach(sideBanner => sideBanner.children[1].style.display = "none");
              aTags.forEach(a => a.style.justifyContent = "center");
              aTags.forEach(a => a.style.padding = "0.8rem");
              // iTags.forEach(a => a.style.fontSize = "var(--l)");
              navigationBar.forEach(a => a.style.gap = "15px");
              // aTags.forEach(a => a.style.backgroundColor = "var(--white)");
              aActive.forEach(a => a.style.borderRight = "none");
              aActive.forEach(a => a.style.backgroundColor = "var(--blue-1)");
              aTags.forEach(a => a.style.width = "fit-content");
              aActive.forEach(a => a.style.width = "fit-content");
              aActive.forEach(a => a.style.color = "var(--white)");

          } else {
              sideNavs.forEach(sideNav => sideNav.style.width = "13rem");
              contentContainer.forEach(contentContainer => contentContainer.style.maxWidth = "calc(100% - 13rem)");
              navButtons.forEach(btn => btn.style.transform = "rotatey(0deg)");
              navButtons.forEach(btn => btn.style.alignSelf = "");
              pTags.forEach(p => p.style.display = "block");
              sideBanners.forEach(sideBanner => sideBanner.children[1].style.display = "block");
              aTags.forEach(a => a.style.justifyContent = "start");
              aTags.forEach(a => a.style.backgroundColor = "");
              iTags.forEach(a => a.style.fontSize = "");
              aTags.forEach(a => a.style.padding = "calc(0.9rem + (1vw - 1rem) / 2)");
              aActive.forEach(a => a.style.borderRight = "5px solid var(--blue-1)");
              aActive.forEach(a => a.style.backgroundColor = "var(--blue-2)");
              aActive.forEach(a => a.style.width = "");
              aTags.forEach(a => a.style.width = "");
              aActive.forEach(a => a.style.color = "var(--blue-1)");
          }
      });
  });
});