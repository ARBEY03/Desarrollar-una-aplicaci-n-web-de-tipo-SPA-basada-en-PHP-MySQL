<?php
// Incluir el archivo de conexión para poder usar $conn
include 'conexion.php';

// Obtener los datos enviados desde el formulario a través de POST
$idProd = $_POST['idProd'];           // ID del producto
$nombre = $_POST['nombre'];           // Nombre del producto
$precio = $_POST['precio'];           // Precio del producto
$existencia = $_POST['existencia'];   // Existencia o cantidad del producto

try {
    // Crear la consulta SQL para insertar los datos en la tabla 'productos'
    $sql = "INSERT INTO productos (idProd, nombre, precio, existencia) VALUES (:idProd, :nombre, :precio, :existencia)";
    
    // Preparar la consulta SQL usando PDO
    $stmt = $conn->prepare($sql);
    
    // Asignar los valores a los parámetros de la consulta para evitar inyecciones SQL
    $stmt->bindParam(':idProd', $idProd);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':existencia', $existencia);

    // Ejecutar la consulta preparada
    $stmt->execute();
} catch (PDOException $e) {
    // Mostrar un mensaje de error si la inserción falla
    echo "Error al registrar el producto: " . $e->getMessage();
}

// Cerrar la conexión y redirigir al archivo principal
$conn = null;
header("Location: index.php");
exit;
?>
