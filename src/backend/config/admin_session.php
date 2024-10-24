<?php
// src/backend/config/admin_session.php

// Configuraciones de seguridad para las sesiones
ini_set('session.use_strict_mode', 1);
session_start();
session_regenerate_id(true);

// Verificar si el usuario está autenticado y si tiene el rol de administrador
if (!isset($_SESSION['idusuario']) || $_SESSION['idrol'] != 1) {
    // Mostrar el modal si no está autenticado
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Acceso Denegado</title>
    </head>
    <body class="bg-gray-100">
        <!-- Modal background -->
        <div id="modalBackground" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow-lg w-96">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h5 class="text-lg font-semibold text-gray-700">Inicio de Sesión Requerido</h5>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <p class="text-gray-600">Necesitas iniciar sesión para acceder a esta página. Haz clic en el botón para ir a la página de inicio de sesión.</p>
                </div>
                <div class="px-6 py-4 border-t border-gray-200 text-right">
                    <button id="goToLoginBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                        Ir a Login
                    </button>
                </div>
            </div>
        </div>

        <script>
            // Función para redirigir al login
            document.getElementById("goToLoginBtn").addEventListener("click", function() {
                window.location.href = "http://localhost/petservices/src/fronted/authentication/login.php";
            });

            // Función para cerrar el modal (opcional)
            document.getElementById("closeModal").addEventListener("click", function() {
                document.getElementById("modalBackground").style.display = "none";
            });
        </script>
    </body>
    </html>
    ';
    exit();
}

// El usuario está autenticado y tiene el rol de administrador
?>
