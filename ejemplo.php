<!DOCTYPE html>
<html>
 <title>Inicio</title>
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
<body>

<div class="topnav">
  <a href="nosotros.php">Nosotros</a>
  <a href="Registro_cliente.php">Registro</a>
  <a href="admi.php">Administrador</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Buscar</button>
    </form>
  </div>
</div>
</body>

<body>

<div class= "fondos"> 
    <div class="centrado"> 
    <img src="css/img/elite.png" style="width: 115%">
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    </div>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
   


        <div class="btn-group" style="width:100%">
  <a href="index.php"><button style="width:16.663%">Inicio</button></a>
  <a href="eventos.php"><button style="width:16.663%">Eventos</button></a>
  <a href="menu.php"><button style="width:16.663%">Menu</button></a>
  <a href="servicios.php"><button style="width:16.663%">Servicios</button></a>
  <a href="login.php"><button style="width:16.663%">Iniciar Sesion</button></a>
  <a href="contacto.php"><button style="width:16.663%">Contacto</button></a>

  </div>

</body>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

<body>
    <div class="centrado"> 
    <br></br>
 <br></br>
 <br></br>
 <br></br>
 <br></br>
 <br></br>
 <br></br>
 <br></br>
<h2 class="w3-center">Eventos recientes</h2>
        <div class="w3-content w3-display-container" align="center">
  <img class="mySlides w3-animate-right" class="mySlides" src="css/img/img_1239.jpg" style="width:75%">
  <img class="mySlides w3-animate-left" class="mySlides" src="css/img/img_2242.jpg" style="width:75%">
  <img class="mySlides w3-animate-right" class="mySlides" src="css/img/img_2474.jpg" style="width:75%">
  <img class="mySlides w3-animate-left" class="mySlides" src="css/img/img_2232.jpg" style="width:75%">
    
        </div>
    </div>
</div>

<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>

<footer class="footer-distributed">
 
			<div class="footer-left">
          <img src="css/img/elite.png" style="width: 18%">
				<h3>Euro<span>Bodas</span></h3>
 
				<p class="footer-links">
					<a href="index.php">Inicio</a>
					|
					<a href="Nosotros.php">Sobre Nosotros</a>
					|
					<a href="#">About</a>
					|
					<a href="#">Contacto</a>
				</p>
 
				<p class="footer-company-name">© 2019 EuroBodas Derechos reservados </p>
			</div>
 
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <p><span>a 22b-71,, Cra. 44a #22b1</span>
						Colombia, Bogota - 110111</p>
				</div>
 
				<div>
					<i class="fa fa-phone"></i>
					<p>+57 321 477 1511</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:comercial01.bodaselite@gmail.com">comercial01.bodaselite@gmail.com</a></p>


				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Mas de nosotros</span>
					Ofrecemos todo tipo de eventos, sociales, empresariales, y todo lo referente a cada uno.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
				<fo	<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
        </footer>
        </body>

</html>
