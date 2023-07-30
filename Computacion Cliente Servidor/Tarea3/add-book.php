<?php
require 'dbBook.php';
include_once 'config.php';

// Verifica si se recibieron los datos del formulario
if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['descripcion'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $descripcion = $_POST['descripcion'];

    $dbBook= new DbBook(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $result = $dbBook->addBook($titulo,$autor,$descripcion);
    
    if ($result === TRUE) {
        echo "Libro agregado exitosamente";
    } else {
        echo "Error al agregar el libro: " . $this->conn->error;
    }
}
?>
