  // Mostrar/ocultar menú de perfil
  document.getElementById('profileBtn').addEventListener('click', function () {
    var profileDiv = document.getElementById('profileDiv');
    profileDiv.classList.toggle('hidden');
  });

  // Mostrar/ocultar menú móvil
  document.getElementById('menuBtn').addEventListener('click', function () {
    var mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.toggle('hidden');
  });