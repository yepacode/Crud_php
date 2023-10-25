<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css"> <!-- Corregido el atributo type -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/js/scripts.js"></script>

    <title>Agregar Nuevo Producto</title>
</head>

<body>
<div class="padre">
<div class="login wrap">
    <div class="h1">Canasta de productos</div>
    <div class="h3">Ingresa producto</div>

    <input placeholder="Nombre" id="nombre" name="nombre" type="text">
    <input placeholder="Precio" id="precio" name="precio" type="text">
    

    <input value="Actualizar" class="btn" id="guardar_edicion" >
</div>
<!-- Agrega esta tabla y div para mensajes a tu HTML -->

</div>
<script>
    $(document).ready(function() {
        // Obtiene el ID del producto desde la URL
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get('id');
        
        if (id) {
            $.ajax({
                url: 'app/controllers/ProductoControllers.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'editar',
                    id: id
                },
                success: function(data) {
                    // Carga los datos del producto en los campos input
                    $('#nombre').val(data.nombre);
                    $('#precio').val(data.precio);
                },
                error: function(error) {
                    console.error('Error al cargar los datos del producto:', error);
                }
            });
        }
    });
</script>

</body>

</html>
