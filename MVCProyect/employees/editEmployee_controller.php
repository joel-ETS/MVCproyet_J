<?php declare(strict_types=1);

require_once "employee.php";
require_once "factoryConnection.php"; 
require_once "pdoEmployeeRepository.php";
require_once "pdoofficeRepository.php";

$config = require_once "config.php";

try {
$factory=new FactoryConnection($config); 
$conn= $factory->get();

$repoEmployee = new PDOEmployeeRepository($conn);
$employee - $repoEmployee->get(intval($_GET["number"]));

$repooffice = new PDOOfficeRepository($conn);
 $offices = $repoOffice->getAll();


require "formEmployee.php";
}catch (PDOException $e) { 
    print "¡Error!: " . $e->getMessage(). "<br/>";
die(); 
 } finally{
    $repository = null;
 }
 

 
?>