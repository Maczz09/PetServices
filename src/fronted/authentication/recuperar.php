<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="../../output.css" rel="stylesheet">
    </head>
<body>
    <section class="bg-gray-200 p-10 min-h-screen flex items-center justify-center">
        <!-- contenedor principal -->
        <div class="bg-gray-50 rounded-2xl shadow-lg w-full max-w-md p-6">
            <!-- formulario de recuperación de contraseña -->
            <div class="w-full p-6">
                <h2 class="text-center text-lg font-bold text-[#296798]">Recuperar Contraseña</h2>
                <p class="text-sm mt-4 text-center text-[#296798]">Ingresa tu correo para recibir el enlace de recuperación</p>
                <!-- form -->
                <form class="flex flex-col gap-4 mt-6" id="recover-form" action="../../backend/login_register_reset/process_recovery.php" method="POST">
                    <input class="p-2 rounded-xl border" type="email" name="email" id="recover-email" placeholder="Email" required>
                    <button type="submit" class="bg-[#296798] rounded-xl text-white py-2 hover:scale-105 duration-300">Enviar Enlace de Recuperación</button>
                    <div class="mt-5 text-sm text-center">
                        <a href="login.php" class="text-[#296798]">Volver al inicio de sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </section>


</html>
