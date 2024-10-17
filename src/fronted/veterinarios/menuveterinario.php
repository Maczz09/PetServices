<!DOCTYPE html>
<?php 
include '../html/header.php';
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
    <section>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
    <div class="mx-auto max-w-screen-xl px-4 w-full">
    <h2 class="mb-4 font-bold text-xl text-gray-600">Especialistas en animales pequeños</h2>
    <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">

      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile2.jpg" alt="Ana Torres">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Ana Torres</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es una veterinaria especializada en medicina interna de animales pequeños. Se graduó de la Universidad Nacional de Veterinaria y ha trabajado en clínicas de emergencia durante más de cinco años
          </p>
          
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <!-- <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a> -->
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile1.jpg" alt="Luis Martínez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Luis Martínez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es un veterinario de cualquier tipo de animales con más de 15 años de experiencia. Se graduó de la Universidad de Agricultura y ha dedicado su carrera a la atención de ganado en zonas rurales.
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
          <img src="../images/veterinarios/profile4.jpeg" alt=" Mariana Gómez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dra. Mariana Gómez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es especialista en cirugía veterinaria y tiene un interés particular en la ortopedia animal.          
            Su enfoque se centra en la medicina preventiva y en establecer una relación cercana con los dueños de las mascotas.</p>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile3.jpg" alt="Carlos Pérez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Carlos Pérez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es un veterinario clínico que se especializa en comportamiento animal. Con una formación en etología, ha trabajado con una variedad de especies y es conocido por su enfoque empático hacia los animales y sus dueños.
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="perfilvet1.php" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile4.jpg" alt="Luisa Sánchez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dra. Luisa Sánchez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            es una apasionada de los animales desde pequeño. Con más de 15 años de experiencia, se ha dedicado a brindar la mejor atención a sus pacientes peludos.
          </p>
          
          </div>
        </div>
      </div>
           
      
    </div>
  </div>

  <div class="mx-auto max-w-screen-xl px-4 w-full">
    <h2 class="mb-4 font-bold text-xl text-gray-600">Especialistas en animales grandes</h2>
    <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile2.jpg" alt="Ana Torres">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Ana Torres</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es una veterinaria especializada en medicina interna de animales pequeños. Se graduó de la Universidad Nacional de Veterinaria y ha trabajado en clínicas de emergencia durante más de cinco años
          </p>
          
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile1.jpg" alt="Luis Martínez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Luis Martínez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es un veterinario de grandes animales con más de 15 años de experiencia. Se graduó de la Universidad de Agricultura y ha dedicado su carrera a la atención de ganado en zonas rurales.
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
          <img src="../images/veterinarios/profile4.jpeg" alt="Mariana Gómez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dra. Mariana Gómez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es especialista en cirugía veterinaria y tiene un interés particular en la ortopedia animal.          
            Su enfoque se centra en la medicina preventiva y en establecer una relación cercana con los dueños de las mascotas.</p>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile3.jpg" alt="Carlos Pérez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Carlos Pérez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es un veterinario clínico que se especializa en comportamiento animal. Con una formación en etología, ha trabajado con una variedad de especies y es conocido por su enfoque empático hacia los animales y sus dueños.
          </p>
          
          </div>
        </div>
      </div>
      
       
      
    </div>
  </div>

  <div class="mx-auto max-w-screen-xl px-4 w-full">
    <h2 class="mb-4 font-bold text-xl text-gray-600">Especialistas en animales exoticos</h2>
    <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile2.jpg" alt="Ana Torres">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Ana Torres</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es una veterinaria especializada en medicina interna de animales pequeños. Se graduó de la Universidad Nacional de Veterinaria y ha trabajado en clínicas de emergencia durante más de cinco años
          </p>
          
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile1.jpg" alt="Luis Martínez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Luis Martínez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es un veterinario de grandes animales con más de 15 años de experiencia. Se graduó de la Universidad de Agricultura y ha dedicado su carrera a la atención de ganado en zonas rurales.
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
          <img src="../images/veterinarios/profile4.jpeg" alt="Mariana Gómez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dra. Mariana Gómez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es especialista en cirugía veterinaria y tiene un interés particular en la ortopedia animal.          
            Su enfoque se centra en la medicina preventiva y en establecer una relación cercana con los dueños de las mascotas.</p>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        
        <a href="#" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/veterinarios/profile3.jpg" alt="Carlos Pérez">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Dr. Carlos Pérez</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Es un veterinario clínico que se especializa en comportamiento animal. Con una formación en etología, ha trabajado con una variedad de especies y es conocido por su enfoque empático hacia los animales y sus dueños.
          </p>
          
          </div>
        </div>
      </div>
      
      
      
    </div>
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
