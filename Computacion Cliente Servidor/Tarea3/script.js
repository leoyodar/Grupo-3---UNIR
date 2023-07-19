$(document).ready(function() {

    // Agrega libro
    $('#add-book-form').submit(function(event) {

        event.preventDefault();

        let titulo      = $('#titulo').val();
        let autor       = $('#autor').val();
        let descripcion = $('#descripcion').val();

        // Agrega el libro
        $.ajax({
            url: 'add-book.php',
            type: 'POST',
            data: {titulo: titulo, autor: autor, descripcion: descripcion},
            success: function(response) {
                $("#titulo").val(" ");
                $("#autor").val(" ");
                $("#descripcion").val(" ");

                refreshBookList();
            }
        });
    });

    // Click en <li> de libro
    $('#book-list').on('click', '.book-item', function() {
        $(this).toggleClass('book-highlight');
    });

    // Actualiza la lista de libros
    function refreshBookList() {
        $.ajax({
            url: 'get-books.php',
            type: 'GET',
            success: function(response) {
                // Renderiza los libros
                $('#book-list').html(response);
            }
        });
    }

    // First load
    refreshBookList();
});
