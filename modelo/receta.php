<?php
require_once __DIR__ . '/../core/Database.php';

class Receta {
    private const NOMBRE_CLASE = 'Receta';
    
    public $Id;
    public $Nombre;
    public $Ingredientes;
    public $TiempoPreparacion;
    public $Porciones;
    public $Dificultad;
    public $Calorias;

    //id, nombre, ingredientes, tiempoPreparacion, porciones, dificultad, calorias//
    public function __construct() {
        // Constructor vacío para que FETCH_CLASS funcione correctamente
    }

    /**
     * Obtener todas las recetas desde la BD
     * Usando FETCH_CLASS para mapear automáticamente a objetos receta (ORM)
     */
    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT id, nombre, ingredientes, tiempoPreparacion, porciones, dificultad, calorias FROM recetas ORDER BY id DESC');
            $stmt->execute();
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
        } catch (PDOException $e) {
            error_log("Error al obtener recetas: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener una receta por ID
     * Usando FETCH_CLASS para mapear automáticamente a objeto receta (ORM)
     */
    public static function obtenerPorId($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT id, nombre, ingredientes, tiempoPreparacion, porciones, dificultad, calorias FROM recetas WHERE id = :id');
            $stmt->execute([':id' => $id]);
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener receta: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Agregar una nueva receta
     */
    public static function agregar($nombre, $ingredientes, $tiempoPreparacion, $porciones, $dificultad, $calorias) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO recetas (nombre, ingredientes, tiempoPreparacion, porciones, dificultad, calorias) VALUES (:nombre, :ingredientes, :tiempoPreparacion, :porciones, :dificultad, :calorias)');
            
            return $stmt->execute([
                ':nombre' => $nombre,
                ':ingredientes' => $ingredientes,
                ':tiempoPreparacion' => $tiempoPreparacion,
                ':porciones' => $porciones,
                ':dificultad' => $dificultad,
                ':calorias' => $calorias
            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar receta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Editar una receta existente
     */
    public static function editar($id, $nombre, $ingredientes, $tiempoPreparacion, $porciones, $dificultad, $calorias) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE recetas SET nombre = :nombre, ingredientes = :ingredientes, tiempoPreparacion = :tiempoPreparacion, porciones = :porciones, dificultad = :dificultad, calorias = :calorias WHERE id = :id');
            
            return $stmt->execute([
                ':id' => $id,
                ':nombre' => $nombre,
                ':ingredientes' => $ingredientes,
                ':tiempoPreparacion' => $tiempoPreparacion,
                ':porciones' => $porciones,
                ':dificultad' => $dificultad,
                ':calorias' => $calorias
            ]);
        } catch (PDOException $e) {
            error_log("Error al editar receta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una receta
     */
    public static function eliminar($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM recetas WHERE id = :id');
            
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar receta: " . $e->getMessage());
            return false;
        }
    }
}
?>
