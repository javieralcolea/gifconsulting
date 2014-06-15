/*
Created		20/05/2014
Modified		27/05/2014
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table usuario (
	ID_Usuario Int NOT NULL AUTO_INCREMENT,
	Usuario_Usuario Varchar(20) NOT NULL,
	Clave_Usuario Varchar(20) NOT NULL,
	Tipo_Usuario Varchar(20) NOT NULL,
	Nombre_Usuario Varchar(50),
	Telefono_Usuario Char(9),
	Email_Usuario Varchar(40),
	Fax_Usuario Char(9),
 Primary Key (ID_Usuario)) ENGINE = InnoDB;

Create table empresa (
	CIF_Empresa Varchar(20) NOT NULL,
	Razon_Social Varchar(80) NOT NULL,
	Calle_Empresa Varchar(80),
	Numero_Calle Varchar(10),
	Puerta_Empresa Varchar(10),
	Provincia_Empresa Varchar(20) NOT NULL,
	Poblacion_Empresa Varchar(80) NOT NULL,
	CP_Empresa Char(5),
	Cuenta_Empresa Char(20) NOT NULL,
	Porcentaje_Empresa Float(4,2),
	Forma_Pago Varchar(30),
	Dia_Pago Int,
	Calle_Pagare Varchar(80),
	Numero_Pagare Varchar(6),
	Puerta_Pagare Varchar(10),
	Provincia_Pagare Varchar(20),
	Poblacion_Pagare Varchar(20),
	CP_Pagare Char(5),
	Contacto_1 Varchar(40),
	TLF_Contacto_1 Char(9),
	Email_Contacto_1 Varchar(40),
	Contacto_2 Varchar(40),
	TLF_Contacto_2 Char(9),
	Email_Contacto_2 Varchar(40),
	Contacto_3 Varchar(40),
	TLF_Contacto_3 Char(9),
	Email_Contacto_3 Varchar(40),
	Usuario_Empresa Varchar(40),
	Clave_Empresa Varchar(40),
 Primary Key (CIF_Empresa)) ENGINE = InnoDB;

Create table factura (
	ID_Factura Int NOT NULL AUTO_INCREMENT,
	CIF_Deudor Varchar(20) NOT NULL,
	CIF_Empresa Varchar(20) NOT NULL,
	Numero_Factura Varchar(30) NOT NULL,
	Importe_Factura Float(8,2),
	Imp_Pend_Factura Float(8,2),
	Tipo_Factura Varchar(30),
	Fecha_Factura Date,
	Vencimiento_Factura Date,
	Cobro_Factura Date,
	Tipo_Pago Varchar(30),
	Estado_Factura Varchar(30),
 Primary Key (ID_Factura)) ENGINE = InnoDB;

Create table alarma (
	ID_Alarma Int NOT NULL AUTO_INCREMENT,
	ID_Factura Int NOT NULL,
	ID_Usuario Int NOT NULL,
	Fecha_Alarma Date NOT NULL,
	Hora_Alarma Time NOT NULL,
	Comentario_Alarma Text NOT NULL,
 Primary Key (ID_Alarma)) ENGINE = InnoDB;

Create table deudor (
	CIF_Deudor Varchar(20) NOT NULL,
	Nombre_Deudor Varchar(50) NOT NULL,
	Provincia_Deudor Varchar(20),
	Ciudad_Deudor Varchar(40),
	CP_Deudor Char(5),
	Telefono_Deudor Char(9),
	Contacto_Deudor Varchar(50),
 Primary Key (CIF_Deudor)) ENGINE = InnoDB;

Create table peticion (
	ID_Peticion Int NOT NULL AUTO_INCREMENT,
	ID_Factura Int NOT NULL,
	ID_Usuario Int NOT NULL,
	Fecha_Peticion Date NOT NULL,
	Hora_Peticion Time NOT NULL,
	Comentario_Peticion Text NOT NULL,
	Solucionada_Peticion Bool NOT NULL,
 Primary Key (ID_Peticion)) ENGINE = InnoDB;

Create table factura_usuario (
	ID_Factura Int NOT NULL,
	ID_Usuario Int NOT NULL,
 Primary Key (ID_Factura,ID_Usuario)) ENGINE = InnoDB;
 

Alter table factura_usuario add Foreign Key (ID_Usuario) references usuario (ID_Usuario) on delete  restrict on update  restrict;
Alter table factura add Foreign Key (CIF_Empresa) references empresa (CIF_Empresa) on delete  restrict on update  restrict;
Alter table factura_usuario add Foreign Key (ID_Factura) references factura (ID_Factura) on delete  restrict on update  restrict;
Alter table factura add Foreign Key (CIF_Deudor) references deudor (CIF_Deudor) on delete  restrict on update  restrict;
Alter table peticion add Foreign Key (ID_Factura,ID_Usuario) references factura_usuario (ID_Factura,ID_Usuario) on delete  restrict on update  restrict;
Alter table alarma add Foreign Key (ID_Factura,ID_Usuario) references factura_usuario (ID_Factura,ID_Usuario) on delete  restrict on update  restrict;


