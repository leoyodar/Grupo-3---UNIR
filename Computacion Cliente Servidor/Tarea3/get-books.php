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

// Consulta de libros
$sql = "SELECT * FROM book";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Renderiza una lista de libros
    while ($row = $result->fetch_assoc()) {
        echo "<li class='book-item'>Título: " . $row['titulo'] . ", Autor: " . $row['autor'] . ", Descripcion: " . $row['descripcion'] . "<a class='button borrar' href='delete-book.php?id=" . $row['id'] ."'>Borrar</a></li>";
    }
} else {
    echo "No se encontraron libros";
}

$conn->close();
?>