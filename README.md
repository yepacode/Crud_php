CRUD Básico de Productos
Este proyecto consiste en un sistema CRUD (Create, Read, Update, Delete) para gestionar productos. Los productos se definen por los siguientes datos: Identificación, Nombre del Producto y Precio.



🚀 Comenzando
Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas.

📋 Pre-requisitos
Servidor Apache y MySQL (Se recomienda XAMPP).
Git.
🔧 Instalación
Clona el repositorio a tu máquina local:


git clone https://github.com/tu_usuario_en_github/ruta_del_repositorio.git

Asegúrate de colocar el proyecto en la carpeta htdocs (si estás utilizando XAMPP).

Inicia el servidor Apache y MySQL y dirígete a http://localhost/ruta_del_proyecto en tu navegador.
BD.
-- Creación de la base de datos
CREATE DATABASE crud_productos;

-- Seleccionamos la base de datos
USE crud_productos;

-- Creación de la tabla 'productos'
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

-- Insertar datos de prueba (opcional)
INSERT INTO productos (nombre, precio) VALUES
    ('Producto A', 100.50),
    ('Producto B', 200.25),
    ('Producto C', 150.75);



🛠️ Construido con
PHP
jQuery
MySQL
ajax

✒️ Autores
Yeniffer Palomino  - Yepacode

