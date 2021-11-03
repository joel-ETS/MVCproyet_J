<?php declare (strict_types =1);

require_once "../factoryConnection.php php" ;
 require_once "pdoEmployee Repository.php";

$config = require_once "config.php";

try {

$factory =new FactoryConnection($config);
$repository = new PDOEmployeeRepository($factory->get());

$employees= $repository-> getAll();
 require "listEmployee_view.php";

} catch (PDOException $e) { 
    print "¡Error!: " .$e->getMessage() . '<br/>'; 
     die();

} finally {
$repository = null ;

}

?>