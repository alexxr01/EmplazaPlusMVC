<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <?php if (isset($errorMessage)): ?>
        <div><?php echo $errorMessage ?></div>
    <?php endif ?>
    <form method="post" action="/login">
        <label>Nombre de usuario</label>
        <input type="text" name="username">
        <label>Contraseña</label>
        <input type="password" name="password">
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
