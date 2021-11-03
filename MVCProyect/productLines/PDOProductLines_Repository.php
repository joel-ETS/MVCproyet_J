<?php


class productLineRepository {
    function __construct(public PDO $conn)
    {
        
    }
    
    function getAll(): array {
      $consulta =  $this->conn->query("SELECT * FROM productlines");
      $consulta = $consulta->fetch();
      return $consulta;
    }
}

?>