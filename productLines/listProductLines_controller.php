<?php


    require_once "../factoryConnection.php";
    $config = require_once "../config.php";
    require_once "PDOProductLines_Repository.php";

    try {
        $factory = new FactoryConnection($config);
        $repository = new productLineRepository($factory->get());
        $productLines = $repository->getAll();
        require "listProductLines_view.php";
    } catch (PDOException $e) {
        die();
    }

?>