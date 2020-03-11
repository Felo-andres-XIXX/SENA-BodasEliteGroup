/*Inicio de la creacion de la base de datos*/
create database BodasEliteGroup;
-- drop database BodasEliteGroup;
/*Asignacion del uso de la base de datos*/
use BodasEliteGroup;

/*Inicio de la creacion de las tablas que no utilizan llaves foraneas*/
create table TipoDocumento
(
	id_tipo_documento integer not null auto_increment,
    descripcion_tipo_documento varchar (50) not null,
    
    primary key(id_tipo_documento)
);


create table Lugar 
(
	id_lugar integer not null auto_increment,
    nombre_lugar varchar (45) not null,
    capacidad_lugar integer not null,
    direccion_lugar varchar (60) not null,
    precio_lugar float not null,
    
    primary key(id_lugar)
);

create table SonidoIluminacion
(
	id_sonido_iluminacion integer not null auto_increment,
    tipo_sonido_iluminacion varchar (70) not null,
    precio_sonido_iluminacion float not null,
    
    primary key(id_sonido_iluminacion)
);


create table TipoComida
( 
	id_tipo_comida integer not null auto_increment,
    nombre_tipo_comida varchar (45) not null,
    
    primary key (id_tipo_comida)
);


create table Coctel
(
	id_coctel integer not null auto_increment,
    nombre_coctel varchar(45) not null,
    descripcion_coctel text not null,
    precio_coctel float not null,
    
    primary key(id_coctel)
);


create table Cargo
(
	id_cargo integer not null auto_increment,
    nombre_cargo varchar(45) not null,
    
    primary key(id_cargo)
);


create table Mesa
(
	id_mesa integer not null auto_increment,
    nombre_mesa varchar(45) not null,
    descripcion_mesa text not null,
    precio_mesa float not null,
    
    primary key(id_mesa)
);


create table Decoracion
(
	id_decoracion integer not null auto_increment,
    nombre_decoracion varchar(45) not null,
    descripcion_decoracion text not null,
    precio_decoracion float not null,
    
    primary key(id_decoracion)
);


create table Producto
(
	id_producto integer not null auto_increment,
    nombre_producto varchar(45) not null,
    precio_producto float not null,
    
    primary key(id_producto)
);


create table TipoEvento
(
	id_tipo_evento integer not null auto_increment,
    nombre_tipo_evento varchar(45) not null,
    
    primary key(id_tipo_evento)
);
/*Fin de la creacion de las tablas que no utilizan llaves foraneas*/


/*Inicio de la creacion de las tablas que usan llaves forneas*/
create table Cliente
(
	id_cliente integer not null auto_increment,
    cliente_num_doc float not null,
    nombre_cliente varchar(45) not null,
    apellido_cliente varchar(45) not null,
    telefono_cliente float not null,
    correo_cliente varchar(70) not null,
    id_tipo_documento integer not null,
    contraseña_cliente varchar(30) not null,
    
    primary key(id_cliente),
    foreign key(id_tipo_documento) references TipoDocumento(id_tipo_documento)
);


create table Comida	
(
	id_comida integer not null auto_increment,
    nombre_comida varchar (45) not null,
    descripcion_comida text not null,
    valor_plato float not null,
    id_tipo_comida integer not null,
    
    primary key (id_comida),
    foreign key(id_tipo_comida) references TipoComida(id_tipo_comida)
);


create table Empleado
(
	id_empleado integer not null auto_increment,
    nombre_empleado varchar(45) not null,
    apellido_empleado varchar(45) not null,
    telefono_empleado float not null,
    correo_empleado varchar(70) not null,
    id_documento_empleado integer(15) not null,
    id_tipo_documento integer not null,
    id_cargo integer not null,
    contraseña_empleado varchar(30) not null,
    
    primary key(id_empleado),
    foreign key(id_tipo_documento) references TipoDocumento(id_tipo_documento),
    foreign key(id_cargo) references Cargo(id_cargo)
);


create table Proveedor
(
	id_proveedor integer not null auto_increment,
    nombre_proveedor varchar(45) not null,
	apellido_proveedor varchar(45) not null,
    telefono_proveedor float not null,
    correo_proveedor varchar(70) not null,
    direccion_proveedor varchar(60) not null,
    id_tipo_documento integer not null,
    
    primary key(id_proveedor),
    foreign key(id_tipo_documento) references TipoDocumento(id_tipo_documento)
);


create table Cotizacion
(
	id_cotizacion integer not null auto_increment,
    fecha_cotizacion date not null,
    id_cliente integer not null,
    odservacion_cotizacion text not null,
    tematica_evento varchar(70) not null,
    id_tipo_evento integer not null,
    id_lugar integer not null,
    id_mesa integer not null,
    precio_cotizacion float not null,
    confirmacion_evento tinyint not null,
    
    primary key(id_cotizacion),
    foreign key(id_cliente) references Cliente(id_cliente),
    foreign key(id_tipo_evento) references TipoEvento(id_tipo_evento),
    foreign key(id_lugar) references Lugar(id_lugar),
    foreign key(id_mesa) references Mesa(id_mesa)
);


create table DetalleEmpleado
(	
	id_detalle_empleado integer not null auto_increment,
	id_Cotizacion integer not null,
    id_empleado integer not null,
    cantidad_empleados integer (10) not null,
    
    primary key(id_detalle_empleado),
    foreign key(id_empleado) references Empleado(id_empleado),
    foreign key (id_cotizacion) references Cotizacion(id_cotizacion)
);


create table DetalleComida
(
	id_detalle_comida integer not null auto_increment,
    id_cotizacion integer not null,
    id_comida integer not null,
    cantidad_comida integer(10) not null,
    valor_plato float not null,
    
    primary key(id_detalle_comida),
    foreign key (id_cotizacion) references Cotizacion(id_cotizacion),
    foreign key(id_comida) references Comida(id_comida)
);


create table DetalleCoctel
(	
	id_detalle_coctel integer not null auto_increment,
    id_coctel integer not null,
    id_cotizacion integer not null,
    cantidad_coctel integer(10) not null,
    precio_coctel float not null,
    
    primary key(id_detalle_coctel),
    foreign key(id_coctel) references Coctel(id_coctel),
    foreign key(id_cotizacion) references Cotizacion(id_cotizacion)
);


create table DetalleDecoracion
(
	id_detalle_decoracion integer not null auto_increment,
    id_decoracion integer not null,
    id_cotizacion integer not null,
    cantidad_decoracion integer(10) not null,
    precio_decoracion float not null,
    
    primary key(id_detalle_decoracion),
    foreign key(id_decoracion) references Decoracion(id_decoracion),
    foreign key(id_cotizacion) references Cotizacion(id_cotizacion)
);


create table DetalleProducto
(
	id_detalle_producto integer not null auto_increment,
    id_producto integer not null,
    id_proveedor integer not null,
    cantidad_producto integer(10) not null,
    tipo_producto varchar(45) not null,
    
    primary key(id_detalle_producto),
    foreign key(id_producto) references Producto(id_producto),
    foreign key(id_proveedor) references Proveedor(id_proveedor)
);
/*Fin de la creacion de las tablas que usan llaves forneas*/


/*Inicio de los describe de todas las tablas*/
describe TipoDocumento;
describe Lugar;
describe SonidoIluminacion;
describe TipoComida;
describe Coctel;
describe Cargo;
describe Mesa;
describe Decoracion;
describe Producto;
describe TipoEvento;
describe Cliente;
describe Comida;
describe Empleado;
describe Proveedor;
describe DetalleEmpleado;
describe Cotizacion;
describe DetalleComida;
describe DetalleCoctel;
describe DetalleDecoracion;
describe DetalleProducto;
/*Inicio de los describe de todas las tablas*/


/*Inicio de los insert de las tablas*/
insert into TipoDocumento(descripcion_tipo_documento)
values 	("Cedula de ciudadania"),
		("Cedula de extranjeria"),
        ("Pasaporte"),
        ("Registro civil"),
        ("Tarjeta de identidad");
        
        
insert into Lugar(nombre_lugar,capacidad_lugar,direccion_lugar,precio_lugar)
values
("Terraza piso 14","90","Black tower","1200000"),
("Terraza piso 12","100","Macao","1200000"),
("Macao pisos 9 y 10","140","Macao","800000"),
("Salon piso 8","40","Macao","600000"),
("Salones 6 y 13","60","Black tower","800000"),
("Hacienda la cumbre","100","Lejos","1200000"),
("Hacienda el refugio","250","Chia/cajica","2000000");

insert into SonidoIluminacion(tipo_sonido_iluminacion,precio_sonido_iluminacion)
values
("Estandar","650000"),
("Grande","950000"),
("Array","1600000"),
("Ventury","250000");


insert into TipoComida(nombre_tipo_comida)
values
("Entrada"),
("Plato Fuerte"),
("Postre"),
("Ponque");


insert into Coctel(nombre_coctel,descripcion_coctel,precio_coctel)
values
("Tequila Sunrise","Coctel a base de tequila con jugo de naranja, granadina y zumo de limon, adornado con rodaja de naranja y cereza","4500"),
("Mojito","Coctel a base de ron blanco y triple sec mezclado con soda y macerado de limon y melao, adornado con rodaja de limon y cereza","4500"),
("kamikaze ","Coctel a base de vodka y triplesec mezclado con ginger y vegetal verde o azul, adornado con rodaja de limon con cereza","4500");

insert into Cargo(nombre_cargo)
values	
("administrador"),
("Gerente General"),
("Gerente de Produccion"),
("Planeadora"),
("Cocinero"),
("Mesero"),
("Servicios Generales"),
("Decoradores"),
("Bartender"),
("Dj"),
("Florista");


insert into Mesa(nombre_mesa,descripcion_mesa,precio_mesa)
values
("Cocteleras","Alta vestida con centro de mesa y 2 sillas.","70.000"),
("Rodondas","Vestida con mantel de tafetan, con servilletas, y 10 sillas tiffanny o phoenix.","130.000"),
("Cuadradas","Vestida con mantel de tafetan, conservilletas, y 10 sillas tiffanny o phoenix.","130.000"),
("Cristal","Mesa de vidrio con forro blanco e iluminacion azul, servilleta y 10 sillas tiffany o phoenix.","180.000"),
("Espejo","Tipo luis XV tapa en espejo con servilleta y 10 sillas tiffany o phoenix.","180.000"),
("Mesa de ponque","Mesa con mantel y camino de rosetones letras love minis, copas de los novios,
aplique del ponque con las iniciales de los novios, y letras doradas para siempre.","80000");


insert into Decoracion(nombre_decoracion,descripcion_decoracion,precio_decoracion)
values
("Pista Led"," modulo de 1mt*1mt","150000"),
("Pantalla Led","de 3mts*4 mts","1780000"),
("Hora loca"," show de 1 hora con antifaces, pitos, corbatas, corbatines y collares neon","200000"),
("Fotografia y Video","  fotografi  as del evento y video editado","500000"),
("Bouquet","según diseño de la novia ","90000"),
("Azahares"," para el novio, padres y padrino","30000"),
("Invitaciones"," Se pueden escoger de 3 tipos de ","5000"),
("Divan"," Se puede escoger de 2 modelo uno de $40000 y otro de $90000","40000"),
("Bicicleta, jaulas, Henos, accesorios"," ","50000"),
("letras Love","Letras gigantes LOVE iluminadas de 90cms de altas","70000"),
("Letras Tipo Espejo","letras tipo espejo de 45 cms de alta precio por unidad","10000"),
("Backing fptografico","Backing fotografico con velo y decorado con flores","80000"),
("Cartas Menu","Cartas con la informacion de la entrada, plato fuerte, postre y bebidas","1100"),
("lluvia de Sobres"," a escoger entre dorado y madera cruda","20000");


insert into Producto(nombre_producto,precio_producto)
values
("Dulces","100"),
("Postres","3500"),
("Flores","2000"),
("Bombas","200"),
("Carnes","6500"),
("Sillas","2000"),
("Mesas","3000");


insert into TipoEvento(nombre_tipo_evento)
values
("Boda"),
("15 Años"),
("Empresarial"),
("Grados"),
("Fiestas Tematicas");
-- fin de los insert de sin llaves foraneas

insert into Cliente(cliente_num_doc,nombre_cliente,apellido_cliente,telefono_cliente,correo_cliente,id_tipo_documento,contraseña_cliente)
values	
(115232188,"Camilo","Ordoñez","3241045781","caordoñez34@gmail.com",1,"12345"),
(123218452,"Johana","Baron","3151745389","Baron.Johana.76@gmail.com",1,"12345"),
(131854665,"Felipe","Cardenas","3122812490","CarFelipe.67@gmail.com",4,"12345"),
(132546654,"Laura","Martinez","3224291320","lauMartinez198@gmail.com",1,"12345"),
(145648978,"Cristian","Velasquez","2123244152","Vela10.Cristian@gmail.com",3,"12345"),
(154386453,"Andres","Fuentes","314313519","Andres.Fuentes.2010@gmail.com",2,"12345"),
(165454632,"Jorgue","wilches","3057055612","JorgueWilchesEEUU@ooutlook.com",4,"12345"),
(189784564,"Carla","Esposito","3410606212","EspositoMamasita90@outlook.com",3,"12345");


insert into Comida(nombre_comida,descripcion_comida,valor_plato,id_tipo_comida)
values
("Ceviche de Camarones","Ceviche elaborado con camarones frescos, enteros, pelados, y preparados con cebolla morada y jitomate picado, 
cubos pequeños de pepino, jugo de limón, chile serrano picado o salsa verde, y en ocasiones se le agregan gotas de salsa de soya","8000",1),
("Canastas de platano","las canastas de plátano verde se pueden rellenar de tus preparaciones o ingredientes favoritos como guacamole,
 carne molida, frijoles o queso rallado","8000",1),
("Ceviche peruano","Se prepara con pescado fresco, limones, cebollas, ajíes picantes, y cilantro fresco","8000",1),
("Carne de Cerdo","una proteina de cerdo, condiferentes salsas,arroz o pure depapa y ensalada","45000",2),
("Carne de Res","una proteina de Res, condiferentes salsas,arroz o pure depapa y ensalada","45000",2),
("Carnes de pallo","una proteina de pollo, condiferentes salsas,arroz o pure depapa y ensalada","45000",2),
("tradicional de novia","Torta varios pisos o capas, decorada con abundante glaseado 
de dulce de caramelo, y coronada por una pequeña figura que representa la pareja","3000",4),
("Tres Leches","Consiste en un bizcocho bañado con tres tipos de leche: leche evaporada, crema de leche y leche condensada","3000",4),
("Chocolate","Pastel de Sabor chocolate Cubierto con una crema glacidad de coholate","3000",4),
("Milkyway","Deliciosa torta de chocolate con relleno de arequipe con nueces y una capa de solo arequipe; 
bañado de chocolate con maní","3000",4),
("semillas de amapola","La semillas de amapola son unas bolitas chiquititas bastante duras (como si fueran nueces chiquititas). 
Para disfrutar de todo su sabor hay que abrirlas","3000",3),
("tarta de santiago","Está elaborada con almendras pulverizadas y azúcar mezcladas con huevo.
 Se obtiene así una masa compacta a la que se le añade cierta cantidad de mantequilla o manteca","5000",3),
("Cuajada con melao","Es un tipo de queso insípido de leche de vaca, en porciones bañadas con un líquido acaramelado hecho con panela derretida en agua","5000",3),
("Chesskake","es un postre clásico de la cocina americana. Popular en todo el mundo, su principal ingrediente es el queso crema. Su fondo es crujiente
 y se obtiene al moler o triturar galletas y mezclarlas con mantequilla y azúca","5000",3);


insert into Empleado(nombre_empleado,apellido_empleado,telefono_empleado,correo_empleado,id_documento_empleado,id_tipo_documento,id_cargo,contraseña_empleado)
values
("Fernando","Villarreal","3101190943","fvillareal.bodaselite@gmail.com","1000723874",1,1,"12345"),
("Yuri","Romero","321541010","fer-svr.17@outlook.com","1000735481",1,2,"12345"),
("Camila","Cabello","3104871590","Ca-Cabello32@gmail.com","1000513759",1,4,"12345"),
("Andrea","Flamingo","3224512073","Flamingo.Andrea-12@gmail.com","34531725",1,4,"12345"),
("Javier","Molina","3112801790","JavierCardona2000@outlook.com","41733718",1,3,"12345"),
("Daniel","Lopez","3187421743","Lopez.Daniel@gmail.com","25611423",1,5,"12345"),
("Pablo","Legarda","3107168291","PabloLegarda-1995@outlook","79390100",1,5,"12345"),
("Luisa","Camargo","3225819460","Luisa.Cama.200@gmail.com","34544560",1,6,"12345"),
("Esteban","Durango","3142849026","Estaban.Dura31@gmail.com","18125465",1,6,"12345"),
("Alejandra","Bohorquez","3235711820","Bohorquez-Aleja-321@gmail.com","34564081",1,6,"12345"),
("Maria","Osorio","3183259915","MariaOso.36@gmail.com","41575274",1,7,"12345"),
("Jose","Perez","3112501128","JoselitoPerez.12@gmail.com","10295064",1,7,"12345"),
("Luz Marina","Galbis","3190124523","marina.luzGalbis2@outlook.com","13156412",1,7,"12345"),
("Hugo","Vargas","3235663498","Hugito12Vargas@outlook.com","10541205",1,7,"12345"),
("Alvaro","Puentes","3105923301","Alvaro.Puentes32@gmail.com","19490554",1,8,"12345"),
("Alba","Ceballos","3206731049","Alba.ceballos098@gmail.com","34549144",1,8,"12345"),
("Carlos","Cardona","319546576","CardonaCarlos,157@otlook.com","1534541",1,8,"12345"),
("Nicolas","Nuñez","3147539763","Nunez.nicolas18286@gmail.com","1567564",1,9,"12345"),
("Calvin","harris","3205714910","CalvinDj.71@gmial.com","14421351",1,10,"12345"),
("Ana Maria","Serna","3122305507","AnaSerna.Maria.25@gmail.com","1154865",1,11,"12345"),
("Dana","Palacios","3194397340","Dana.Flor201@otlook.com","1234564",1,11,"12345");


insert into Proveedor(nombre_proveedor,apellido_proveedor,telefono_proveedor,correo_proveedor,direccion_proveedor,id_tipo_documento)
values
("Shawn","Mendez","3134583831","Shawn.mendes.05@gmail.com","Los Angeles",3),
("Marta","Stuart","3234851671","StuartMarta1999.@gmail.com","Inglaterra",3);


insert into Cotizacion(fecha_cotizacion,id_cliente,odservacion_cotizacion,tematica_evento,id_tipo_evento,id_lugar,id_mesa,precio_cotizacion,confirmacion_evento)
values
("2019-09-01",1,"Que Buen Servicio","80's",1,7,3,7500000,1),
("2019-03-17",2,"Que Buen Servicio","los 90",2,5,1,6500000,1),
("2019-02-25",3,"Pesimo Servicio","Amor y Amistad",3,1,2,9000000,1),
("2018-12-20",4,"Que Buen Servicio","Navidad",4,2,3,8400000,1),
("2019-12-15",5,"Se me perdio mi hija :,v  ","20's",5,5,4,6750000,1),
("2018-05-09",6,"Pesimo Servicio","Animales Acuaticos",4,2,1,7000000,1),
("2019-08-16",7,"engorde 2 kilos","futbol",3,4,2,8000000,1),
("2019-11-24",8,"Que Buen Servicio","Casino",5,2,3,9650000,1),
("2019-07-01",1,"Pesimo Servicio","Halloween",1,1,1,1383450,1);
insert into DetalleEmpleado(id_cotizacion,id_empleado,cantidad_empleados)
values	
(1,1,1),
(2,2,1),
(3,3,4),
(4,4,5),
(5,5,4),
(6,6,7),
(7,7,3),
(8,8,4),
(9,9,5);

insert into DetalleComida(id_cotizacion,id_comida,cantidad_comida,valor_plato)
values	
(1,1,200,"25000"),
(2,2,100,"15000"),
(3,3,120,"18000"),
(4,4,60,"12000"),
(5,5,100,"15000"),
(6,6,40,"10000"),
(7,7,140,"20000"),
(8,8,60,"12000"),
(9,9,90,"15000");


insert into DetalleCoctel(id_cotizacion,id_coctel,cantidad_coctel,precio_coctel)
values	
(1,1,200,"4500"),
(2,2,100,"4500"),
(3,3,120,"4500"),
(4,1,60,"4500"),
(5,2,100,"4500"),
(6,3,40,"4500"),
(7,1,140,"4500"),
(8,2,60,"4500"),
(9,3,90,"4500");




insert into DetalleDecoracion(id_decoracion,id_cotizacion,cantidad_decoracion,precio_decoracion)
values	
(1,1,450147,"200000"),
(2,2,158920,"10000"),
(3,3,20000,"123000"),
(4,4,520100,"45120"),
(5,5,600000,"20210");

insert into DetalleProducto(id_producto,id_proveedor,cantidad_producto,tipo_producto)
values	
(1,2,4,"Dulces"),
(2,2,4,"Postres"),
(3,2,4,"Flores"),
(4,2,4,"Bombas"),
(5,2,4,"Carnes"),
(6,1,140,"Sillas"),
(7,1,400,"Mesas");

/*Fin de los insert de las tablas*/