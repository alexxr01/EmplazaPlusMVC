<div class="card text-center">
    <div class="card-header">
        Reservas próximas
    </div>
    <div class="card-body">

        <!-- Tabla para el muestreo de todas las reservas realizadas -->
        <?php if (!empty($reservas)): ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Estado</th>
                    <th scope="col">Servicio reservado</th>
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Anotaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <th scope="row"><span class="badge" style="background-color: #2C3E50">Pendiente</span></th>
                    <td><?php echo $reserva['nombre']; ?></td>
                    <td><?php echo $reserva['fecha_hora']; ?></td>
                    <td><?php if ($reserva['precio'] == 0) {
                        echo "Gratis";
                    } else {
                        echo $reserva['precio'] . " €";
                    }
                    ?></td>
                    <td><?php if ($reserva['anotaciones'] == null) {
                        echo "-";
                    } else {
                        echo $reserva['anotaciones'];
                    } ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php else: ?>
        <div class="badge bg-dark text-wrap" style="width: 12rem;">
            No tienes futuras reservas...
        </div>
        <br>
        <?php endif; ?>

        <br>
        <a href="index" class="btn btn-dark">Realizar nueva</a>
    </div>
    <div class="card-footer text-muted">
        <small>Si ocurre algún error en la lista, por favor contacte con <a
                href="mailto:soporte@emplazaplus.com">soporte</a>.</small>
    </div>
</div>