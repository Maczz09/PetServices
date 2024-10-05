<?php 

include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        
        <link rel="stylesheet" href="../css/styles2.css">
    </head>
    <body>
        
        <!-- Page content-->
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    
                    <article class="mb-4">                  
                            <!-- Post title-->
                            <div style="height: 50px;"></div>
                            <h1 class="fw-bolder mb-1">Luisa Sanchez</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Actualizado en 05 enero, 2024</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Piura</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Castilla</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">26 de Octubre</a>
                        
                        
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="../images/veterinaria1.jpg" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">Especialidad: Medicina Veterinaria General y Cirugía de Pequeños Animales</p>
                            <p class="fs-5 mb-4">Experiencia: 15 años</p>
                            <p class="fs-5 mb-4">Clínica: Clínica Veterinaria PetServices - Piura</p>
                            <h2 class="fw-bolder mb-4 mt-5">Biografía</h2>
                            <p class="fs-5 mb-4">La Dra. Luisa Sanchez es una apasionada de los animales desde pequeño. Con más de 15 años de experiencia, se ha dedicado a brindar la mejor atención a sus pacientes peludos. </p>
                            <p class="fs-5 mb-4"> Su enfoque se centra en la medicina preventiva y en establecer una relación cercana con los dueños de las mascotas.</p>
                            <p class="fs-5 mb-4"> Además de su experiencia en medicina general, la Dra. Sanchez es una experta en cirugía de pequeños animales, realizando procedimientos complejos con la mayor precisión y cuidado</p>
                            <p class="fs-5 mb-4"> En su tiempo libre, disfruta de largas caminatas con su golden retriever, Luna."</p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">José Pacherres</div>
                                        ¡Hola a todos! Tengo una duda existencial: ¿qué creen que piensan los gatos cuando los acariciamos? Mi gatito, Alvin, se queda completamente quieto y ronronea como una moto, pero a veces siento que me está juzgando con esos ojos tan misteriosos.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Fabri Nima</div>
                                                ¡Hola! Mi perro, Max, es todo lo contrario. ¡Se vuelve loco de alegría cuando lo acaricio! Creo que los perros son mucho más expresivos que los gatos. A veces pienso que Max cree que soy su mejor amigo en el mundo.  ¿Y tú, qué opinas sobre la relación entre humanos y mascotas?
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">José Pacherres</div>
                                                ¡Es verdad! Los perros son unos adorables peludos. Creo que los animales nos enseñan mucho sobre el amor incondicional. A pesar de su misterio, los gatos también tienen su encanto. ¿Alguna vez han intentado enseñarles trucos a sus mascotas? A mí se me resiste enseñar a Luna a traer la bolita.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Max García</div>
                                        ¡Hola a todos! Mi gata Perséfone es una verdadera diva. Le encanta que la cepille y se queda dormida en las posiciones más extrañas. ¿Alguna vez han intentado enseñarles trucos a sus gatos? A mí se me resiste enseñarle a dar la pata.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                
                <div class="col-lg-4">
                <div style="height: 50px;"></div>
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Nombre del veterinario</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Ingresa nombre" aria-label="Ingresa nombre..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Redes Sociales</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Facebook</a></li>
                                        <li><a href="#!">Instagram</a></li>
                                        <li><a href="#!">Whatsapp</a></li>
                                    </ul>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <!-- <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div> -->
                </div>
            </div>
        </div>
       
        <!-- Footer-->
        <footer>
            <?php include 'footer.php' ?>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="main.js"></script>
    </body>
</html>
