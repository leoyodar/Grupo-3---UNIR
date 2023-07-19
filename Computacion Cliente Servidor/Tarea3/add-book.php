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

// Verifica si se recibieron los datos del formulario
if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['descripcion'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $descripcion = $_POST['descripcion'];

    // Inserta los datos
    $sql = "INSERT INTO book (titulo, autor, descripcion) VALUES ('$titulo', '$autor', '$descripcion')";
    if ($conn->query($sql) === TRUE) {
        echo "Libro agregado exitosamente";
    } else {
        echo "Error al agregar el libro: " . $conn->error;
    }
}

$conn->close();
?>
