<?php
include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nosotros</title>
    <!-- Tailwind CSS Link -->
    <link href="../../output.css" rel="stylesheet">

    <script>
 
    </script>
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
</head>

<body>

   <!-- Contenido principal -->
   <section class="flex-grow  h-screen">
     <!-- Contenido cabecero -->
       <header>
            <section class="relative w-full">
                <div class="w-full mt-16 h-72 bg-cover bg-center"
                    style="background-image: url('images/perroysudueño.jpg');">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="absolute inset-0 flex justify-center items-center">
                        <h1 class="text-white text-5xl md:text-7xl font-bold">Lugares PetFriendly</h1>
                    </div>
                </div>
            </section>
        </header>
        

        
   
     
    
          <footer class="bg-blue-700 flex flex-col sm:flex-row justify-around p-10 items-center relative">
          <!-- Incluir el footer -->
          <?php include 'footer.php'; ?>

    </section>
    </main>
    <script src="ocultar_mostrar.js">
    </script>
    
</body>
</html>
