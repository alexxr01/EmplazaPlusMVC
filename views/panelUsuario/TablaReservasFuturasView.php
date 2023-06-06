<div class="card text-center">
    <div class="card-header">
        Reservas próximas
    </div>
    <div class="card-body">

        <!-- Tabla para el muestreo de todas las reservas realizadas -->
    <?php if (!empty($reservas)): ?>
        <?php foreach ($reservas as $reserva): ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Servicio reservado</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha fin</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><i class="bi bi-calendar-check"></i></th>
                    <td><?php echo $reserva['nombre']; ?></td>
                    <td><?php echo $reserva['fecha_alta']; ?></td>
                    <td><?php echo $reserva['fecha_baja']; ?></td>
                    <td><?php echo $reserva['precio']; ?> €</td>
                </tr>
            </tbody>
        </table>
        <?php endforeach; ?>
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