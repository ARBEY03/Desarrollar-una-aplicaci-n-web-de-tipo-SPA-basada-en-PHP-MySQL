<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Obtener el ID del producto a eliminar desde la URL usando el método GET
$idProd = $_GET['idProd'];

try {
    // Crear la consulta SQL para eliminar el producto por su ID
    $sql = "DELETE FROM productos WHERE idProd = :idProd";
    
    // Preparar la consulta usando PDO
    $stmt = $conn->prepare($sql);
    
    // Asignar el valor del ID a la consulta
    $stmt->bindParam(':idProd', $idProd);
    
    // Ejecutar la consulta preparada
    $stmt->execute();
} catch (PDOException $e) {
    // Mostrar un mensaje de error si la eliminación falla
    echo "Error al eliminar el producto: " . $e->getMessage();
}

// Cerrar la conexión y redirigir al archivo principal
$conn = null;
header("Location: index.php");
exit;
?>
