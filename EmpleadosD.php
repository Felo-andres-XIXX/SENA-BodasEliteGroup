<?php

include 'conexion.php';

$empleadosdisponibles = mysqli_query($conection,"SELECT id_empleado,concat(nombre_empleado,' ',apellido-empleado) as nombres,Telefono_empleado,id_cargo 
FROM emp INNER JOIN cargo ON cargo.idcargo = emp.idcargo
WHERE estado like 'Disponible';");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>
</head>
<body>

<?php
    if(!empty($empleadosdisponibles)){?>
        <table>
    <thead>
        <tr>
            <th style="width: 40%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Nombres</th>
            <th style="width: 25%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Teléfono</th>
            <th style="width: 35%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Cargo</th>
        </tr>
    </thead>
    <?php
    $registros=mysqli_num_rows($empleadosdisponibles);
            if ($registros > 0) {
                while($arreglo =mysqli_fetch_array($empleadosdisponibles)){
            
            ?>
                <tbody>
                    <tr>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["Nombres"] ?></th>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["TelefonoEmpleado"] ?></th>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["NombreCargo"]?></th>
                    </tr>
                </tbody>
                <?php
            }
        }
    }
    else{

        echo "<script type=\"text/javascript\">alert('No hay personal disponible. Comuniquese con nosotros.');</script>"; 

    }
    ?>
    </table>

</body>
</html>