<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table>
   <tr>
       <th>number</th>
       <th>firstName</th>
       <th>officeCode</th>
   </tr> 
   <?php foreach($employees as $employee): ?>
    <tr>
        <td>
            <a href="editEmployee_controller.php?number=<?=$employee['employeeNumber']?>">
              <?=$employee['employeeNumber']?></a>
        </td>
        <td><?=$employee['firstName']?></td>
        <td><?=$employee['officeCode']?> - <?=$employee['officeCity']?> </td>
    </tr>
     <?php endforeach;?>
     
   </table> 


   <form action="newEmployee_controller.php">
       <input type="submit" value="nuevo">
   </form>
</body>

</html>