<IDOCTYPE html>

<html lang="es">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content= "width-device-width, initial-scale-1.0">
<title>Document</title>
</head>

<body>
     <?php if (isset($errores) && count ($errores) > 0): ?>
<p>Existen errores: </p>
 <?php foreach ($errores as $error): ?>
<li><?=$error?></li>
<?php endforeach; ?>
<?php endif; ?>

<form action="saveEmployee_controller.php" method= "post">
<input type="hidden" name="number" value="<?=$employee->number?>">

<p>

<label for="number">número: <?=$employee->number?></label>
</p>
<p><label for ="firstName">nombre</label>
<input type="text" name="firstName" id="firstName" value="<?=$employee->firstName?>">
</p>
 <p>

<label for="officeCode">oficina</label> <select name="officeCode">
<?php foreach($offices as $office): ?>
<option value="<?=$office['officeCode']?>"
<?=$employee->officeCode==$office['officeCode']? 'selected': ''?>>
<?=$office["officeCode"].'.'.$office["city"]?>
</option> <?php endforeach; ?>
</select>
</p>
 <input type="submit" value="guardar">

</form>

</body>

</html>