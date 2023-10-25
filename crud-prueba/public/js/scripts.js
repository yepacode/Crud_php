
    $(document).ready(function() {
         // Llama a esta función cuando la página se carga
    cargarProductos();

    // Función para cargar los datos de los productos y llenar la tabla
    function cargarProductos() {
        $.ajax({
            url: 'app/controllers/ProductoControllers.php',
            method: 'GET',
            dataType: 'json',
            data: {
                action: 'obtener',
            },
            success: function(data) {
                // Limpia la tabla antes de agregar nuevos datos
                $('#tabla-productos tbody').empty();

                // Recorre los datos y agrega filas a la tabla
                $.each(data, function(index, producto) {
                    var fila = '<tr>' +
                        '<td>' + producto.id + '</td>' +
                        '<td>' + producto.nombre + '</td>' +
                        '<td>' + producto.precio + '</td>' +
                        '<td><button class="editar" data-id="' + producto.id + '"><img src="public/imagenes/pencil.png" alt="Editar"></button> <button class="borrar"><img src="public/imagenes/delete.png" alt="borrar"></button></td>'

                    $('#tabla-productos tbody').append(fila);
                });
            },
            error: function(error) {
                console.error('Error al cargar los productos:', error);
            }
        });
    }


        $("#guardar").click(function() {
            // Captura los valores de nombre y precio
            var nombre = $("#nombre").val();
            var precio = $("#precio").val();
            console.log(nombre);
            // Aquí puedes realizar una solicitud AJAX con los valores capturados
            // Ejemplo de solicitud AJAX con jQuery
            $.ajax({
                url: "app/controllers/ProductoControllers.php", // Reemplaza con la URL a la que deseas enviar los datos
                method: "POST", // Puedes usar POST o GET según tus necesidades
                data: {
                    nombre: nombre,
                    precio: precio,
                    action: 'guardar'

                },
                success: function(response) {
                    // Aquí puedes manejar la respuesta del servidor si es necesario
                    alert("Se ha creado correctamente");
                    window.location.href = "index.php";

                },
                error: function(error) {
                    // Manejo de errores en caso de que la solicitud AJAX falle
                    console.error(error);
                }
            });
        });

        $(document).on('click', '.editar', function() {
            var productoId = $(this).data('id');
            editarProducto(productoId);
        });
        function editarProducto(id) {
            $.ajax({
                url: 'app/controllers/ProductoControllers.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'editar',
                    id: id
                },
                success: function(data) {
                    // Redirige al usuario a la página de edición
                    window.location.href = "editar.php?id=" + id;
                },
                error: function(error) {
                    console.error('Error al intentar editar el producto:', error);
                }
            });
        }
        
        $('#guardar_edicion').click(function() {
            // Obtiene el ID del producto desde la URL
            let urlParams = new URLSearchParams(window.location.search);
            let id = urlParams.get('id');
            
            let nombre = $('#nombre').val();
            let precio = $('#precio').val();
    
            $.ajax({
                url: 'app/controllers/ProductoControllers.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'guardar_edicion',
                    id: id,
                    nombre: nombre,
                    precio: precio
                },
                success: function(data) {
                    // Aquí puedes mostrar un mensaje de éxito o hacer lo que necesites después de guardar.
                    alert('Producto actualizado con éxito.');
                    window.location.href = "index.php";
                },
                error: function(error) {
                    console.error('Error al guardar la edición:', error);
                }
            });
        });
        $(document).on('click', '.borrar', function() {
            var productoId = $(this).closest('tr').find('.editar').data('id');
            eliminarProducto(productoId);
        });
        function eliminarProducto(id) {
            $.ajax({
                url: 'app/controllers/ProductoControllers.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'eliminar',
                    id: id
                },
                success: function(data) {
                    // Aquí puedes mostrar un mensaje de éxito o hacer lo que necesites después de eliminar.
                    alert('Producto eliminado con éxito.');
                    cargarProductos(); // Refrescar la lista de productos
                },
                error: function(error) {
                    console.error('Error al intentar eliminar el producto:', error);
                }
            });
        }
        
        
    });
