const currentPath = window.location.pathname;

if (currentPath.includes('index.php')) {
    document.getElementById('nav-home').classList.add('text-blue-600');
} else if (currentPath.includes('lugares_petfriendly.php')) {
    document.getElementById('nav-petfriendly').classList.add('text-blue-600');
} else if (currentPath.includes('petshop.php')) {
    document.getElementById('nav-petshop').classList.add('text-blue-600');
} else if (currentPath.includes('nosotros.php')) {
    document.getElementById('nav-nosotros').classList.add('text-blue-600');
} else if (currentPath.includes('servicios.php')) {
    document.getElementById('nav-services').classList.add('text-blue-600');
}