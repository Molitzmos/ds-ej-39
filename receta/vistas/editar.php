<?php require_once '../../modelo/receta.php'; 
$id = $_GET['id'] ?? null;
$receta = $id ? Receta::obtenerPorId($id) : null;
$titulo = $receta ? 'Editar Receta' : 'Agregar Receta';
$accion = $receta ? 'editar' : 'agregar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $titulo; ?></h1>

                <form method="POST" action="../acciones.php">
                    <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                    <?php if ($receta): ?>
                    <input type="hidden" name="id" value="<?php echo $receta->id; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $receta ? $receta->nombre : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ingredientes</label>
                        <input type="text" class="form-control" name="ingredientes" value="<?php echo $receta ? $receta->ingredientes : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tiempo de Preparación</label>
                        <input type="number" class="form-control" name="tiempoPreparacion" value="<?php echo $receta ? $receta->tiempoPreparacion : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Porciones</label>
                        <input type="number" class="form-control" name="porciones" value="<?php echo $receta ? $receta->porciones : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dificultad</label>
                        <input type="text" class="form-control" name="dificultad" value="<?php echo $receta ? $receta->dificultad : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calorías</label>
                        <input type="number" class="form-control" name="calorias" value="<?php echo $receta ? $receta->calorias : ''; ?>" required>
                    </div>
                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>