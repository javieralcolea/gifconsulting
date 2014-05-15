/*
Created		20/04/2014
Modified		09/05/2014
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table DISCOS (
	ID_Disco Int NOT NULL AUTO_INCREMENT,
	Nombre_Disco Varchar(40),
	Anio_Disco Int,
	Caratula_Disco Varchar(60) NOT NULL,
	Comentarios_Disco Text,
	Foto_Disco Varchar(70),
	Spotify_Disco Varchar(80),
	Itunes_Disco Varchar(80),
 Primary Key (ID_Disco)) ENGINE = InnoDB;

Create table CANCIONES (
	ID_Cancion Int NOT NULL AUTO_INCREMENT,
	ID_Disco Int NOT NULL,
	Num_Cancion Int NOT NULL,
	Titulo_Cancion Varchar(60) NOT NULL,
	Letra_Cancion Text,
	Enlace_Cancion Varchar(80),
 Primary Key (ID_Cancion)) ENGINE = InnoDB;

Create table VIDEOS (
	ID_Video Int NOT NULL AUTO_INCREMENT,
	Titulo_Video Varchar(80) NOT NULL,
	Tipo_Video Char(2) NOT NULL,
	Enlace_Video Varchar(20) NOT NULL,
	Comentarios_Video Text,
 Primary Key (ID_Video)) ENGINE = InnoDB;

Create table ADMIN (
	ID_Admin Varchar(20) NOT NULL,
	Clave_Admin Varchar(20) NOT NULL,
 Primary Key (ID_Admin)) ENGINE = InnoDB;

Create table IMAGENES (
	ID_Imagen Int NOT NULL AUTO_INCREMENT,
	ID_Galeria Int NOT NULL,
	Nombre_Imagen Varchar(60) NOT NULL,
	Alt_Imagen Varchar(60),
 Primary Key (ID_Imagen)) ENGINE = InnoDB;

Create table ARTICULOS (
	ID_Articulo Int NOT NULL AUTO_INCREMENT,
	Titulo_Articulo Varchar(30) NOT NULL,
	Texto_Articulo Text NOT NULL,
	Fecha_Articulo Date NOT NULL,
	Publicado_Articulo Bool NOT NULL,
 Primary Key (ID_Articulo)) ENGINE = InnoDB;

Create table CONCIERTOS (
	ID_Concierto Int NOT NULL AUTO_INCREMENT,
	Fecha_Concierto Date NOT NULL,
	Texto_Concierto Text NOT NULL,
	Entradas_Concierto Varchar(80),
 Primary Key (ID_Concierto)) ENGINE = InnoDB;

Create table GALERIAS (
	ID_Galeria Int NOT NULL AUTO_INCREMENT,
	Fecha_Galeria Varchar(4) NOT NULL,
	Descripcion_Galeria Varchar(30) NOT NULL,
 Primary Key (ID_Galeria)) ENGINE = InnoDB;

Create table NOTICIAS (
	ID_Noticia Int NOT NULL AUTO_INCREMENT,
	Titulo_Noticia Varchar(40) NOT NULL,
	Texto_Noticia Text NOT NULL,
	Fecha_Noticia Date NOT NULL,
	Publicada_Noticia Bool NOT NULL,
	Destacada_Noticia Bool NOT NULL,
 Primary Key (ID_Noticia)) ENGINE = InnoDB;


Alter table CANCIONES add Foreign Key (ID_Disco) references DISCOS (ID_Disco) on delete  restrict on update  restrict;
Alter table IMAGENES add Foreign Key (ID_Galeria) references GALERIAS (ID_Galeria) on delete  restrict on update  restrict;


