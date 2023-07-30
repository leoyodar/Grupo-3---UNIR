<?php
require 'dbBook.php';
include_once 'config.php';

$dbBook= new DbBook(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$result = $dbBook->getBooks();

if ($result && $result->num_rows > 0) {
    // Renderiza una lista de libros
    while ($row = $result->fetch_assoc()) {
        echo "<li class='book-item'>Título: " . $row['titulo'] . ", Autor: " . $row['autor'] . ", Descripcion: " . $row['descripcion'] . "<a class='button borrar' href='delete-book.php?id=" . $row['id'] ."'>Borrar</a></li>";
    }
} else {
    echo "No se encontraron libros";
}
?>