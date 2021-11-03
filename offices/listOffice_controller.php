<?php

$config = require_once "../config.php";
require_once "../factoryConnection.php";
require_once "pdoOfficeRepository.php";


try {
        $factory = new FactoryConnection($config);
        $repository = new PDOOfficeRepository($factory->get());
        $offices = $repository->getAll();
        require "listOffice_view.php";
    } catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    } finally {
        $repository = null;
    }

    ?>