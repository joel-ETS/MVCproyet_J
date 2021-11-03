<?php

    require_once "office.php";
    require_once "../factoryConnection.php";
    require_once "pdoOfficeRepository.php";
    $config = require_once "../config.php";

    try {
        $factory = new FactoryConnection($config);
        $repository = new PDOOfficeRepository($factory->get());
        $office = $repository->getEx($_GET['code']);
        require "formOffice.php";
       
    } catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    } finally {
        $repository = null;
    }
?>