<div class="card text-center">
    <div class="card-header">
        Lista de reservas realizadas por ti
    </div>
    <div class="card-body">

        <!-- Tabla para el muestreo de todas las reservas realizadas -->
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
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <th scope="row"><i class="bi bi-calendar-check"></i></th>
                    <td><?php echo $reserva['nombre']; ?></td>
                    <td><?php echo $reserva['fecha_alta']; ?></td>
                    <td><?php echo $reserva['fecha_baja']; ?></td>
                    <td><?php echo $reserva['precio']; ?> €</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="index" class="btn btn-dark">Realizar nueva reserva</a>
    </div>
    <div class="card-footer text-muted">
        <small>Si ocurre algún error en la lista, por favor contacte con <a
                href="mailto:soporte@emplazaplus.com">soporte</a>.</small>
    </div>
</div>