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
                                <img class="d-block w-100"
                                    src="data:<?php echo $tipoImagen; ?>;base64,<?php echo base64_encode($emplazamiento['imagenes']); ?>"
                                    alt="Imagen de: <?php $emplazamiento['nombre'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del carousel de imágenes -->

                <div class="col-md-6">
                    <!-- Inicio del formulario de datos para proceder al pago -->
                    <div class="small mb-1">Categoría: <?php echo $emplazamiento['categoria']; ?></div>

                    <h1 class="display-6 fw-bolder">
                        <input type="text" readonly disabled="true" class="form-control-plaintext fw-bolder"
                            name="nombreEmplazamiento" value="<?php echo $emplazamiento['nombre']; ?>">
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

                    <div class="input-group mb-3">
                        <div class="input-group-prepend col-md-4">
                            <label class="input-group-text" for="inputGroupSelect01">Selecciona hora</label>
                        </div>
                        <select class="form-control" id="seleccionarHoraReserva" style="max-width: 5rem">
                            <option selected>16:00</option>
                            <option>17:00</option>
                            <option>18:00</option>
                            <option>19:00</option>
                            <option>20:00</option>
                            <option>21:00</option>
                        </select>
                    </div>

                    <div class="card text-center">
                        <div class="card-body">
                            <div class="d-flex">

                                <div class="input-group-prepend">
                                    <div class="input-group-text">🗓️</div>
                                </div>

                                <input class="form-control text-center me-3" name="fechaHoraReserva"
                                    id="seleccionarFechaReserva" type="text" placeholder="Selecciona el día"
                                    style="max-width: 11rem" />

                                <a href="pago?nombre=<?php echo $emplazamiento['nombre']; ?>&descripcion_corta=<?php echo $emplazamiento['descripcion_corta']; ?>&precio=<?php echo $emplazamiento['precio']; ?>&fechaHoraReserva="onclick="obtenerFechaHoraReserva()">
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