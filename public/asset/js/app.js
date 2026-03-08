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

  if (sisterconcern && counterMobile && projectHead) {
    if (screenWidth <= 1010) {
      sisterconcern.classList.add("d-none");
      counterMobile.classList.add("d-none");
      projectHead.classList.add("justify-content-end");
    } else {
      sisterconcern.classList.remove("d-none");
      counterMobile.classList.remove("d-none");
      projectHead.classList.remove("justify-content-end");
    }
  }

  if (screenWidth <= 800) {
    if (counterMobile) counterMobile.classList.add("d-none");
    if (projectbtn) projectbtn.classList.add("d-none");
    if (subcribe) subcribe.classList.add("justify-content-center");
    if (footerMobile) footerMobile.classList.add("text-center");
    if (galary) galary.classList.add("text-center");
    if (copyright) copyright.classList.add("justify-content-center");
  } else {
    if (projectbtn) projectbtn.classList.remove("d-none");
    if (counterMobile) counterMobile.classList.remove("d-none");
    if (subcribe) subcribe.classList.remove("justify-content-center");
    if (footerMobile) footerMobile.classList.remove("text-center");
    if (galary) galary.classList.remove("text-center");
    if (copyright) copyright.classList.remove("justify-content-center");
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

let currentScale = 1;
let isDragging = false;
let startX, startY;
let translateX = 0, translateY = 0;

window.openModal = function (imageSrc) {
  const modal = document.getElementById("modal");
  const modalImage = document.getElementById("modalImage");
  if (modal && modalImage) {
    modal.style.display = "flex";
    modalImage.src = imageSrc;
    window.resetZoom();
  }
};

window.closeModal = function (e) {
  if (e) e.stopPropagation();
  const modal = document.getElementById("modal");
  if (modal) {
    modal.style.display = "none";
  }
};

window.zoomIn = function (e) {
  if (e) e.stopPropagation();
  if (currentScale < 5) {
    currentScale += 0.5;
    updateTransform();
  }
};

window.zoomOut = function (e) {
  if (e) e.stopPropagation();
  if (currentScale > 0.5) {
    currentScale -= 0.5;
    updateTransform();
  }
};

window.resetZoom = function (e) {
  if (e) e.stopPropagation();
  currentScale = 1;
  translateX = 0;
  translateY = 0;
  updateTransform();
};

function updateTransform() {
  const modalImage = document.getElementById("modalImage");
  if (modalImage) {
    modalImage.style.transform = `translate(${translateX}px, ${translateY}px) scale(${currentScale})`;
  }
}

// Initialize event listeners
document.addEventListener('DOMContentLoaded', () => {
  const modalImage = document.getElementById("modalImage");
  const modal = document.getElementById("modal");

  if (modalImage) {
    modalImage.addEventListener('mousedown', (e) => {
      if (currentScale <= 1) return;
      e.preventDefault();
      isDragging = true;
      startX = e.clientX - (translateX * currentScale);
      startY = e.clientY - (translateY * currentScale);
      modalImage.style.transition = 'none';
    });

    window.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      translateX = (e.clientX - startX) / currentScale;
      translateY = (e.clientY - startY) / currentScale;
      updateTransform();
    });

    window.addEventListener('mouseup', () => {
      if (isDragging) {
        isDragging = false;
        modalImage.style.transition = 'transform 0.2s ease-out';
      }
    });

    if (modal) {
      modal.addEventListener('wheel', (e) => {
        if (modal.style.display === "flex") {
          e.preventDefault();
          if (e.deltaY < 0) {
            zoomIn();
          } else {
            zoomOut();
          }
        }
      }, { passive: false });
    }
  }

  const modalClose = document.getElementById("modalClose");
  if (modalClose) {
    modalClose.addEventListener("click", closeModal);
  }
});
