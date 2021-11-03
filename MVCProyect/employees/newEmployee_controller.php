<?php declare(strict_types=1);

require_once "employee.php";
require_once "factoryConnection.php";
require_once "pdoOfficeRepository.php";

$config = require_once "config.php";

try {

$factory= new FactoryConnection($config);
$conn = $factory->get();

$employee = new Employee(null, "", ""); 

$repooffice = new PDOOfficeRepository($conn);
$offices = $repooffice->getAll();
 
require "formEmployee.php";
}catch (PDOException $e) {
print "¡Error!: " . $e->getMessage () . "<br/>";
die();
 } finally {
$repository = null;

}

?>