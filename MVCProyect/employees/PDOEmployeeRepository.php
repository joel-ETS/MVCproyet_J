<?php declare(strict_types=1);
require_once "employee.php";

class PDOEmployeeRepository{
    function __construct(private PDO $conn){
    }

    function getAll(): array{
        $stm = $this->conn->query("select employee.*, officies.city as officeCity
                                    from employees left join officies
                                    order by employeeNumber ");

        $stm->execute();
        return $stm->fetchAll();
    }

     function get(int $number): Employee | null{
         $stm = $this->conn->prepare("select * from employees where employeeNumber = :number");
         $stm->execute(array(':number' =>$number));


         $result = $stm->fetch();
         if ($result) {
             return new Employee(intval ($result['employeeNumber']), $result['firstName'], $result['officeCode']);
         } else {
             return null;
         }
     }

    function update(Employee $employee): void{
        $stm = $this->conn->prepare('update employees
                            set firstName=:firstName, officeCode=:officeCode
                            where employeeNumber=:number');


        $stm->execute(array(':number' => $employee->number,
                            ':firstName' =>$employee->fistName,
                            'officeCode' =>$employee->officeCode));


    }

    private function getNextNumber(): int{
        $stm = $this->conn->query("select max(employeeNumber) as maxNumber
         from employee;");

         $stm->execute();
         return intval($stm->fetch()['maxNumber']) +1;
    }

    
    function insert(Employee $employee): void{
        $stm = $this->con->prepare("insert into employees (employeeNumber,fistName, officeCode)
                            values (:number, :fistName, :officeCode)");

                            $stm-> execute(array(':number'

                            => $this->getNextNumber(),
                            
                            ': firstName'
                            
                            => $employee->firstName,
                            
                            ':officeCode'
                            
                            => $employee->officeCode));
                            
    }

}



?>