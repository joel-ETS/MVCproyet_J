<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Office</title>
    </head>
    <body>
        <?php if (isset($errores) && ($errores) > 0): ?>
      <p>Existen errores: </p>
      <?php foreach ($errores as $error): ?>
        <li><?=$error?></li>
        <?php endforeach; ?>
        <?php endif;?>

        <form action="saveOffice_controller.php" method="post">
            <input type="hidden" name="code" value="<?=$office->code?>">
            <p>
                <label for="city"> Ciudad</label>
                <input type="text" name="city" id="city" value="<?=$office->city?>">
            </p>
            <p>
                <label for="phone"> Teléfono</label>
                <input type="text" name="phone" id="phone" value="<?=$office->phone?>">
            </p>
            <p>
                <label for="city"> Dirección 1</label>
                <input type="text" name="addressLine1" id="addressLine1" value="<?=$office->address1?>">
            </p>
            <p>
                <label for="city"> Direccion 2</label>
                <input type="text" name="addressLine2" id="addressLine2" value="<?=$office->address2?>">
            </p>
            <p>
                <label for="city"> Estado</label>
                <input type="text" name="state" id="state" value="<?=$office->state?>">
            </p>
            <p>
                <label for="city"> País</label>
                <input type="text" name="country" id="country" value="<?=$office->country?>">
            </p>
            <p>
                <label for="city"> Código Postal</label>
                <input type="text" name="postalCode" id="postalCode" value="<?=$office->postalCode?>">
            </p>
            <p>
                <label for="city"> Territorio</label>
                <input type="text" name="territory" id="territory" value="<?=$office->territory?>">
            </p>
            <input type="submit" value="guardar">
        </form>

    </body>
</html>