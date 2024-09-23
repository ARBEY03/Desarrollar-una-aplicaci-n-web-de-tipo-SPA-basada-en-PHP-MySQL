<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza el archivo de estilos CSS -->
    <title>Inventario</title> <!-- Título de la página -->
</head>
<body>
    <h1>Inventario de Productos</h1> <!-- Encabezado de la página -->

    <!-- Formulario para agregar productos -->
    <form action="insertar.php" method="POST"> <!-- Enviar datos a 'insertar.php' usando POST -->
        <label for="idProd">idProd:</label> <!-- Etiqueta para el campo de ID del producto -->
        <input type="number" name="idProd" required><br> <!-- Campo para ingresar el ID del producto -->

        <label for="nombre">Nombre:</label> <!-- Etiqueta para el campo de nombre -->
        <input type="text" name="nombre" required><br> <!-- Campo para ingresar el nombre del producto -->

        <label for="precio">Precio:</label> <!-- Etiqueta para el campo de precio -->
        <input type="number" step="0.01" name="precio" required><br> <!-- Campo para ingresar el precio -->

        <label for="existencia">Existencia:</label> <!-- Etiqueta para el campo de existencia -->
        <input type="number" name="existencia" required><br> <!-- Campo para ingresar la existencia -->

        <button type="submit">Registrar</button> <!-- Botón para enviar el formulario -->
    </form>

    <!-- Tabla que muestra los productos existentes -->
    <table>
        <thead>
            <tr>
                <th>idProd</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir el archivo de conexión
            include 'conexion.php';

            // Consulta SQL para seleccionar todos los productos
            $sql = "SELECT * FROM productos";
            $stmt = $conn->query($sql);

            // Comprobar si hay productos en la base de datos
            if ($stmt->rowCount() > 0) {
                // Mostrar cada producto en una fila de la tabla
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['idProd']}</td>
                        <td>{$row['nombre']}</td>
                        <td>\${$row['precio']}</td>
                        <td>{$row['existencia']}</td>
                        <td><a href='eliminar.php?idProd={$row['idProd']}'>Eliminar</a></td>
                    </tr>";
                }
            } else {
                // Mostrar un mensaje si no hay productos
                echo "<tr><td colspan='5'>No hay productos registrados</td></tr>";
            }

            // Cerrar la conexión
            $conn = null;
            ?>
        </tbody>
    </table>
</body>
</html>
