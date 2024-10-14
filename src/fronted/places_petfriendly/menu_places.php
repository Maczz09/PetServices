<?php
include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
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
            <section class="relative w-full">
                <div class="w-full mt-16 h-72 bg-cover bg-center"
                    style="background-image: url('../images/places/perroysudueño.jpg');">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="absolute inset-0 flex justify-center items-center">
                        <h1 class="text-white text-5xl md:text-7xl font-bold">Lugares PetFriendly</h1>
                    </div>
                </div>
            </section>
        </header>
    <section>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
    <div class="mx-auto max-w-screen-xl px-4 w-full">
    <h2 class="mb-4 font-bold text-xl text-gray-600">Centro comerciales</h2>
    <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">

      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/U5rAACRucJpN5YacA" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/centroscomerciales/openplaza.jpg" alt="openplaza">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Open Plaza Piura</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Se encuentra en Av. Andrés Avelino Cáceres 147, Piura 20002, Perú. Tiene una calificación de 4.3 estrellas
          </p>
          
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/VdDBjf9Xxnn74pHC7" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/centroscomerciales/realplaza.jpg" alt="Real Plaza Piura">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Real Plaza Piura</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Se encuentra en Av. Sánchez Cerro 234, Piura 20001, Perú. Tiene una calificación de 4.4 estrellas
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/eCNStnY6yxMRfkaH8" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
          <img src="../images/places/centroscomerciales/plazadelsolpiuragrau.jpg" alt="Plaza del Sol Piura Grau">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Plaza del Sol Piura Grau</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Se encuentra en Prolongación Miguel Grau 1401, Piura 20001, Perú. Tiene una calificación de 4.1 estrellas
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/X6v7HSZxN3KJfYLW9" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/centroscomerciales/plazadelsolpiuracentro.jpg" alt="Plaza del Sol Piura Centro">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Plaza del Sol Piura Centro</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Se encuentra en C. Cusco 801, Piura 20007, Perú. Tiene una calificación de 4.1 estrellas
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/EfksQi3ZBEMnJcvn8" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/centroscomerciales/centroplaza.jpg" alt="Centro Plaza">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Centro Plaza</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            Se encuentra en Jirón Ica 840, Piura 20001, Perú. Tiene una calificación de 4.4 estrellas
          </p>
          
          </div>
        </div>
      </div>
           
      
    </div>
  </div>

  <div class="mx-auto max-w-screen-xl px-4 w-full">
    <h2 class="mb-4 font-bold text-xl text-gray-600">Restaurantes</h2>
    <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">

      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/n9L8T1tUF8iXT2N2A" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>        
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/Restaurantes/MakyJay.jpeg" alt="Maky Jay's Cafe">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Maky Jay's Cafe</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            En res vicus b6 102, Piura 20020, Perú. Calificación: 4.2 estrellas
          </p>
          
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/cLh3iiZokDhSaq2n6" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/Restaurantes/Restaurante la olla de doña peto.jpeg" alt="Restaurante la Olla de Doña Peto">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Restaurante la Olla de Doña Peto</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en 51, Piura 20001, Perú
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/HLmDXoP4HBZmqSro7" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/Restaurantes/La-Casa-de-Maco.jpg" alt="La Casa de Maco">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Beef House - La Casa de Maco</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en La Legua Piura, Piura 20006, Perú. Calificación: 4.3 estrellas
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/aUvKAW3xoKkbi11m9" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/Restaurantes/Restaurante turistico parkos.jpeg" alt="estaurante Turístico Parkos">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Restaurante Turístico Parkos</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en Autop. del Sol, Piura 20000, Perú. Calificación: 4.5 estrellas
          </p>
          
          </div>
        </div>
      </div>
      
       
      
    </div>
  </div>

  <div class="mx-auto max-w-screen-xl px-4 w-full">
    <h2 class="mb-4 font-bold text-xl text-gray-600">Parques</h2>
    <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">

      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/QteXjMFBEPLRKTTf7" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/parques/juanpabloII.jpg" alt="Parque San Juan Pabloo II">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Parque San Juan Pabloo II</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en Parque Ana María, Tallanes 440, Piura 20009, Perú. Calificación: 4 estrellas 
          </p>
          
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/4PaAiSzbYWzcnR1n7" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/parques/parqueKurtbeer.jpeg" alt="Parque Ecológico Kurt Beer">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Parque Ecológico Kurt Beer</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en Piura, Perú. Calificación: 3.9 estrellas
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/uZ344QUZwqf9D41BA" class="z-20 absolute h-full w-full top-0 left-0" target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/parques/parqueheroesdelcenepa.jpg" alt="Parque Héroes del Cenepa">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Parque Héroes del Cenepa</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en Las Acacias 13C, Piura 20001, Perú. Calificación: 3.8 estrellas
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/zteSvjPk3SJdH9tF7" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/parques/parque de 4 de octubre.jpg" alt="Parque De 4 De Octubre">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Parque De 4 De Octubre</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en Piura 20009, Perú. Calificación: 3.8 estrellas
          </p>
          
          </div>
        </div>
      </div>
      <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
        <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="https://maps.app.goo.gl/R1Gy7GwdacGQoMqo7" class="z-20 absolute h-full w-full top-0 left-0 "target="_blank">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="h-44 overflow-hidden relative">
            <img src="../images/places/parques/parquemiraflores.jpg" alt="Parque Principal Miraflores Country Club">
          </div>
        </div>
        <div class="bg-white py-4 px-3">
          <h3 class="text-xs mb-2 font-medium">Parque Principal Miraflores Country Club</h3>
          <div class="flex justify-between items-center">
            <p class="text-xs text-gray-400">
            en Piura 20002, Perú. Calificación: 4.2 estrellas
          </p>
          
          </div>
        </div>
      </div>
      
      
      
    </div>
  </div>
</div>

</section>
     
    
    <footer class="bg-blue-700 flex flex-col sm:flex-row justify-around p-10 items-center relative">
     <!-- Incluir el footer -->
    <?php include 'footer.php'; ?>

    </section>
    </main>
    <script src="ocultar_mostrar.js">
    </script>
    
</body>
</html>
