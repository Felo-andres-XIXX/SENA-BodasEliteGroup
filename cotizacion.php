<!DOCTYPE html>
<html>
    <title>Eventos</title>

    <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="keywords" content="footer, address, phone, icons" />
	    <title>Responsive Footer</title>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/cotizacion.css">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <div class="topnav">
            <a href="nosotros.php">Nosotros</a>
            <a href="Registro.php">Registro</a>
            <div class="search-container">
                <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Buscar</button>
                </form>
            </div>
        </div>
        
        <div align="center">
            <img src="css/img/elite.png" style="width: 20%">
        </div>

        <div class="btn-group" style="width:100%">
            <a href="index.php"><button style="width:16.663%">Inicio</button></a>
            <a href="eventos.php"><button style="width:16.663%">Eventos</button></a>
            <a href="menu.php"><button style="width:16.663%">Menu</button></a>
            <a href="servicios.php"><button style="width:16.663%">Servicios</button>
            <a href="login.php"><button style="width:16.663%">Iniciar Sesion</button></a>
            <a href="contacto.php"><button style="width:16.663%">Contacto</button></a>
        </div>

        <div class="Title_cotizacion">
            <h1 align="center">Cotización personalizada</h1>
        </div>
        <?php
        require_once("conexion.php");
        
        $query="select * from tipoDocumento";

        $p=mysqli_query($conection,$query);

        $res=mysqli_fetch_array($p);
    
        ?>
        <div class="Tabla1">
            <table>
                <tr>
                <th>Numero tipo de documento</th>
                <th>Descripcion tipo documento</th>
                <tr>
                
                <?php
                    while($res=mysqli_fetch_array($p))
                    {
                        echo "<tr>";
                        echo "<td>".$res["id_tipo_documento"]."</td>";
                        echo "<td>".$res["descripcion_tipo_documento"]."</td>";
                        echo "</tr> ";
                    }
                ?>
            </table>
            
        </div>
    </body>
</html>