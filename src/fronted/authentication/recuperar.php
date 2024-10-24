<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="../../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Sección del formulario de recuperación de contraseña -->
    <section class="bg-gray-200 p-10 min-h-screen flex items-center justify-center">
        <div class="bg-gray-50 rounded-2xl shadow-lg w-full max-w-md p-6">
            <div class="w-full p-6">
                <h2 class="text-center text-lg font-bold text-[#296798]">Recuperar Contraseña</h2>
                <p class="text-sm mt-4 text-center text-[#296798]">Ingresa tu correo para recibir el enlace de recuperación</p>
                
                <form class="flex flex-col gap-4 mt-6" id="recover-form" action="../../backend/login_register_reset/process_recovery.php" method="POST">
                    <input class="p-2 rounded-xl border" type="email" name="email" id="recover-email" placeholder="Email" required>
                    <button type="submit" class="bg-[#296798] rounded-xl text-white py-2 hover:scale-105 duration-300">
                        Enviar Enlace de Recuperación
                    </button>
                    <div class="mt-5 text-sm text-center">
                        <a href="login.php" class="text-[#296798]">Volver al inicio de sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal de Cargando -->
    <div id="loading-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full flex items-center justify-center">
            <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8h8a8 8 0 11-8-8z"></path>
            </svg>
            <p class="ml-4 text-gray-700 text-lg">Cargando...</p>
        </div>
    </div>

    <!-- Modal de Mensajes -->
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <p id="modal-message" class="text-gray-700 text-lg text-center"></p>
            <button id="modal-close" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 mx-auto block hover:bg-blue-600">
                Cerrar
            </button>
        </div>
    </div>

    <script src="http://localhost/petservices/src/fronted/js/recuperar.js"></script>
</body>

</html>
