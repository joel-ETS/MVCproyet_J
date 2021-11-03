<?php 

require_once "office.php";
require_once "../factoryConnection.php";
require_once "pdoOfficeRepository.php";

$office =new Office($_POST["code"], $_POST["city"], $_POST["phone"], $_POST["addressLine1"], $_POST["addressLine2"], $_POST["state"], $_POST["country"], $_POST["postalCode"], $_POST["territory"]);

$errores = $office->validate();

if (count($errores)> 0){
    require "formOffice.php";
    die();
}

$config = require_once "../config.php";

try {
    $factory = new FactoryConnection($config);
    $repository = new PDOOfficeRepository($factory->get());
    $repository->update($office);

    header("location: listOffice_controller.php");
} catch (PDOException $e) {
    print "¡Error! " . $e->getMessage() . "<br/>";
    die();
} finally {
    $repository = null;
}
?>