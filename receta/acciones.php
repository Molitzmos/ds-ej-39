<?php
require_once '../modelo/receta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $ingredientes = $_POST['ingredientes'] ?? '';
    $tiempoPreparacion = $_POST['tiempoPreparacion'] ?? '';
    $porciones = $_POST['porciones'] ?? '';
    $dificultad = $_POST['dificultad'] ?? '';
    $calorias = $_POST['calorias'] ?? '';
    $id = $_POST['id'] ?? '';

    if ($accion === 'agregar') {
        Receta::agregar($nombre, $ingredientes, $tiempoPreparacion, $porciones, $dificultad, $calorias);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'editar') {
        Receta::editar($id, $nombre, $ingredientes, $tiempoPreparacion, $porciones, $dificultad, $calorias);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'eliminar') {
        Receta::eliminar($id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>
