// mobile nav

function updateVisibility() {
  const sisterconcern = document.getElementById("sister-concern");
  const projectHead = document.getElementById("project-head");
  const counterMobile = document.getElementById("counter-mobile");
  const projectbtn = document.getElementById("project-galary-btn");
  const subcribe = document.getElementById("subcribe");
  const footerMobile = document.getElementById("footer-mobile");
  const copyright = document.getElementById("copyright");
  const galary = document.getElementById("galary");
  const screenWidth = window.innerWidth;

  if (screenWidth <= 1010) {
    sisterconcern.classList.add("d-none");
    counterMobile.classList.add("d-none");
    projectHead.classList.add("justify-content-end");
  } else {
    sisterconcern.classList.remove("d-none");
    counterMobile.classList.remove("d-none");
    projectHead.classList.remove("justify-content-end");
  }
  if (screenWidth <= 800) {
    counterMobile.classList.add("d-none");
    projectbtn.classList.add("d-none");
    subcribe.classList.add("justify-content-center");
    footerMobile.classList.add("text-center");
    galary.classList.add("text-center");
    copyright.classList.add("justify-content-center");
  } else {
    projectbtn.classList.remove("d-none");
    counterMobile.classList.remove("d-none");
    subcribe.classList.remove("justify-content-center");
    footerMobile.classList.remove("text-center");
    galary.classList.remove("text-center");
    copyright.classList.remove("justify-content-center");
  }
}

updateVisibility();

window.addEventListener("resize", updateVisibility);

// mobile nav

const mobileNavLinks = document.querySelectorAll(".mobile-nav-view .nav-link");

mobileNavLinks.forEach(function (navLink) {
  navLink.addEventListener("click", function () {
    const subNav = this.nextElementSibling;
    if (subNav) {
      subNav.style.display =
        subNav.style.display === "block" ? "none" : "block";
    }
  });
});

// galary image view

const modalClose = document.getElementById("modalClose");

modalClose.addEventListener("click", closeModal);

function openModal(imageSrc) {
  const modal = document.getElementById("modal");
  const modalImage = document.getElementById("modalImage");
  modal.style.display = "flex";
  modalImage.src = imageSrc;
}

function closeModal() {
  modal.style.display = "none";
}
