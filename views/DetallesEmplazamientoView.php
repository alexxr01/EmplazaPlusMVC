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
                                <img class="d-block w-100" src="https://i.imgur.com/fd3zVHm.jpeg" alt="First slide">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del carousel de imágenes -->
                
                <div class="col-md-6">
                    <div class="small mb-1">Categoría: <?php echo $emplazamiento['categoria']; ?></div>
                    <h1 class="display-6 fw-bolder"><?php echo $emplazamiento['nombre']; ?></h1>
                    <div class="fs-5 mb-5">
                        <span><?php echo $emplazamiento['precio']; ?>€ <small><i>(Precio por horas)</i></small></span>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php echo $emplazamiento['descripcion']; ?>.
                        </div>
                    </div>
                    <br><br>

                    <div class="card text-center">
                        <div class="card-body">
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                                    style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                    Realizar reserva
                                </button>
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