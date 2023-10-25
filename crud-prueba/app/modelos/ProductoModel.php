<?php
require_once '../../config/database.php';

class ProductoModel {
    // Función para guardar un producto en la base de datos
    public function guardarProductoModel($nombre, $precio) {
        global $conexion; // Importa la conexión desde database.php

        try {
            // Prepara una consulta SQL para insertar un nuevo producto
            $stmt = $conexion->prepare("INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)");
            
            // Bind de los parámetros
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            
            // Ejecuta la consulta
            $stmt->execute();
            
            // Verifica si se insertó correctamente
            if ($stmt->rowCount() > 0) {
                return true; // El producto se insertó correctamente
            } else {
                return false; // Hubo un error al insertar el producto
            }
        } catch (PDOException $e) {
            echo "Error al guardar el producto: " . $e->getMessage();
            return false; // Hubo un error en la operación
        }
    }
    public function obtenerRegistros() {
        global $conexion; // Importa la conexión desde database.php

        try {
            // Prepara una consulta SQL para obtener todos los productos
            $stmt = $conexion->prepare("SELECT * FROM productos");
            
            // Ejecuta la consulta
            $stmt->execute();
            
            // Obtiene todos los productos como un arreglo asociativo
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $productos;
        } catch (PDOException $e) {
            echo "Error al obtener los productos: " . $e->getMessage();
            return false; // Hubo un error en la operación
        }
    }

    public function obtenerProductoPorIdmodel($id) {
        global $conexion; // Importa la conexión desde database.php
    
        try {
            // Prepara una consulta SQL para obtener el producto por su ID
            $stmt = $conexion->prepare("SELECT * FROM productos WHERE id = :id");
            
            // Vincula el parámetro ID con el valor proporcionado
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Ejecuta la consulta
            $stmt->execute();
            
            // Obtiene el producto como un arreglo asociativo
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $producto;
        } catch (PDOException $e) {
            echo "Error al obtener el producto por ID: " . $e->getMessage();
            return false; // Hubo un error en la operación
        }
    }

    public function actualizarProducto($id, $nombre, $precio) {
        global $conexion;
    
        try {
            $stmt = $conexion->prepare("UPDATE productos SET nombre = :nombre, precio = :precio WHERE id = :id");
            
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute(); // Devuelve true si tuvo éxito y false si hubo un error
        } catch (PDOException $e) {
            echo "Error al actualizar el producto: " . $e->getMessage();
            return false;
        }
    }
    public function eliminarProductoModel($id) {
        global $conexion;
    
        try {
            $stmt = $conexion->prepare("DELETE FROM productos WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute(); // Devuelve true si tuvo éxito y false si hubo un error
        } catch (PDOException $e) {
            echo "Error al eliminar el producto: " . $e->getMessage();
            return false;
        }
    }
    
    
}
?>
