<?php
require_once "office.php";

    class PDOOfficeRepository {
        function __construct(private PDO $conn)
        {
        }

        function getAll(): array {
            $stm = $this->conn->query("SELECT * from offices");
            $stm->execute();
            return $stm->fetchAll();
        }

        function get(string $code): array | null {
           // $stm = $this->conn->query("SELECT * FROM offices where officeCode ='{$code}'");

           $stm = $this->conn->prepare("SELECT * FROM offices WHERE officeCode = :code");
           $stm->execute(array(':code' => $code));

           $result = $stm->fetch();
           
           if ($result) {
               return $result;
           } else {
               return null; //No existe una oficina con el código indicado
           }
           
        }   
        
        function getEx(string $code): Office | null {
            $stm = $this->conn->prepare("SELECT * FROM offices WHERE officeCode = :code");
           $stm->execute(array(':code' => $code));

           $result = $stm->fetch();
           
           if ($result) {
               return new Office($result['officeCode'], $result['city'], $result['phone'], $result['addressLine1'], $result['addressLine2'],
                $result['state'], $result['country'], $result['postalCode'], $result['territory']);
           } else {
               return null; //No existe una oficina con el código indicado
           }
        }

        function update (Office $oficina): void {
            $stm = $this->conn->prepare("UPDATE offices SET city=:city WHERE officeCode = :code");
            $stm->execute(array(':code' => $oficina->code, ":city" => $oficina->city));

        }
    }

?>