<div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 transition-transform transform -translate-x-full md:translate-x-0 bg-gray-300">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <h2 class="font-bold text-2xl">Pet <span class="bg-[#f84525] text-white px-2 rounded-md">Services</span></h2>
    </a>
    <ul class="mt-4 space-y-2">
        <!-- Home -->
        <li>
            <a href="dashboard.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-home-4-line text-lg"></i>
                <span class="text-sm ml-1">Home</span>
            </a>
        </li>
        
        <!-- Usuarios -->
        <li>
            <a href="#" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md sidebar-dropdown-toggle" onclick="toggleDropdown(event)">
                <i class="ri-user-line text-lg"></i>
                <span class="text-sm ml-1">Usuarios</span>
                <i class="ri-arrow-down-s-line text-lg ml-auto"></i>
            </a>
            <ul class="pl-7 mt-2 hidden dropdown-content">
                <li class="mb-4 flex items-center">
                    <i class="ri-arrow-right-s-line text-sm mr-2"></i>
                    <a href="/PetServices/src/fronted/admin/administrarUsers.php" class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Todos</a>
                </li>
                <li class="mb-4 flex items-center">
                    <i class="ri-arrow-right-s-line text-sm mr-2"></i>
                    <a href="/PetServices/src/fronted/admin/verRoles.php" class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Roles</a>
                </li>
            </ul>
        </li>

        <!-- Productos -->
        <li>
            <a href="dashboard.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-shopping-bag-3-line text-lg"></i>
                <span class="text-sm ml-1">Productos</span>
            </a>
        </li>

        <!-- Citas -->
        <li>
            <a href="AdminCitas.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-calendar-check-line text-lg"></i>
                <span class="text-sm ml-1">Citas</span>
            </a>
        </li>
        <!-- Servicios -->
        <li>
            <a href="AdminServicios.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-calendar-check-line text-lg"></i>
                <span class="text-sm ml-1">Servicios</span>
            </a>
        </li>

        <!-- Noticias -->
        <li>
            <a href="dashboard.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-newspaper-line text-lg"></i>
                <span class="text-sm ml-1">Noticias</span>
            </a>
        </li>

        <!-- Comentarios -->
        <li>
            <a href="dashboard.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-chat-3-line text-lg"></i>
                <span class="text-sm ml-1">Comentarios</span>
            </a>
        </li>

        <!-- Lugares PetFriendly -->
        <li>
            <a href="dashboard.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-map-pin-2-line text-lg"></i>
                <span class="text-sm ml-1">Lugares PetFriendly</span>
            </a>
        </li>

        <!-- Cerrar Sesión -->
        <li>
            <a href="/PetServices/src/backend/login_register_reset/logout.php" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-logout-box-r-line text-lg"></i>
                <span class="text-sm ml-1">Cerrar Sesión</span>
            </a>
        </li>
    </ul>
</div>

