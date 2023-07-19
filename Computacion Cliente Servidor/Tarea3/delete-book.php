<?php
// Conexion bd
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificacion
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verifica si se recibió el ID del libro a eliminar
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    
    // Elimina el libro
    $sql = "DELETE FROM book WHERE id = $bookId";
    if ($conn->query($sql) === TRUE) {
        echo "Libro eliminado exitosamente";
        readfile('index.html');
    } else {
        echo "Error al eliminar el libro: " . $conn->error;
    }
}

$conn->close();
?>
