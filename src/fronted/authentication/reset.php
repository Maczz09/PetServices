
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="../../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="bg-gray-200 p-10 min-h-screen flex items-center justify-center">
        <div class="bg-gray-50 rounded-2xl shadow-lg w-full max-w-md p-6">
            <div class="w-full p-6">
                <h2 class="text-center text-lg font-bold text-[#296798]">Restablecer Contraseña</h2>
                <form class="flex flex-col gap-4 mt-6" action="../../backend/login_register_reset/process_password_request.php?token=<?php echo $_GET['token']; ?>" method="POST">
                <input class="p-2 rounded-xl border" type="password" name="password" placeholder="Nueva Contraseña" required>
                    <input class="p-2 rounded-xl border" type="password" name="confirm_password" placeholder="Confirmar Contraseña" required>
                    <button type="submit" class="bg-[#296798] rounded-xl text-white py-2 hover:scale-105 duration-300">Actualizar Contraseña</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
