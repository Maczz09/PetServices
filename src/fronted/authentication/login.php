<?php 
include '../html/header.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="../../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>
</head>

<body>
    <section class="bg-gray-200 p-10 min-h-screen flex items-center justify-center">
        <!-- Contenedor principal -->
        <div class="bg-gray-50 flex flex-col md:flex-row rounded-2xl shadow-lg w-full max-w-3xl p-6 mt-11">
            <!-- Formulario -->
            <div class="md:w-1/2 w-full p-6">
                <h2 class="text-center text-lg font-bold text-[#296798]">Iniciar Sesión</h2>
                <p class="text-sm mt-4 text-center text-[#296798]">Inicia sesión para disfrutar</p>

                <!-- Formulario -->
                <form class="flex flex-col gap-4 mt-6" method="POST"
                    action="../../backend/login_register_reset/login_users.php">
                    <!-- Campo de Email -->
                    <input
                        class="p-2 rounded-xl border <?php echo isset($_GET['email_error']) ? 'border-red-500' : ''; ?>"
                        type="email" name="email" id="email" placeholder="Email" required>
                    <!-- Mostrar error de email si lo hay -->
                    <?php if (isset($_GET['email_error'])) : ?>
                    <div class="text-red-500 text-sm">
                        <?php echo htmlspecialchars($_GET['email_error']); ?>
                    </div>
                    <?php endif; ?>

                    <!-- Campo de Contraseña -->
                    <div class="relative">
                        <input
                            class="p-2 mt-1 rounded-xl border w-full <?php echo isset($_GET['password_error']) ? 'border-red-500' : ''; ?>"
                            type="password" name="password" id="password" placeholder="Contraseña" required>
                        <!-- Ícono para mostrar/ocultar contraseña -->
                        <button type="button" id="togglePassword" class="absolute top-1/2 right-3 -translate-y-1/2">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>


                    <!-- Mostrar error de contraseña si lo hay -->
                    <?php if (isset($_GET['password_error'])) : ?>
                    <div class="text-red-500 text-sm">
                        <?php echo htmlspecialchars($_GET['password_error']); ?>
                    </div>
                    <?php endif; ?>

                    <button class="bg-[#296798] rounded-xl text-white py-2 hover:scale-105 duration-300">Iniciar
                        sesión</button>
                    <a href="recuperar.php" class="mt-5 text-xs border-b py-6">¿Olvidaste tu contraseña?</a>
                    <div class="mt-3 text-sm flex justify-between items-center">
                        <p>¿Aún no tienes cuenta?</p>
                        <a href="register_usuario.php"
                            class="py-2 px-4 bg-white border shadow rounded-xl hover:scale-105 duration-300 inline-block">Crear
                            Cuenta</a>
                    </div>
                    <div>
                        <button type="button"
                            class="bg-white text-center w-36 rounded-xl h-10 relative font-sans text-black text-lg font-semibold group"
                            onclick="goBack()">
                            <div
                                class="bg-[#296798] rounded-xl h-8 w-1/6 flex items-center justify-center absolute left-1 top-[2px] group-hover:w-[135px] z-10 duration-500">
                                <svg width="20px" height="20px" viewBox="0 0 1024 1024"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#000000" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                                    <path fill="#000000"
                                        d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z">
                                    </path>
                                </svg>
                            </div>
                            <p class="translate-x-1 text-sm">Volver</p>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Imagen -->
            <div class="md:block hidden md:w-1/2 w-full mt-6 md:mt-0">
                <img class="rounded-2xl" src="../images/login1.jpg" alt="Imagen de Login">
            </div>
        </div>
    </section>

    <!-- Modal para verificación de correo -->
    <?php if (isset($_GET['verification_error'])) : ?>
    <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <div class="text-center">
                <h2 class="text-lg font-bold text-gray-700">Verificación de correo requerida</h2>
                <p class="text-sm mt-4 text-gray-600"><?php echo htmlspecialchars($_GET['verification_error']); ?></p>
                <button class="mt-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    onclick="goBack()">Aceptar</button>
            </div>
        </div>
    </div>


    <?php endif; ?>

    <script src="../js/login.js"></script>
</body>

</html>