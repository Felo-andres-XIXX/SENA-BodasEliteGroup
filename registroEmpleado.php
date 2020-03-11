<!DOCTYPE html>
<html>
 <title>Registro Cliente</title>
 <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
 
	<title>Responsive Footer</title>
 
    <link rel="stylesheet" href="css/estilo.css">

    <link rel="stylesheet" href="css/registroEmpleado.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
 
</head>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
<div class="topnav">
  <a href="admi.php">Inicio</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Buscar</button>
    </form>
  </div>
</div>

<?php

     $nombre_Empleado ="";
     $apellido_Empleado  ="";
     $cargo_Emplado = "";
     $telefono_Empleado  ="";
     $email     ="";
     $id_documento_empleado="";
     $id_tipo_documento ="";    

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre_empleado']) || empty($_POST['apellido_empleado']) || empty($_POST['telefono_empleado']) || empty($_POST['correo_empleado']) || empty($_POST['id_tipo_documento'])|| empty($_POST['id_documento_empleado']) || empty($_POST['id_cargo'])|| empty($_POST['contraseña_empleado']))
	{
		$alert='<p class="msg_error">Todos los campos son obligatorios</p>';
	}
	else
	{
		include "conexion.php";

		$nombre_Empleado  = $_POST['nombre_empleado'];
        $apellido_Empleado = $_POST['apellido_empleado'];
        $cargo_Emplado= $_POST['id_cargo'];
        $telefono_empleado= $_POST['telefono_empleado'];
		$email = $_POST['correo_empleado'];
        $id_tipo_documento = $_POST['id_tipo_documento'];
        $id_documento_empleado = $_POST ['id_documento_empleado'];
		$contraseña_empleado = ($_POST['contraseña_empleado']);
        $repcontraseña_empleado = ($_POST['contraseña_empleado']);

		$query = mysqli_query($conection, "SELECT * FROM empleado WHERE correo_empleado = '$email' ");
		$result = mysqli_fetch_array($query);

		if($result > 0)
		{
			$alert='<p class="msg_error">El correo ya esta registrado.</p>';
		}
		else
		{
			if($contraseña_empleado != $repcontraseña_empleado)
			{
				$alert='<p class="msg_error">Las contraseñas no coinciden.</p>';
			}
			else
			{
                $query_insert = mysqli_query($conection,
                 "INSERT INTO empleado(nombre_empleado,apellido_empleado,telefono_empleado,correo_empleado,id_documento_empleado,id_tipo_documento,id_cargo,contraseña_empleado)
                VALUES ('$nombre_Empleado ',' $apellido_Empleado ','$telefono_empleado','$email','$id_documento_empleado','$id_tipo_documento','$cargo_Emplado','$contraseña_empleado')");

				if($query_insert){
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}
				else
				{
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}
			}
			
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
          
          
	<section id="container">
    <div class="logo">   
		<div class= "fondoE"> 
        <div class= "centrado"> 
        <br></br>
        <div class= "box1">
         
	
		<h1>Registro Empleado</h1>
		<hr>
		<div class = "alert"><?php echo isset($alert) ? $alert : ''; ?></div>

		<form action="" method="post">

			<label for="nombre_empleado">Nombre</label>
			<br>
			<input type="text" name="nombre_empleado" id="nombre_empleado" placeholder="Nombre completo" required value="<?php echo $nombre_Empleado; ?>">
			<br>
			<label for="apellido_empleado">Apellido</label>
			<br>
			<input type="text" name="apellido_empleado" id="apellido_empleado" placeholder="Apellido completo" required value="<?php echo $apellido_Empleado; ?>">
            <br>
			<label for="telefono_empleado">Telefono</label>
			<br>
			<input type="text" name="telefono_empleado" id="telefono_empleado" placeholder="Numero de contacto" required value="<?php echo $telefono_Empleado; ?>">
			<br>
			<label for="correo_empleado">Correo electronico</label>
			<br>
			<input type="email" name="correo_empleado" id="correo_empleado" placeholder="Correo electronico" required value="<?php echo $email; ?>">
			<br>
			<label for="id_tipo_documento">Tipo de documento</label>
			<br>
			<select name=id_tipo_documento id="id_tipo_documento">
				<option value="1">Cedula de Ciudadania</option>
				<option value="2">Cedula de Extranjeria</option>
				<option value="3">Pasaporte</option>
				<option value="4">Registro civil</option>
				<option value="5">Tarjeta de identidad</option>

			</select>
			<br>
			<label for="id_cargo">Cargo</label>
			<br>
			<select name=id_cargo id="id_cargo">
			
				<option value="1">Adminstrador</option>
				<option value="2">Gerente General</option>
				<option value="3">Gerente de Produccion</option>
				<option value="4">Planeadora</option>
				<option value="5">Cocinera</option>
				<option value="6">Mesero</option>
				<option value="7">Servicios Generales</option>
			</select>
			<br>
			<label for="id_documento_empleado">Numero de Documento</label>
			<br>
			<input type="text" name="id_documento_empleado" id="id_documento_empleado" placeholder="Numero de documento" required value="<?php echo  $id_documento_empleado; ?>">
			<br>
			<label for="contraseña_empleado">Contraseña</label>
			<br>
            <input type="password" name="contraseña_empleado" id="contraseña_empleado" placeholder="Contraseña de acceso">
            <br>
            <label for="contraseña_cliente">Confirmar contraseña</label>
            <br>
			<input type="password" name="repcontraseña_empleado" id="repcontraseña_empleado" placeholder="Contraseña de acceso" required>
			<br>
			<input type="submit" value="Crear usuario" class="btn_save">

		</form>
</div>
</div>
</div>
</div>

</body>
</body>


</html>