<?php
class DbBook {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn=null;

  public function __construct($servername,$username, $password,$dbname)
  {
    $this->servername=$servername;
    $this->username=$username;
    $this->password=$password;
    $this->dbname=$dbname;
  }

    public function addBook($titulo,$autor,$descripcion){
        $this->crearConexion();

        // Inserta los datos
        $sql = "INSERT INTO book (titulo, autor, descripcion) VALUES ('$titulo', '$autor', '$descripcion')";
        $result=$this->conn->query($sql) === TRUE;
        $this->conn->close();
        return $result;
    }

    public function getBooks(){

        $this->crearConexion();

        // Consulta de libros
        $sql = "SELECT id, titulo, autor, descripcion FROM book";
        $result = $this->conn->query($sql);
        $this->conn->close();

        return $result;
    }

    public function deleteBook($bookId){
        $this->crearConexion();
        
        // Elimina el libro
        $sql = "DELETE FROM book WHERE id = $bookId";
        $result = $this->conn->query($sql) === TRUE;
        $this->conn->close();

        return $result;
    }

    private function  crearConexion(){
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        if ($this->conn->connect_error) {
            die("Error de conexión: " .$this->conn->connect_error);
        }
    }    
}
?>