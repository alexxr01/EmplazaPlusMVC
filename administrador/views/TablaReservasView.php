<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Lista de reservas
    </div>
    <div class="card-body">
        <table class="table" id="tablaReservas">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Servicio</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?php echo $reserva['id']; ?></td>
                    <td><?php echo $reserva['usuario']; ?></td>
                    <td><?php echo $reserva['nombre']; ?></td>
                    <td><?php echo $reserva['fecha_alta']; ?></td>
                    <td><?php echo $reserva['fecha_baja']; ?></td>
                    <td><?php echo $reserva['precio']; ?> €</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>