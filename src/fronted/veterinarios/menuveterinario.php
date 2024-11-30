<!DOCTYPE html>
<?php 
include '../html/header.php';
include '../../backend/CRUDvet/mostrar_veterinario.php';
?>
<html lang="en">
    <head>
    
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        
        <link rel="stylesheet" href="../css/styles2.css">
        <link rel="stylesheet" href="../css/style.css">
        <!-- Tailwind CSS Link -->
      <link href="../../output.css" rel="stylesheet">
      <!-- Tailwind CSS Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
      <!-- Fontawesome -->
      <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
      <link rel="shortcut icon" href="src/img/favicon-32x32.png" type="image/x-icon" sizes="32x32">
      <!-- SWIPER JS SCRIPT -->
      <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>

      <!-- TEMPORARILY USING GOOGLE FONTS FROM SERVER -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@500&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
      <script src= "../js/enviarconsulta.js"></script>
    </head>

    <body>
    <!-- Contenido principal -->
   <section class="flex-grow  h-screen">
     <!-- Contenido cabecero -->
       <header>
            <section class="relative w-full mt-20">
                <div class="w-full  h-72 bg-cover bg-center"
                    style="background-image: url('../images/veterinarios/doctorbanner1.jpeg');">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="absolute inset-0 flex justify-center items-center">
                        <h1 class="text-white text-5xl md:text-7xl font-bold">Veterinarios Especializados</h1>
                    </div>
                </div>
            </section>
        </header>
        <hr> </hr>
    <section>
      <!-- Primer grupo -->
      <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-100 py-6 sm:py-12">
    <div class="mx-auto max-w-screen-xl px-4 w-full">
        <h1 class="text-left text-lg font-bold">Veterinarios especializados en animales pequeños</h1>

        <!-- Grid para mostrar las tarjetas de veterinarios -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> 
            <?php 
            $hasVeterinarios = false; // Variable para verificar si hay veterinarios que cumplen la condición
            foreach ($veterinarios as $veterinario): ?>
                <?php if ($veterinario['idcategoriaespecialidad'] == 1): // Verifica si el idcategoriaespecialidad es 1 ?>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                        <!-- Imagen del veterinario -->
                        <?php
                        // Aquí construimos la ruta de la imagen
                        $ruta_imagen = '../../uploads_vets/' . htmlspecialchars($veterinario['fotoperfil']);
                        ?>
                        <img class="w-full h-56 object-cover" src="<?php echo $ruta_imagen; ?>" alt="Foto de <?php echo htmlspecialchars($veterinario['nombre']); ?>">

                        <!-- Contenido de la tarjeta -->
                        <div class="bg-white py-4 px-3">
                            <h3 class="text-xs mb-2 font-medium"><?php echo htmlspecialchars($veterinario['nombre']); ?> <?php echo htmlspecialchars($veterinario['apellido']); ?></h3>
                            <p class="text-xs text-gray-400"><?php echo htmlspecialchars($veterinario['biografia']); ?></p>
                            <button type="button" class="btn btn-primary mt-6" data-bs-toggle="modal" data-bs-target="#consultaModal<?php echo $veterinario['id_veterinario']; ?>">
                                Ver Perfil
                            </button>
                        </div>
                    </div>
                    <?php $hasVeterinarios = true; // Cambiar el estado a verdadero si hay veterinarios ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Mensaje si no hay veterinarios que cumplan la condición -->
            <?php if (!$hasVeterinarios): ?>
                <p class="text-center text-gray-500 col-span-full">No hay veterinarios disponibles en esta especialidad.</p>
            <?php endif; ?>
        </div>

        <!-- Modal de cada veterinario -->
        <?php foreach ($veterinarios as $veterinario): ?>
            <?php if ($veterinario['idcategoriaespecialidad'] == 1): // Verifica si el idcategoriaespecialidad es 1 ?>
                <div class="modal fade" id="consultaModal<?php echo $veterinario['id_veterinario']; ?>" tabindex="-1" aria-labelledby="consultaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="consultaModalLabel">Perfil Veterinario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Contenido del modal con información adicional -->
                                <div class="container2">
                                    <div class="header2">
                                        <div class="person2">
                                            <div>
                                              <!-- Imagen del veterinario -->
                                                <?php
                                                // Aquí construimos la ruta de la imagen
                                                $ruta_imagen = '../../uploads_vets/' . htmlspecialchars($veterinario['fotoperfil']);
                                                ?>
                                                <img class="dp2" src="<?php echo $ruta_imagen; ?>" alt="Foto de <?php echo htmlspecialchars($veterinario['nombre']); ?>">
                                            </div>
                                            <div class="name2"><?php echo htmlspecialchars($veterinario['nombre']); ?> <?php echo htmlspecialchars($veterinario['apellido']); ?></div>
                                        </div>
                                    </div>
                                    <div class="info2">
                                        <h2 class="title2">Saber más</h2>
                                        <p><?php echo htmlspecialchars($veterinario['biografia']); ?></p>
                                        <p>Correo electrónico: <?php echo htmlspecialchars($veterinario['email']); ?></p>
                                        <p>Sede donde trabaja: <?php echo htmlspecialchars($veterinario['sede']); ?></p>
                                        <p>Teléfono de contacto: <?php echo htmlspecialchars($veterinario['telefono']); ?></p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

   <!-- segundo grupo -->
   <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-100 py-6 sm:py-12">
    <div class="mx-auto max-w-screen-xl px-4 w-full">
        <h1 class="text-left text-lg font-bold">Veterinarios especializados en animales grandes</h1>

        <!-- Grid para mostrar las tarjetas de veterinarios -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> 
            <?php 
            $hasVeterinarios = false; // Variable para verificar si hay veterinarios que cumplen la condición
            foreach ($veterinarios as $veterinario): ?>
                <?php if ($veterinario['idcategoriaespecialidad'] == 2): // Verifica si el idcategoriaespecialidad es 2 ?>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                        <!-- Imagen del veterinario -->
                        <?php
                        // Aquí construimos la ruta de la imagen
                        $ruta_imagen = '../../uploads_vets/' . htmlspecialchars($veterinario['fotoperfil']);
                        ?>
                        <img class="w-full h-56 object-cover" src="<?php echo $ruta_imagen; ?>" alt="Foto de <?php echo htmlspecialchars($veterinario['nombre']); ?>">

                        <!-- Contenido de la tarjeta -->
                        <div class="bg-white py-4 px-3">
                            <h3 class="text-xs mb-2 font-medium"><?php echo htmlspecialchars($veterinario['nombre']); ?> <?php echo htmlspecialchars($veterinario['apellido']); ?></h3>
                            <p class="text-xs text-gray-400"><?php echo htmlspecialchars($veterinario['biografia']); ?></p>
                            <button type="button" class="btn btn-primary mt-6" data-bs-toggle="modal" data-bs-target="#consultaModal<?php echo $veterinario['id_veterinario']; ?>">
                                Ver Perfil
                            </button>
                        </div>
                    </div>
                    <?php $hasVeterinarios = true; // Cambiar el estado a verdadero si hay veterinarios ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Mensaje si no hay veterinarios que cumplan la condición -->
            <?php if (!$hasVeterinarios): ?>
                <p class="text-center text-gray-500 col-span-full">No hay veterinarios disponibles en esta especialidad.</p>
            <?php endif; ?>
        </div>

        <!-- Modal de cada veterinario -->
        <?php foreach ($veterinarios as $veterinario): ?>
            <?php if ($veterinario['idcategoriaespecialidad'] == 2): // Verifica si el idcategoriaespecialidad es 2 ?>
                <div class="modal fade" id="consultaModal<?php echo $veterinario['id_veterinario']; ?>" tabindex="-1" aria-labelledby="consultaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="consultaModalLabel">Perfil Veterinario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Contenido del modal con información adicional -->
                                <div class="container2">
                                    <div class="header2">
                                        <div class="person2">
                                            <div>
                                              <!-- Imagen del veterinario -->
                                                <?php
                                                // Aquí construimos la ruta de la imagen
                                                $ruta_imagen = '../../uploads_vets/' . htmlspecialchars($veterinario['fotoperfil']);
                                                ?>
                                                <img class="dp2" src="<?php echo $ruta_imagen; ?>" alt="Foto de <?php echo htmlspecialchars($veterinario['nombre']); ?>">
                                            </div>
                                            <div class="name2"><?php echo htmlspecialchars($veterinario['nombre']); ?> <?php echo htmlspecialchars($veterinario['apellido']); ?></div>
                                        </div>
                                    </div>
                                    <div class="info2">
                                        <h2 class="title2">Saber más</h2>
                                        <p><?php echo htmlspecialchars($veterinario['biografia']); ?></p>
                                        <p>Correo electrónico: <?php echo htmlspecialchars($veterinario['email']); ?></p>
                                        <p>Sede donde trabaja: <?php echo htmlspecialchars($veterinario['sede']); ?></p>
                                        <p>Teléfono de contacto: <?php echo htmlspecialchars($veterinario['telefono']); ?></p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

   <!-- otro grupo -->
   <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-100 py-6 sm:py-12">
    <div class="mx-auto max-w-screen-xl px-4 w-full">
        <h1 class="text-left text-lg font-bold">Veterinarios especializados en animales exóticos</h1>

        <!-- Grid para mostrar las tarjetas de veterinarios -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> 
            <?php 
            $hasVeterinarios = false; // Variable para verificar si hay veterinarios que cumplen la condición
            foreach ($veterinarios as $veterinario): ?>
                <?php if ($veterinario['idcategoriaespecialidad'] == 3): // Verifica si el idcategoriaespecialidad es 3 ?>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                        <!-- Imagen del veterinario -->
                        <?php
                        // Aquí construimos la ruta de la imagen
                        $ruta_imagen = '../../uploads_vets/' . htmlspecialchars($veterinario['fotoperfil']);
                        ?>
                        <img class="w-full h-56 object-cover" src="<?php echo $ruta_imagen; ?>" alt="Foto de <?php echo htmlspecialchars($veterinario['nombre']); ?>">

                        <!-- Contenido de la tarjeta -->
                        <div class="bg-white py-4 px-3">
                            <h3 class="text-xs mb-2 font-medium"><?php echo htmlspecialchars($veterinario['nombre']); ?> <?php echo htmlspecialchars($veterinario['apellido']); ?></h3>
                            <p class="text-xs text-gray-400"><?php echo htmlspecialchars($veterinario['biografia']); ?></p>
                            <button type="button" class="btn btn-primary mt-6" data-bs-toggle="modal" data-bs-target="#consultaModal<?php echo $veterinario['id_veterinario']; ?>">
                                Ver Perfil
                            </button>
                        </div>
                    </div>
                    <?php $hasVeterinarios = true; // Cambiar el estado a verdadero si hay veterinarios ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Mensaje si no hay veterinarios que cumplan la condición -->
            <?php if (!$hasVeterinarios): ?>
                <p class="text-center text-gray-500 col-span-full">No hay veterinarios disponibles en esta especialidad.</p>
            <?php endif; ?>
        </div>

        <!-- Modal de cada veterinario -->
        <?php foreach ($veterinarios as $veterinario): ?>
            <?php if ($veterinario['idcategoriaespecialidad'] == 3): // Verifica si el idcategoriaespecialidad es 3 ?>
                <div class="modal fade" id="consultaModal<?php echo $veterinario['id_veterinario']; ?>" tabindex="-1" aria-labelledby="consultaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="consultaModalLabel">Perfil Veterinario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Contenido del modal con información adicional -->
                                <div class="container2">
                                    <div class="header2">
                                        <div class="person2">
                                            <div>
                                              <!-- Imagen del veterinario -->
                                              <?php
                                              // Aquí construimos la ruta de la imagen
                                              $ruta_imagen = '../../uploads_vets/' . htmlspecialchars($veterinario['fotoperfil']);
                                              ?>
                                                <img class="dp2" src="<?php echo $ruta_imagen; ?>" alt="Foto de <?php echo htmlspecialchars($veterinario['nombre']); ?>">
                                            </div>
                                            <div class="name2"><?php echo htmlspecialchars($veterinario['nombre']); ?> <?php echo htmlspecialchars($veterinario['apellido']); ?></div>
                                        </div>
                                    </div>
                                    <div class="info2">
                                        <h2 class="title2">Saber más</h2>
                                        <p><?php echo htmlspecialchars($veterinario['biografia']); ?></p>
                                        <p>Correo electrónico: <?php echo htmlspecialchars($veterinario['email']); ?></p>
                                        <p>Sede donde trabaja: <?php echo htmlspecialchars($veterinario['sede']); ?></p>
                                        <p>Teléfono de contacto: <?php echo htmlspecialchars($veterinario['telefono']); ?></p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

</section>
     
    
     <!-- Incluir el footer -->
    <?php include '../html/footer.php'; ?>

    </section>
    </main>
    <script src="ocultar_mostrar.js">
    </script>
    
</body>
</html>
