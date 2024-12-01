<?php 
include '../html/header.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="../../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-200 p-10 min-h-screen flex items-center justify-center">
        <div class="bg-gray-50 flex flex-col md:flex-row rounded-2xl shadow-lg w-full max-w-3xl p-6 mt-11">
            <!-- Formulario -->
            <div class="md:w-1/2 p-6">
                <h2 class="text-center text-lg font-bold text-[#296798]">Registro de Usuario</h2>
                <p class="text-sm mt-4 text-center text-[#296798]">Completa tus datos para registrarte en el sistema</p>

                <form class="flex flex-col gap-4 mt-6" id="usuario-form">
                    <input type="hidden" name="idrol" value="2"> <!-- Valor predeterminado de 'Usuario' -->

                    <input class="p-2 rounded-xl border" type="text" name="nombre" id="nombre" placeholder="Nombre"
                        required>
                    <input class="p-2 rounded-xl border" type="text" name="apellido" id="apellido"
                        placeholder="Apellido" required>
                    <input class="p-2 rounded-xl border" type="text" name="direccion" id="direccion"
                        placeholder="Dirección" required>
                    <input class="p-2 rounded-xl border" type="email" name="email" id="email" placeholder="Email"
                        required>
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full" type="password" name="password" id="password"
                            placeholder="Contraseña" required>
                        <button type="button" id="toggle-password" class="absolute right-3 top-2 text-gray-500">
                            <!-- Ícono para mostrar/ocultar la contraseña -->
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>

                    <input class="p-2 rounded-xl border" type="text" name="num_telefono" id="num_telefono"
                        placeholder="Número de Teléfono" required>

                    <button type="submit"
                        class="bg-[#296798] rounded-xl text-white py-2 hover:scale-105 duration-300">Registrar</button>
                </form>

                <!-- Botón de regreso -->
                <div class="flex justify-center mt-6">
                    <button type="button"
                        class="bg-white text-center w-36 rounded-xl h-10 relative font-sans text-black text-lg font-semibold group"
                        onclick="goBack()">
                        <div
                            class="bg-[#296798] rounded-xl h-8 w-1/6 flex items-center justify-center absolute left-1 top-[2px] group-hover:w-[135px] z-10 duration-500">
                            <svg width="20px" height="20px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#000000" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                                <path fill="#000000"
                                    d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z">
                                </path>
                            </svg>
                        </div>
                        <p class="translate-x-1 text-sm">Volver</p>
                    </button>
                </div>

                <!-- Modal de Cargando -->
                <div id="loading-modal"
                    class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full flex items-center justify-center">
                        <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8h8a8 8 0 11-8-8z"></path>
                        </svg>
                        <p class="ml-4 text-gray-700 text-lg">Cargando...</p>
                    </div>
                </div>

                <!-- Pregunta si ya tiene cuenta -->
                <p class="text-center text-sm mt-6">¿Ya tienes una cuenta?
                    <a href="login.php" class="text-[#296798] font-bold hover:underline">Inicia sesión</a>
                </p>
            </div>

            <!-- Imagen -->
            <div class="md:w-1/2 hidden md:block">
                <img class="rounded-2xl h-full object-cover" src="../images/login1.jpg" alt="Imagen de Login">
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <p id="modal-message" class="text-gray-700 text-lg text-center"></p>
            <button id="modal-close"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 mx-auto block hover:bg-blue-600">Cerrar</button>
        </div>
    </div>

    <script src="http://localhost/petservices/src/fronted/js/register.js"></script>

</body>

</html>