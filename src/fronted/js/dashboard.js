function toggleSidebar() {
    const sidebar = document.querySelector('.fixed.left-0');
    const overlay = document.querySelector('.sidebar-overlay');
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}

function hideSidebar() {
    const sidebar = document.querySelector('.fixed.left-0');
    const overlay = document.querySelector('.sidebar-overlay');
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
}

function toggleDropdown(event) {
    event.preventDefault();
    const dropdownContent = event.currentTarget.nextElementSibling;
    dropdownContent.classList.toggle('hidden');
}