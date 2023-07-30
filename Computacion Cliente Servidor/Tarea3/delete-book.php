<?php
require 'dbBook.php';
include_once 'config.php';
// Verifica si se recibió el ID del libro a eliminar
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $dbBook= new DbBook(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $result = $dbBook->deleteBook($bookId);
    
    if ($result===true) {
        echo "Libro eliminado exitosamente";
        readfile('index.html');
    } else {
        echo "Error al eliminar el libro: " . $conn->error;
    }
}
?>
