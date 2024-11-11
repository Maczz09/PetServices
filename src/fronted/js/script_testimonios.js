let currentIndex = 0;
let testimonios = [];

function fetchUsuarios() {
    fetch('../nosotros/get_usuarios.php')
        .then(response => response.json())
        .then(data => {
            const usuarioSelect = document.getElementById('usuario_id');
            usuarioSelect.innerHTML = '';
            data.forEach(usuario => {
                const option = document.createElement('option');
                option.value = usuario.idusuario;
                option.textContent = usuario.nombre;
                usuarioSelect.appendChild(option);
            });
        });
}

function fetchTestimonios() {
    fetch('../nosotros/get_testimonios.php')
        .then(response => response.json())
        .then(data => {
            testimonios = data;
            updateCarousel();
            startCarousel();
        });
}
function updateCarousel() {
    const testimonialContainer = document.getElementById('testimonial-container');
    testimonialContainer.innerHTML = '';
    testimonios.forEach((testimonio, index) => {
        const nuevoTestimonio = document.createElement('div');
        nuevoTestimonio.classList.add('min-w-full', 'p-8', 'bg-white', 'rounded-lg', 'shadow-lg', 'flex', 'flex-col', 'items-center');
        nuevoTestimonio.innerHTML = `
            <p class="text-2xl font-medium text-gray-700 mb-4 text-center">${testimonio.comentario}</p>
            <div class="flex items-center mb-4">
                <img src="../images/nosotros/avatar.png" 
                alt="Testimonial" class="rounded-full w-16 h-16 mr-4">
                <div>
                    <p class="font-medium text-gray-900">${testimonio.nombre}</p>
                    <p class="text-gray-500">Cliente</p>
                    <div class="text-yellow-500">
                        ${'★'.repeat(testimonio.estrellas)}${'☆'.repeat(5 - testimonio.estrellas)}
                    </div>
                </div>
            </div>
        `;
        testimonialContainer.appendChild(nuevoTestimonio);
    });
}

function startCarousel() {
    setInterval(() => {
        moveNext();
    }, 5000);
    document.getElementById('prev').addEventListener('click', movePrev);
    document.getElementById('next').addEventListener('click', moveNext);
}

function moveNext() {
    currentIndex = (currentIndex + 1) % testimonios.length;
    const testimonialContainer = document.getElementById('testimonial-container');
    testimonialContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function movePrev() {
    currentIndex = (currentIndex - 1 + testimonios.length) % testimonios.length;
    const testimonialContainer = document.getElementById('testimonial-container');
    testimonialContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

window.onload = () => {
    fetchTestimonios();
    fetchUsuarios();
};

document.getElementById('openModal').addEventListener('click', () => {
    document.getElementById('myModal').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', () => {
    document.getElementById('myModal').classList.add('hidden');
});

document.getElementById('commentForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    fetch('../nosotros/insert_testimonio.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        fetchTestimonios(); // Refresca los testimonios después de agregar uno nuevo
        document.getElementById('myModal').classList.add('hidden');
    });
});