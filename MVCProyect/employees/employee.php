<?php declare(strict_types=1);

class Employee{
    function __construct(public int | null $number,public String $firstName,public String $officeCode){

    }
    

    function validate(): Array{
        $errores =[];
        if (!isset($this->officeCode) || strlen($this->officeCode)< 1) {
            $errores['officeCode'] = "el empleado debe tener asignado una oficina";
        }


        if (!isset($this->firstName) || strlen($this->firstName)< 3) {
            $errores['firstName'] = "el empleado debe tener un nombre de al menos 3 letras";
        }


      return $errores;

    }
        
    
}

?>