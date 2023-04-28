<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Lista de usuarios registrados
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Permisos</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Permisos</th>
                    <th>Descripcion</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['usuario']; ?></td>
                    <td><?php echo $usuario['correo']; ?></td>
                    <td><?php echo $usuario['permisos']; ?></td>
                    <td><?php echo $usuario['descripcion']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>