<?php
require_once '../modelos/ProductoModel.php';

// Verificar el método de solicitud (GET o POST)

    // Obtener la acción enviada desde el cliente
    $accion = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

    $productoModel = new ProductoModel();


    // Llamar a la función correspondiente según la acción
    if ($accion === 'guardar') {
        guardarProducto($productoModel);
    } elseif ($accion === 'obtener') {
        obtener();
    }

    elseif ($accion === 'editar') {
        obtenerProductoPorId();
    }
    elseif ($accion === 'guardar_edicion') {
        guardarEdicion();
    }
    elseif ($accion === 'eliminar') {
        eliminarProducto();
    }
    else{
        echo "No se ha encontrado la solicitud";
    }
// Función para guardar un nuevo producto
function guardarProducto($productoModel) {
    // Obtener los datos enviados por AJAX
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // No vuelvas a inicializar $productoModel aquí, ya lo estás pasando como argumento.
    // $productoModel = new ProductoModel();  <- ELIMINA ESTA LÍNEA

    // Llama a la función guardarProducto del modelo para guardar el producto
    $resultado = $productoModel->guardarProductoModel($nombre, $precio);

    // Responder a la solicitud AJAX (puede ser un mensaje de éxito o error)
    if ($resultado) {
        echo "El producto se ha guardado correctamente.";
    } else {
        echo "Hubo un error al guardar el producto.";
    }
}

function obtener() {
    // Crear una instancia del modelo ProductoModel
    $productoModel = new ProductoModel();

    // Llama a la función obtenerRegistros del modelo para obtener los productos
    $productos = $productoModel->obtenerRegistros();

    // Devolver los productos como JSON
    header('Content-Type: application/json');
    echo json_encode($productos);
}
function obtenerProductoPorId() {
    $productoModel = new ProductoModel();
    $id = $_POST['id'];
    $producto = $productoModel->obtenerProductoPorIdmodel($id);

    if ($producto) {
        header('Content-Type: application/json');
        echo json_encode($producto);
    } else {
        echo "Hubo un error al obtener el producto para editar.";
    }
}

function guardarEdicion() {
    $productoModel = new ProductoModel();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $resultado = $productoModel->actualizarProducto($id, $nombre, $precio);

    if ($resultado) {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Producto actualizado con éxito']);
    } else {
        echo "Hubo un error al actualizar el producto.";
    }
}
// Función para eliminar un producto
function eliminarProducto() {
    $id = $_POST['id'];
    $productoModel = new ProductoModel();

    // Llama a la función del modelo para eliminar el producto
    $resultado = $productoModel->eliminarProductoModel($id);

    if ($resultado) {
        echo json_encode(["success" => true, "message" => "Producto eliminado con éxito."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al eliminar el producto."]);
    }
}
?>
