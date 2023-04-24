        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Lista de emplazamientos ⛺️</h1>
                    <p class="lead fw-normal text-white-50 mb-0">¡Elige el que más se adapte a sus necesidades!</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <!-- Inicio muestra emplazamientos -->
                    <?php foreach ($emplazamientos as $emplazamiento): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Muestreo de imagenes -->
                            <!-- <img class="card-img-top" src="https://i.imgur.com/fd3zVHm.jpeg" alt="..." /> -->

                            <!-- Inicio del carousel de imágenes -->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="https://i.imgur.com/fd3zVHm.jpeg" alt="First slide">
                                    </div>
                            </div>
                            <!-- Fin del carousel de imágenes -->
                        </div>
                            <!-- Detalles e información del producto -->
                            <form action="?action=detalles" method="POST">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Nombre del producto -->
                                    <h5>
                                        <input type="text" readonly class="form-control-plaintext text-center fw-bolder" name="nombreEmplazamiento" value="<?php echo $emplazamiento['nombre']; ?>">
                                    </h5>
                                    <!-- Descripción del producto -->
                                    <?php echo $emplazamiento['descripcion']; ?>
                                    <br><br>
                                    <!-- Precio del producto-->
                                    <p>Precio: <b><?php echo $emplazamiento['precio']; ?>€ / h</b></p>
                                </div>
                            </div>
                            <!-- Acciones a realizar para un emplazamiento en concreto -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <!--<div class="text-center"><a class="btn btn-outline-dark mt-auto">Reservar</a></div>-->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Mostrar detalles</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Fin lista de emplazamientos -->
                </div>
            </div>
        </section>