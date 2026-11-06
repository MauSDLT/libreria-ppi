<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include "navbar.php"; 
    include "conexion.php";
    
    $mensaje = "";
    $tipoMensaje = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_FILES["portada"]["error"] !== UPLOAD_ERR_OK) {
            $mensaje = "Hubo un problema al subir la portada.";
            $tipoMensaje = "danger";
        } else {
            $titulo = mysqli_real_escape_string($con, $_POST["titulo"]);
            $autor  = mysqli_real_escape_string($con, $_POST["autor"]);
            $fecha  = mysqli_real_escape_string($con, $_POST["fecha"]);

            $portada = mysqli_real_escape_string($con, file_get_contents($_FILES["portada"]["tmp_name"]));
            $tipo    = mysqli_real_escape_string($con, $_FILES["portada"]["type"]);

            $sql = "INSERT INTO libros (autor, titulo, fecha_publicacion, portada, tipo_portada)
                    VALUES ('$autor', '$titulo', '$fecha', '$portada', '$tipo')";
            
            if (mysqli_query($con, $sql)) {
                $mensaje = "Libro registrado correctamente.";
                $tipoMensaje = "success";
            } else {
                $mensaje = "Error al registrar: " . mysqli_error($con);
                $tipoMensaje = "danger";
}
            mysqli_close($con);
        }
    }
    ?>

    <div class="container">
        <h1 class="mb-4">Registrar libro</h1>

        <?php if ($mensaje !== ""): ?>
            <div class="alert alert-<?= $tipoMensaje ?>"><?= $mensaje ?></div>
        <?php endif; ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" required>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de publicación</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <div class="mb-3">
                <label for="portada" class="form-label">Portada</label>
                <input type="file" class="form-control" id="portada" name="portada" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>