<?php
$nombre = $_GET['nombre'];
$descripcion_corta = $_GET['descripcion_corta'];
$precio = $_GET['precio'];
$fechaHoraReserva = $_GET['fechaHoraReserva'];
?>

<div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="row g-3">
        <div class="col-md-6">
            <center><span>¿Qué metodo de pago quieres usar?</span></center>
            <br><br>
            <div class="card">
                <div class="accordion" id="accordionExample">

                    <div class="card">
                        <div class="card-header p-0" id="headingTwo">
                            <h2 class="mb-0">
                                <button
                                    class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom"
                                    type="button" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span>Paypal</span>
                                        <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                                    </div>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Introduce tu email de PayPal">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="d-flex align-items-center justify-content-between">

                                        <span>Tarjeta de crédito</span>
                                        <div class="icons">
                                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                            <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                            <img src="https://i.imgur.com/35tC99g.png" width="30">
                                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                        </div>

                                    </div>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body payment-card-body">

                                <span class="font-weight-normal card-text"><i class="fa fa-credit-card"></i> Número de
                                    tarjeta</span>
                                <br>
                                <div class="input">
                                    <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                                </div>

                                <div class="row mt-3 mb-3">
                                    <div class="col-md-6">
                                        <span class="font-weight-normal card-text"><i class="fa fa-calendar"></i> Fecha
                                            expiración</span>
                                        <br>
                                        <div class="input">
                                            <input type="text" class="form-control" placeholder="MM/YY">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <span class="font-weight-normal card-text"><i class="fa fa-lock"></i> CVV</span>
                                        <br>
                                        <div class="input">
                                            <input type="text" class="form-control" placeholder="000">
                                        </div>
                                    </div>
                                </div>
                                <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Su compra es segura
                                    y está protegida mediante SSL.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <center><span>Resumen del pedido</span></center>

            <br><br>
            <div class="card">
                <form class="card-body" action="?action=realizarReserva" method="POST">
                    <!-- Se almacenan los valores para posteriormente enviarlos -->
                    <input type="hidden" name="nombreEmplazamiento" value="<?php echo "$nombre"; ?>" />
                    <input type="hidden" name="precio" value="<?php echo "$precio"; ?>" />
                    <input type="hidden" name="fechaHoraReserva" value="<?php echo "$fechaHoraReserva"; ?>" />

                    <div class="p-3 d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <!-- Se rellena el campo de nombre emplazamiento -->
                            <input type="text" disabled="true" class="form-control-plaintext"
                                value="<?php echo "$nombre"; ?>" readonly />

                            <br>
                            <small>
                                <?php 
                                $fechaHoraFormateada = date('d/m/Y H:m', strtotime($fechaHoraReserva));
                                echo "Fecha y hora para reserva: <b>" . $fechaHoraFormateada . "</b>";
                                ?>
                            </small>
                            <br>
                            <small>
                                <span class="badge"
                                    style="background-color: #515A5A">Descripcion</span>&nbsp;<?php echo "$descripcion_corta"; ?>
                            </small>
                        </div>

                        <!-- Se rellena el campo del precio del emplazamiento -->
                        <span>Total: <b><?php echo "$precio"; ?>€</b></span>

                    </div>
                    <div class="p-3">
                        <button type="submit" class="btn btn-primary btn-block free-button">Realizar pago</button>
                    </div>
                    <a href="index" style="text-decoration: none">
                        <div class="p-3">
                            <a role="button" data-toggle="modal" data-target="#confirmarCancelacion"><button
                                    type="button" class="btn btn-light btn-block free-button">Salir y cancelar la
                                    reserva</button></a>
                        </div>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal que se abrirá para confirmar la cancelacion de la reserva -->
<div class="modal fade" id="confirmarCancelacion" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroLabel">Confirmación pendiente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre">
                            ¿Estás seguro de cancelar la reserva?
                            <br>
                            Todos los cambios se perderán.
                        </label>
                        <br><br>
                        <a href="index"><button type="button" class="btn btn-danger btn-sm">Si, estoy
                                seguro/a</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>