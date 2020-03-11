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
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
 
</head>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
<div class="topnav">
  <a href="index.php">Inicio</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Buscar</button>
    </form>
  </div>
</div>

<?php

     $nombre_cliente ="";
     $apellido_cliente  ="";
     $telefono_cliente  ="";
     $email     ="";
     $cliente_num_doc ="";
     $id_tipo_documento ="";    

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre_cliente']) || empty($_POST['apellido_cliente']) || empty($_POST['telefono_cliente']) || empty($_POST['correo_cliente']) || empty($_POST['id_tipo_documento'])|| empty($_POST['cliente_num_doc']) || empty($_POST['contraseña_cliente']))
	{
		$alert='<p class="msg_error">Todos los campos son obligatorios</p>';
	}
	else
	{
		include "conexion.php";

		$nombre_cliente = $_POST['nombre_cliente'];
		$apellido_cliente = $_POST['apellido_cliente'];
		$telefono_cliente= $_POST['telefono_cliente'];
		$email = $_POST['correo_cliente'];
        $id_tipo_documento = $_POST['id_tipo_documento'];
        $cliente_num_doc = $_POST ['cliente_num_doc'];
		$contraseña_cliente = ($_POST['contraseña_cliente']);
        $repcontraseña_cliente = ($_POST['contraseña_cliente']);

		$query = mysqli_query($conection, "SELECT * FROM cliente WHERE correo_cliente = '$email' ");
		$result = mysqli_fetch_array($query);

		if($result > 0)
		{
			$alert='<p class="msg_error">El correo ya esta registrado.</p>';
		}
		else
		{
			if($contraseña_cliente != $repcontraseña_cliente)
			{
				$alert='<p class="msg_error">Las contraseñas no coinciden.</p>';
			}
			else
			{
				$query_insert = mysqli_query($conection, "INSERT INTO cliente(nombre_cliente,apellido_cliente,id_tipo_documento,cliente_num_doc,telefono_cliente,correo_cliente,contraseña_cliente) VALUES ('$nombre_cliente','$apellido_cliente','$id_tipo_documento','$cliente_num_doc','$telefono_cliente','$email','$contraseña_cliente')");

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
		<div class= "fondo"> 
        <div class= "centrado"> 
        <div class= "box">
		
		<h1>Registro Cliente</h1>
		<hr>
		<div class = "alert"><?php echo isset($alert) ? $alert : ''; ?></div>

		<form action="" method="post">

			<label for="nombre_cliente">Nombre</label>
			<br>
			<input type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre completo" required value="<?php echo $nombre_cliente; ?>">
			<br>
			<label for="apellido_cliente">Apellido</label>
			<br>
			<input type="text" name="apellido_cliente" id="apellido_cliente" placeholder="Apellido completo" required value="<?php echo $apellido_cliente; ?>">
			<br>
			<label for="telefono_cliente">Telefono</label>
			<br>
			<input type="text" name="telefono_cliente" id="telefono_cliente" placeholder="Numero de contacto" required value="<?php echo $telefono_cliente; ?>">
			<br>
			<label for="correo_cliente">Correo electronico</label>
			<br>
			<input type="email" name="correo_cliente" id="correo_cliente" placeholder="Correo electronico" required value="<?php echo $email; ?>">
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
			<label for="cliente_num_doc">Numero de Documento</label>
			<br>
			<input type="text" name="cliente_num_doc" id="cliente_num_doc" placeholder="Numero de documento" required value="<?php echo $cliente_num_doc; ?>">
			<br>
			<label for="contraseña_cliente">Contraseña</label>
			<br>
            <input type="password" name="contraseña_cliente" id="contraseña_cliente" placeholder="Contraseña de acceso">
            <br>
            <label for="contraseña_cliente">Confirmar contraseña</label>
            <br>
			<input type="password" name="repcontraseña_cliente" id="repcontraseña_cliente" placeholder="Contraseña de acceso" required>
			<br>
			<input type="submit" value="Crear usuario" class="btn_save">

		</form>
</div>
</div>
</div>

</body>
</body>


</html>