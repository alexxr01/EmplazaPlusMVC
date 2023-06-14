<?php if (!empty($reservas)): ?>

<div class="card text-center">
    <div class="card-header">
        Reservas realizadas en el pasado
    </div>
    <div class="card-body">

        <!-- Tabla para el muestreo de todas las reservas realizadas -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Estado</th>
                    <th scope="col">Servicio reservado</th>
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <th scope="row"><span class="badge bg-success">Finalizado</span></th>
                    <td><?php echo $reserva['nombre']; ?></td>
                    <td><?php echo $reserva['fecha_hora']; ?></td>
                    <td><?php if ($reserva['precio'] == 0) {
                        echo "Gratis";
                    } else {
                        echo $reserva['precio'] . " €";
                    }
                    ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>