<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="container mt-4">
        <div class="p-5 bg-light rounded">
            <h1>Bienvenido a la Librería</h1>
            <p class="lead">Registra libros y consulta el catálogo.</p>
            <a href="registro.php" class="btn btn-primary">Registrar libro</a>
            <a href="consulta.php" class="btn btn-outline-primary">Ver libros</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>