<?php

    $config = require_once "config.php";
    require_once "factoryConnection.php";
    require_once "pdoOfficeRepository.php";

   /* try {
        $mbd = new PDO("{$config->database->type}:host={$config->database->host};dbname={$config->database->dbname}",
        $config->database->user, $config->database->password);
    
        foreach ($mbd->query('SELECT * from offices') as $fila)
        {
            print_r($fila);
            echo "<br>";
        }
        
        $mbd = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }*/

    try {
        $factory = new FactoryConnection($config);
        $repository = new PDOOfficeRepository($factory->get());

       /* foreach ($repository->getAll() as $office){
            print_r($office);
            echo "<br>";
        }
        $repository = null; No es necesaria la consulta aquí, se hace abajo en el HTML*/

    } catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDO</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Code</th><th>Ciudad</th>
            </tr>

            <?php   foreach($repository->getAll() as $office): ?>

                <tr>
                    <td><?=$office['officeCode']?></td>
                    <td><?=$office['city']?></td>
                </tr>
            <?php endforeach;?>

        </table>
    </body>
</html>

<?php $repository = null;?>