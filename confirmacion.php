<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logueo correcto</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/favicon.png" />
</head>
<body>

    <h1>Bien!</h1>
    <p>Te has logueado correctamente.</p>
    <?php echo "Usuario: " . $_SESSION['usuario'] . "<br>";?>
    <?php echo "Email: " . $_SESSION['email'] . "<br>"; ?>
</body>
</html>