    <?php foreach ($emplazamientos as $emplazamiento): ?>        
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <!-- Inicio del carousel de imágenes -->
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="https://i.imgur.com/fd3zVHm.jpeg" alt="First slide">
                                </div>
                            </div>
                        </div>
                        <!-- Fin del carousel de imágenes -->
                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1">Categoría: <?php echo $emplazamiento['categoria']; ?></div>
                        <h1 class="display-6 fw-bolder"><?php echo $emplazamiento['nombre']; ?></h1>
                        <div class="fs-5 mb-5">
                            <span><?php echo $emplazamiento['precio']; ?>€ <small>(El precio indicado es por 1h)</small></span>
                        </div>
                        <p class="lead"><?php echo $emplazamiento['descripcion']; ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Pagar reserva
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>