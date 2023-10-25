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
    

    <input value="Guardar" class="btn" id="guardar" >
</div>
<!-- Agrega esta tabla y div para mensajes a tu HTML -->
<div class="mensaje"></div>
<table id="tabla-productos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se llenarán los datos de los productos -->
    </tbody>
</table>
</div>
</body>

</html>
