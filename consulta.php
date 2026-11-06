<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "navbar.php";
    include "conexion.php";

    $sql = "SELECT * FROM libros ORDER BY id DESC;";
    $resultado = mysqli_query($con, $sql);
    ?>

    <div class="container mt-4">
        <h1 class="mb-4">Libros registrados</h1>

        <?php if (mysqli_num_rows($resultado) == 0): ?>
            <div class="alert alert-info">
                Aún no hay libros registrados.
                <a href="registro.php" class="alert-link">Registra el primero</a>.
            </div>
        <?php else: ?>
            <div class="row">
                <?php while ($libro = mysqli_fetch_assoc($resultado)): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="data:<?= $libro['tipo_portada'] ?>;base64,<?= base64_encode($libro['portada']) ?>"
                                class="card-img-top"
                                alt="Portada de <?= htmlspecialchars($libro['titulo']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                                <p class="card-text mb-1"><?= htmlspecialchars($libro['autor']) ?></p>
                                <p class="card-text text-muted small">
                                    <?= date("d/m/Y", strtotime($libro['fecha_publicacion'])) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>