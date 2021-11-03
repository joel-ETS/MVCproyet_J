<?php declare (strict_types=1);

require_once "employee.php";
require_once "../factoryConnection.php"; 
require_once "pdoEmployeeRepository.php";

$number = intval($_POST["number"]);

$employee = new Employee($number != 0? $number: null, $_POST["firstName"], $_POST["officeCode"]);

$errores = $employee->validate(); 
if (count($errores) > 0) {
require "formOffice.php";
 die();

}

$config = require_once "config.php";
try {
$factory = new FactoryConnection($config);
$repository = new PDOEmployeeRepository($factory->get());

if (isset($employee->number)) { 
    $repository->update($employee);
} else{ 
$repository->insert($employee); 
}

header("location: listEmployee_controller.php"); 
} catch (PDOException $e) {

print "Error: ". $e->getMessage(). "<br/>";
 die();

} finally{ 

$repository = null;

}

?>