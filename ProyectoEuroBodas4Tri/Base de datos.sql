/*Inicio de la creacion de la base de datos*/
create database BodasEliteGroup;

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
    tipo_sonido_iluinacion varchar (70) not null,
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
    descripcion_tipo_evento text not null,
    
    primary key(id_tipo_evento)
);
/*Fin de la creacion de las tablas que no utilizan llaves foraneas*/


/*Inicio de la creacion de las tablas que usan llaves forneas*/
create table Cliente
(
	id_cliente integer not null auto_increment,
    nombre_cliente varchar(45) not null,
    Apellido_cliente varchar(45) not null,
    telefono_cliente integer(10) not null,
    correo_cliente varchar(70) not null,
    id_tipo_documento integer not null,
    
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
    telefono_empleado integer(10) not null,
    correo_empleado varchar(70) not null,
    id_documento_empleado integer(15) not null,
    id_tipo_documento integer not null,
    id_cargo integer not null,
    
    primary key(id_empleado),
    foreign key(id_tipo_documento) references TipoDocumento(id_tipo_documento),
    foreign key(id_cargo) references Cargo(id_cargo)
);


create table Proveedor
(
	id_proveedor integer not null auto_increment,
    nombre_proveedor varchar(45) not null,
	apellido_proveedor varchar(45) not null,
    telefono_proveedor integer(10) not null,
    correo_proveedor varchar(70) not null,
    direccion_proveedor varchar(60) not null,
    id_empleado integer not null,
    id_tipo_documento integer not null,
    
    primary key(id_proveedor),
    foreign key(id_empleado) references Empleado (id_empleado),
    foreign key(id_tipo_documento) references TipoDocumento(id_tipo_documento)
);


create table DetalleEmpleado
(
	id_detalle_empleado integer not null auto_increment,
    id_empleado integer not null,
    cantidad_empleados integer (10) not null,
    
    primary key(id_detalle_empleado),
    foreign key(id_empleado) references Empleado(id_empleado)
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
    id_detalle_comida integer not null,
    id_detalle_coctel integer not null,
    id_detalle_decoracion integer not null,
    precio_cotizacion float not null,
    confirmacion_evento tinyint not null,
    
    primary key(id_cotizacion),
    foreign key(id_cliente) references Cliente(id_cliente),
    foreign key(id_tipo_evento) references TipoEvento(id_tipo_evento),
    foreign key(id_lugar) references Lugar(id_lugar),
    foreign key(id_mesa) references Mesa(id_mesa)
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
    precio_cocttel float not null,
    
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


/*Creacion de los alter table de la tabla Cotizacion*/
alter table Cotizacion add constraint FK_COTIZACION_DETALLE_COMIDA
foreign key(id_detalle_comida) 
references DetalleComida(id_detalle_comida);

alter table Cotizacion add constraint FK_COTIZACION_DETALLE_COCTEL
foreign key(id_detalle_coctel) 
references DetalleCoctel(id_detalle_coctel);

alter table Cotizacion add constraint FK_COTIZACION_DETALLE_DECORACION
foreign key(id_detalle_decoracion) 
references DetalleDecoracion(id_detalle_decoracion);
/*Fin de la creacion de los alter table de la tabla Cotizacion*/


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
values	("", ,"", );


insert into SonidoIluminacion(tipo_sonido_iluminacion,precio_sonido_iluminacion)
values	("", );


insert into TipoComida(nombre_tipo_comida)
values	("");


insert into Coctel(nombre_coctel,descripcion_coctel,precio_coctel)
values	("","", );


insert into Cargo(nombre_cargo)
values	("");


insert into Mesa(nombre_mesa,descripcion_mesa,precio_mesa)
values	("","", );


insert into Decoracion(nombre_decoracion,descripcion_decoracion,precio_decoracion)
values	("","", );


insert into Producto(nombre_producto,precio_producto)
values	("", );


insert into TipoEvento(nombre_tipo_evento,descripcion_tipo_evento)
values	("","");


insert into Cliente(nombre_cliente,apellido_cliente,telefono_cliente,correo_cliente,id_tipo_documento)
values	("","", ,"", );


insert into Comida(nombre_comida,descripcion_comida,valor_plato,id_tipo_comida)
values	("","", , );


insert into Empleado(nombre_empleado,apellido_empleado,telefono_empleado,correo_empleado,id_documento_empleado,id_tipo_documento,id_cargo)
values	("","", ,"", , , );


insert into Proveedor(nombre_proveedor,apellido_proveedor,telefono_proveedor,correo_proveedor,direccion-proveedor,id_empleado,id_tipo_documento)
values	("","", ,"","", , );


insert into DetalleEmpleado(id_empleado,cantidad_empleado)
values	( , );


insert into Cotizacion(fecha_cotizacion,id_cliente,odservacion_cotizacion,tematica_evento,id_tipo_evento,id_lugar,id_mesa,
						id_detalle_comida,id_detalle_coctel,id_detalle_decoracion,precio_cotizacion,confirmacion_evento)
values	( , ,"","", , , , , , , , );


insert into DetalleComida(id_cotizacion,id_comida,cantidad_comida,valor_plato)
values	( , , , );


insert into DetalleCoctel(id_coctel,id_cotizacion,cantidad_coctel,precio_coctel)
values	( , , , );


insert into DetalleDecoracion(id_decoracion,id_cotizacion,cantidad_decoracion,precio_decoracion)
values	( , , , );


insert into DetalleProducto(id_product,id_proveedor,cantidad_producto,tipo_producto)
values	( , , , );
/*Fin de los insert de las tablas*/


/*Inicio de los querys*/
select *
from TipoDocumento;