    <?php foreach ($emplazamientos as $emplazamiento): ?>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <!-- Inicio del carousel de imágenes -->
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="https://i.imgur.com/fd3zVHm.jpeg"
                                    alt="Imágenes ilustrativas">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del carousel de imágenes -->
                
                <div class="col-md-6">
                    <!-- Inicio del formulario de datos para proceder al pago -->
                        <div class="small mb-1">Categoría: <?php echo $emplazamiento['categoria']; ?></div>

                        <h1 class="display-6 fw-bolder">
                        <input type="text" readonly disabled="true" class="form-control-plaintext fw-bolder" name="nombreEmplazamiento" value="<?php echo $emplazamiento['nombre']; ?>">
                        </h1>
                        <div class="fs-5 mb-5">                        
                            <span><?php echo $emplazamiento['precio']; ?>€ <small><i>(Precio por
                                        horas)</i></small></span>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <?php echo $emplazamiento['descripcion_larga']; ?>.
                            </div>
                        </div>
                        <br><br>

                        <div class="card text-center">
                            <div class="card-body">
                                <div class="d-flex">

                                    <input class="form-control text-center me-3" id="cantidadHoras" type="num" value="1"
                                        style="max-width: 3rem" />
                                    <a
                                        href="pago?nombre=<?php echo $emplazamiento['nombre']; ?>&descripcion_corta=<?php echo $emplazamiento['descripcion_corta']; ?>&precio=<?php echo $emplazamiento['precio']; ?>">
                                        <button type="submit" class="btn btn-outline-dark flex-shrink-0">
                                            <i class="bi-cart-fill me-1"></i>
                                            Realizar reserva
                                        </button>
                                    </a>

                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                Indique el número de horas, y finalize la reserva del recinto.
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>