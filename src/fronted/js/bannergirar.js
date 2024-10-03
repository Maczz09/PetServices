const images = document.querySelectorAll('.banner img');
let currentImage = 0;

function showImage(n) {
  images[currentImage].classList.remove('active');
  currentImage = (n + images.length) % images.length;
  images[currentImage].classList.add('active');
}

showImage(currentImage);

setInterval(() => {
  showImage(currentImage + 1);
}, 5000); // Cambia la imagen cada 5 segundos (5000 milisegundos)