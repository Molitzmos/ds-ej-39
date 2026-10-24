<?php require_once '../../modelo/receta.php'; 
$id = $_GET['id'] ?? null;
$receta = $id ? Receta::obtenerPorId($id) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Receta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Receta</h1>

                <?php if ($receta): ?>
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $receta->id; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $receta->nombre; ?></p>
                        <p><strong>Ingredientes:</strong> <?php echo $receta->ingredientes; ?></p>
                        <p><strong>Tiempo de Preparación:</strong> <?php echo $receta->tiempoPreparacion; ?></p>
                        <p><strong>Porciones:</strong> <?php echo $receta->porciones; ?></p>
                        <p><strong>Dificultad:</strong> <?php echo $receta->dificultad; ?></p>
                        <p><strong>Calorías:</strong> <?php echo $receta->calorias; ?></p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                    <a href="editar.php?id=<?php echo $receta->id; ?>" class="btn btn-warning">Editar</a>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">Receta no encontrada</div>
                <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
