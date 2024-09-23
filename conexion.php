<?php
// Datos de conexión a la base de datos
$host = "localhost";       // Host del servidor MySQL (normalmente "localhost" para servidores locales)
$dbname = "inventario";    // Nombre de la base de datos a la que te quieres conectar
$username = "root";        // Usuario de la base de datos (por defecto "root" en XAMPP)
$password = "Arbey3173@";            // Contraseña de la base de datos (en XAMPP normalmente está vacía)

// Intentar la conexión usando PDO
try {
    // Crear una nueva instancia de PDO para conectarse a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configurar PDO para que lance excepciones en caso de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si ocurre un error, se muestra un mensaje y se detiene la ejecución
    die("Conexión fallida: " . $e->getMessage());
}
?>
