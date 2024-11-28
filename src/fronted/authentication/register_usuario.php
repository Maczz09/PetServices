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
        <!-- Contenedor principal -->
        <div class="bg-gray-50 flex flex-col md:flex-row rounded-2xl shadow-lg w-full max-w-3xl p-6 mt-11">
            <!-- Formulario -->
            <div class="md:w-1/2 p-6">
                <h2 class="text-center text-lg font-bold text-[#296798]">Registro de Usuario</h2>
                <p class="text-sm mt-4 text-center text-[#296798]">Completa tus datos para registrarte en el sistema</p>

                <form class="flex flex-col gap-4 mt-6" id="usuario-form" method="POST" action="../../backend/login_register_reset/register.php">
                    <input type="hidden" name="idrol" value="2"> <!-- Valor predeterminado de 'Usuario' -->

                    <input class="p-2 rounded-xl border" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                    <input class="p-2 rounded-xl border" type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                    <input class="p-2 rounded-xl border" type="text" name="direccion" id="direccion" placeholder="Dirección" required>
                    <input class="p-2 rounded-xl border" type="email" name="email" id="email" placeholder="Email" required>
                    <input class="p-2 rounded-xl border" type="password" name="password" id="password" placeholder="Contraseña" required>
                    <input class="p-2 rounded-xl border" type="text" name="num_telefono" id="num_telefono" placeholder="Número de Teléfono" required>

                    <button type="submit" class="bg-[#296798] rounded-xl text-white py-2 hover:scale-105 duration-300">Registrar</button>
                </form>

                <!-- Botón de regreso -->
                <div class="flex justify-center mt-6">
                    <button type="button" class="bg-white text-center w-36 rounded-xl h-10 relative font-sans text-black text-lg font-semibold group" onclick="goBack()">
                        <div class="bg-[#296798] rounded-xl h-8 w-1/6 flex items-center justify-center absolute left-1 top-[2px] group-hover:w-[135px] z-10 duration-500">
                            <svg width="20px" height="20px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#000000" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                                <path fill="#000000" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"></path>
                            </svg>
                        </div>
                        <p class="translate-x-1 text-sm">Volver</p>
                    </button>
                </div>

                <!-- Pregunta si ya tiene cuenta -->
                <p class="text-center text-sm mt-6">¿Ya tienes una cuenta? 
                    <a href="login.php" class="text-[#296798] font-bold hover:underline">Inicia sesión</a>
                </p>
            </div>

            <!-- Imagen -->
            <div class="md:w-1/2 hidden md:block">
                <img class="rounded-2xl h-full object-cover" src="../images/login.jpg" alt="Imagen de Login">
            </div>
        </div>
    </section>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
