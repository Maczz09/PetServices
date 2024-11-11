const bannerContainer = document.querySelector('.banner-container');
const bannerItems = document.querySelectorAll('.banner-item');

let currentBanner = 0;

function rotateBanner() {
  bannerItems.forEach((item, index) => {
    if (index === currentBanner) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });

  currentBanner = (currentBanner + 1) % bannerItems.length;
  setTimeout(rotateBanner, 5000); // rotate every 5 seconds
}

rotateBanner();