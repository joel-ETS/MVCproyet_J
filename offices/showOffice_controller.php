<?php

    require_once "../factoryConnection.php";
    require_once "pdoOfficeRepository.php";
    $config = require_once "../config.php";

    try {
        $factory = new FactoryConnection($config);
        $repository = new PDOOfficeRepository($factory->get());
        $office = $repository->get($_GET['code']);

        if ($office == null)
        {
            print "Error, no existe una oficina con el código ' {$_GET['code']}";
            die();
        }

        require "showOffice_view.php";
       
    } catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    } finally {
        $repository = null;
    }
?>