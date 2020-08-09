-- ---------------------------------------------------
drop schema if exists animedics;

-- ---------------------------------------------------
-- ---------------------------------------------------
CREATE SCHEMA IF NOT EXISTS Animedics;
use Animedics;

drop table if exists `Animedics`.`rol`;
create table if not exists `Animedics`.`rol`
(
	id_rol tinyint auto_increment primary key,
    nombre_rol nvarchar(50),
    constraint uq_rol unique (nombre_rol)
);

drop table if exists `Animedics`.`usuarios`;
create table if not exists usuarios 
(
	id_usuario int AUTO_INCREMENT primary key,
    nombre_usuario nvarchar(30),
    correo nvarchar(50),
    clave nvarchar(100),
    fecha_registro date,
    rol	tinyint,
    constraint fk_rol foreign key (rol) references rol(id_rol),
    constraint uq_nom_usu unique (nombre_usuario),
    constraint uq_correo_usuario unique (correo)
);
drop table if exists `Animedics`.`personas`;
create table if not exists personas 
(
	id_persona int AUTO_INCREMENT primary key,
    nombres nvarchar(50),
    ap_paterno nvarchar(50),
    ap_materno nvarchar(50),
    telefono numeric(10),
    correo_contacto nvarchar(50),
    usuario	int,
    constraint fk_usuario foreign key (usuario) references usuarios(id_usuario)
);
drop table if exists `Animedics`.`veterinarios`;
create table if not exists `Animedics`.`veterinarios`
(
	id_veterinario int AUTO_INCREMENT primary key,
    cedula nvarchar(10),
    persona int,
    constraint fk_usuario_veterinario foreign key (persona) references personas(id_persona),
    constraint uq_cedula unique (cedula)
);
drop table if exists `Animedics`.`especie`;
create table if not exists `Animedics`.`especie`
(
	id_especie int AUTO_INCREMENT primary key,
    nombre nvarchar(50),
    constraint uq_especie unique (nombre)
);
drop table if exists `Animedics`.`mascotas`;
create table if not exists `Animedics`.`mascotas`
(
	id_animal int AUTO_INCREMENT primary key,
    nombre nvarchar(50),
    especie int,
    edad int,
    sexo char(6),
    propietario int,
    constraint fk_especie foreign key (especie) references especie(id_especie),
    constraint fk_propietario foreign key (propietario) references personas(id_persona),
	constraint chk_sexo check (sexo in ('MACHO','HEMBRA')),
    constraint chk_edad check (edad>0)
);
drop table if exists `Animedics`.`servicio`;
create table if not exists `Animedics`.`servicio`
(
	id_servicio int auto_increment primary key,
    nombre nvarchar(20),
    unique uq_servicio (nombre)
);
drop table if exists `Animedics`.`citas`;
create table if not exists `Animedics`.`citas`
(
	id_cita int auto_increment primary key,
    folio char(15),
    veterinario int,
    mascota int,
    fecha date,
    hora time,
    completada char(2),
    constraint fk_veterinario_cita foreign key (veterinario) references veterinarios(id_veterinario),
    constraint fk_mascota foreign key (mascota) references mascotas(id_animal),
    constraint uq_folio unique (folio)
);
drop table if exists `Animedics`.`cita_servicio`;
create table if not exists `Animedics`.`cita_servicio`
(
	cita int,
    servicio int,
    constraint fk_cita_ciser foreign key (cita) references citas(id_cita),
    constraint fk_servicio foreign key (servicio) references servicio(id_servicio)
);
drop table if exists `Animedics`.`datos_medicos`;
create table if not exists `Animedics`.`datos_medicos`
(
	id_datos int auto_increment primary key,
    sintomas text,
    temperatura_c decimal(3,1),
    peso_kg decimal(6,2),
    diagnostico text,
    cita int,
    examen_abdomen text,
    estado_org_int text,
    estado_org_ext text,
    operado nvarchar(50),
    grado_deshidratacion nvarchar(30),
    constraint fk_cita_datosmedicos foreign key (cita) references citas(id_cita)
);
drop table if exists `Animedics`.`recetas`;
create table if not exists `Animedics`.`recetas`
(
	id_receta int auto_increment primary key,
    datos int,
    constraint fk_recetas_dm foreign key (datos) references datos_medicos(id_datos)
);
drop table if exists `Animedics`.`medicamento`;
create table if not exists `Animedics`.`medicamento`
(
	id_medicamento int auto_increment primary key,
    nom_comercial nvarchar(50)
);
drop table if exists `Animedics`.`receta_medicamento`;
create table if not exists `Animedics`.`receta_medicamento`
(
	receta int,
    medicamento int,
    dosis nvarchar(60),
    horas int,
    dias int,
    constraint fk_receta_med foreign key (receta) references recetas(id_receta),
    constraint fk_medicamento foreign key (medicamento) references medicamento(id_medicamento)
);
create index fch_reg on usuarios(fecha_registro asc);
create index fch_cita on citas(fecha asc);
create index hora on citas(hora asc);
create index folio on citas(folio asc);

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(3, 'Cliente'),
(2, 'Veterinario');
INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `correo`, `clave`, `fecha_registro`, `rol`) VALUES
(1, 'craymont0', 'craymont0@hibu.com', 'NthAqQSd6o6', '2019-06-03', 1),
(2, 'rpeatman1', 'rpeatman1@ow.ly', 'zUl9VjAd', '2019-05-04', 2),
(3, 'tmacfadin2', 'tmacfadin2@loc.gov', 'YRyDV9wu6', '2019-06-23', 3),
(4, 'rwedmore3','rwedmore3@clickbank.net', 'wOgPzM5KduGq', '2020-05-30', 3),
(5, 'hchildren4','hchildren4@fastcompany.com', 'ifRQjxN', '2019-06-20', 3),
(6, 'aditer5','aditer5@furl.net', 'a2YJ895UH', '2020-02-06',  3),
(7, 'lblewmen6','lblewmen6@alibaba.com', 'vhjXCMmA1C', '2020-05-21',  3),
(8, 'kcelle7','kcelle7@uol.com.br', '8HkBv50', '2019-09-25', 3),
(9, 'tbolesworth8','tbolesworth8@google.com.au', 'I9sCfDHKzKZ', '2020-05-27', 3),
(10, 'kquarton9', 'kquarton9@nba.com', '2P3XJcT5', '2020-01-03', 3),
(11, 'loconora','loconora@webnode.com', '8izRUzBEnH', '2020-05-26', 3),
(12, 'jmonkemanb','jmonkemanb@people.com.cn', 'rXMkn3Z8k', '2019-10-17',  2),
(13, 'dcathroc','dcathroc@dailymail.co.uk', '3juEOw83X', '2020-06-15',  2),
(14, 'dpestricked','dpestricked@nyu.edu', 'sQ8OEByS', '2019-11-01',  2),
(15, 'nspringalle','nspringalle@bloglovin.com', 'scuapLR', '2020-05-06', 2);
INSERT INTO `personas` (`id_persona`, `nombres`, `ap_paterno`, `ap_materno`, `telefono`, `correo_contacto`, `usuario`) VALUES
(1, 'Carl', 'Bossom', 'Raymont','9106064877', 'craymont0@hibu.com', 1),
(2, 'Roby', 'Rate', 'Peatman','1392773602', 'rpeatman1@ow.ly', 2),
(3, 'Tedmund', 'De Brett', 'MacFadin','8225998985', 'tmacfadin2@loc.gov', 3),
(4, 'Rickard', 'Deverille', 'Wedmore.','3216495490', 'rwedmore3@clickbank.net', 4),
(5, 'Hermie', 'Follis', 'Children', '5914675701', 'hchildren4@fastcompany.com', 5),
(6, 'Anne-marie', 'Bessom', 'Diter', '5722821956', 'aditer5@furl.net', 6),
(7, 'Lise', 'MacNamara', 'Blewmen', '2355846303', 'lblewmen6@alibaba.com', 7),
(8, 'Kessiah', 'de Cullip', 'Celle', '4741600169', 'kcelle7@uol.com.br', 8),
(9, 'Tomkin', 'Wanjek', 'Bolesworth', '3415803742', 'tbolesworth8@google.com.au', 9),
(10, 'Katherine', 'Alexandrou', 'Quarton', '1522780875', 'kquarton9@nba.com', 10),
(11, 'Lorene', 'Quinion', 'O\'Conor', '7984438289', 'loconora@webnode.com', 11),
(12, 'Jodie', 'Carlan', 'Monkeman', '2624041434', 'jmonkemanb@people.com.cn', 12),
(13, 'Danette', 'Reasun', 'Cathro', '2533662146', 'dcathroc@dailymail.co.uk', 13),
(14, 'Daniela', 'Davies', 'Pestricke', '2703137593', 'dpestricked@nyu.edu', 14),
(15, 'Niki', 'Rhymer', 'Springall', '7566215048', 'nspringalle@bloglovin.com', 15);
INSERT INTO `veterinarios` (`id_veterinario`, `cedula`, `persona`) VALUES
('1', 'y539ka', 2),
('2', 'b551SN', 12),
('3', 'y055aG', 13),
('4', 'o615Wo', 14),
('5', 'c298qo', 15);
INSERT INTO `especie` (`id_especie`, `nombre`) VALUES
('2', 'Gato'),
('1', 'Perro');
INSERT INTO `mascotas` (`id_animal`, `nombre`, `especie`, `edad`, `sexo`, `propietario`) VALUES
('1', 'Max', '1', 2, 'MACHO', '1'),
('10', 'Nina', '1', 4, 'HEMBRA', '6'),
('2', 'Pelusa', '2', 1, 'HEMBRA', '2'),
('3', 'Bola de nieve', '1', 2, 'HEMBRA', '3'),
('4', 'Jerry', '2', 3, 'MACHO', '4'),
('5', 'Tom', '2', 1, 'MACHO', '5'),
('6', 'Pi', '2', 1, 'MACHO', '6'),
('7', 'Desa', '1', 2, 'HEMBRA', '7'),
('8', 'Melek', '1', 2, 'HEMBRA', '8'),
('9', 'Molly', '1', 1, 'HEMBRA', '9');
INSERT INTO `servicio` (`id_servicio`, `nombre`) VALUES
(5, 'Baño'),
(3, 'Castración'),
(1, 'Consulta'),
(4, 'Crematorio'),
(2, 'Estetica');
INSERT INTO `citas` (`id_cita`, `folio`, `veterinario`, `mascota`, `fecha`, `hora`,`completada`) VALUES
(1, 'C00001', '1', '1', '2020-06-01', '15:00:00','SI'),
(2, 'C00002', '1', '2', '2020-06-15', '14:00:00','SI'),
(3, 'C00003', '2', '3', '2020-07-01', '16:00:00','SI'),
(4, 'C00004', '2', '4', '2020-06-30', '12:00:00','SI'),
(5, 'C00005', '3', '5', '2020-07-02', '10:00:00','SI'),
(6, 'C00006', '3', '6', '2020-07-05', '18:00:00','SI'),
(7, 'C00007', '4', '7', '2020-07-06', '15:00:00','SI'),
(8, 'C00008', '4', '8', '2020-07-07', '13:00:00','SI'),
(9, 'C00009', '5', '9', '2020-07-08', '14:00:00','SI'),
(10, 'C00010', '5', '10', '2020-07-09', '17:00:00','SI');
INSERT INTO `cita_servicio` (`cita`, `servicio`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(2, 5),
(3, 5),
(4, 2),
(5, 3),
(10, 5),
(10, 2),
(6, 3),
(7, 3);
INSERT INTO `datos_medicos` (`id_datos`, `sintomas`, `temperatura_c`, `peso_kg`, `diagnostico`, `cita`, `examen_abdomen`, `estado_org_int`, `estado_org_ext`, `operado`, `grado_deshidratacion`) VALUES
(1, 'no deja de vomitar y vomita gris', '35.0', '40.00', 'tiene el intestino desgarrado', 1, 'lo tiene plano', 'el intestino esta desgarrado y el colon tapado', 'todo correcto', 'no operado', 'bajo'),
(2, 'no se mueve mucho y duerme demasiado', '36.0', '50.00', 'tiene un esguince en el tobillo derecho', 2, 'tiene una peque?a deformacion', 'todo correcto', 'todo correcto', 'no operado', 'bajo'),
(3, 'no ha comido por 3 dias', '35.0', '100.00', 'el estomago tiene un desequilibro en los jugos y tiene tapado el colon', 3, 'todo correcto', 'el estomago tiene una reaccion mala a ciertos alime ntos y el colon se tapo a que eran demasiado para procesar', 'todo correcto', 'no operado', 'bajo'),
(4, 'hace mucho ruido por las noches', '35.0', '65.00', 'tiene congestionada la garganda', 4, 'corecto', 'la laringe esta irritada y el tracto digestivo averiado', 'todo correcto', 'no operado', 'medio'),
(5, 'pierde mucho el equilibro', '34.0', '40.00', 'tiene un desequilibro en sus organos', 5, 'esta demasaido guango', 'los canales auditivos ha n sido obstruidos ', 'tiene una leve irritacio n ocular', 'no operado', 'bajo'),
(6, 'vomita mucho', '35.0', '50.00', 'comio chocoalte ', 6, 'correcto', 'el higado esta saturado', 'todo correcto', 'no operado', 'bajo'),
(7, 'esta demasiado delgado', '35.0', '56.00', 'tiene parasitos, necesita desparasitacion', 7, 'corecto', 'todo correcto', 'todo correcto', 'no operado', 'medio'),
(8, 'ingiere demasiada agua y la vomita', '37.0', '50.00', 'tiene una desidratacion por pasar tanto en el sol', 8, 'normal', 'los organos se han achicado por la falta de agua', 'la piel se ha vuelto rasposa', 'no operado', 'alto'),
(9, 'no quiere ingerir agua y se asusta cuando la ve', '35.0', '60.00', 'Ha ingerido agua con parasitos ', 9, 'carcomido', 'el intestino ha absobido nutrientes de la sangre pro falta de gua', 'ha dejado de observar bien  y el pelaje se le esta cayendo', 'no operado', 'alto'),
(10, 'respira muiy lento', '36.0', '50.00', 'Tiene una efisema pulmonar', 10, 'abstento de corpulencia', 'los pulmones han sido contaminados con un virus', 'la nariz ha sido obstruida', 'no operado', 'bajo');
INSERT INTO `recetas` (`id_receta`, `datos`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);
INSERT INTO `medicamento` (`id_medicamento`, `nom_comercial`) VALUES
(1, 'Paracetaml'),
(2, 'Omeprazol'),
(3, 'Ambroxol'),
(4, 'Acido acetasltico'),
(5, 'Netx');
INSERT INTO `receta_medicamento` (`receta`, `medicamento`, `dosis`, `horas`, `dias`) VALUES
(1, 1, '2 pastillas', 3, 4),
(2, 1, '3 pastillas', 6, 7),
(3, 2, 'dos cucharadas', 6, 4),
(4, 2, '100 mililitros', 6, 3),
(5, 3, '3 ampoyetas', 6, 2),
(6, 3, '2 ampoyetas', 4, 5),
(7, 4, '3 untadas', 5, 4),
(8, 4, '8 untadas', 11, 6),	
(9, 5, '1 pastilla y media', 5, 3),
(10, 5, '5 pastilas', 4, 3);

/*Seleccionar diagnostico, medicamento y dosis por mascota en especifico*/ 
select dm.diagnostico, med.nom_comercial as Medicamento, rm.dosis,rm.horas, rm.dias from personas as p
inner join mascotas as m on m.propietario=p.id_persona
inner join citas as ci on ci.mascota=m.id_animal
inner join datos_medicos as dm on dm.cita=ci.id_cita
inner join recetas as r on r.datos=dm.id_datos
inner join receta_medicamento as rm on rm.receta=r.id_receta
inner join medicamento as med on med.id_medicamento=rm.medicamento
where m.id_animal=(SELECT mas.id_animal from mascotas as mas
                   inner join personas as p on p.id_persona=mas.propietario
                   inner join usuarios as usu on usu.id_usuario=p.usuario
                   where mas.nombre='Max' and usu.nombre_usuario='craymont0');
                   
/*Perros que han tenido servicio de baño*/
select ci.folio as Folio, m.nombre as Mascota,p.nombres as Dueño,ci.fecha,ci.hora from usuarios as u
inner join personas as p on p.usuario=u.id_usuario
inner join mascotas as m on m.propietario=p.id_persona
inner join citas as ci on ci.mascota=m.id_animal
inner join cita_servicio as cs on cs.cita=ci.id_cita
inner join servicio as s on s.id_servicio=cs.servicio
where  s.nombre='Baño' and m.id_animal in (select mas.id_animal from mascotas as mas
                      inner join especie as e on e.id_especie=mas.especie
                      where e.nombre='Perro');
                      
/*Contactar a un dueño de una cita*/
select c.folio as Folio,m.nombre as Mascota, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño, 
p.telefono as Telefono from citas as c
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as p on p.id_persona=m.propietario
inner join usuarios as u on u.id_usuario=p.usuario
where c.fecha='2020-07-07' and c.hora='13:00:00' and  c.veterinario=(select v.id_veterinario from veterinarios as v
					 inner join personas as per on per.id_persona=v.persona
                     inner join usuarios as us on us.id_usuario=per.usuario
                     where us.nombre_usuario='dpestricked');
                     
/*Mascotas que fueron a castracion y tienen mas de 2 años*/
select m.nombre as Nombre, p.nombres as Dueño, m.edad as Edad, e.nombre as Especie from usuarios as u 
inner JOIN personas as p on p.usuario=u.id_usuario
inner join mascotas as m on m.propietario=p.id_persona
inner join citas as ci on ci.mascota=m.id_animal
inner JOIN cita_servicio as cs on cs.cita=ci.id_cita
inner JOIN servicio as s on s.id_servicio=cs.servicio
inner join especie as e on e.id_especie=m.especie
where s.nombre='Castracion' and m.edad>=2;

/*Citas por dia de un veterinario*/
select concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Veterinario, m.nombre as Mascota, concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Dueño,c.fecha as Fecha, c.hora as Hora from citas as c
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as p on p.id_persona=v.persona
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as per on per.id_persona=m.propietario
inner join especie as e on e.id_especie=m.especie
where c.fecha='2020-06-01';

/*Reporte de consulta por mascota*/
select m.nombre as Mascota,e.nombre as Especie, dm.temperatura_c as Temperatura,dm.peso_kg as Peso, dm.diagnostico as Diagnostico, 
dm.operado as Operaciones from mascotas as m
inner join citas as c on c.mascota=m.id_animal
inner join datos_medicos as dm on dm.cita=c.id_cita
inner join especie as e on e.id_especie=m.especie
where c.folio='C00001';

 /*Citas de un veterinario*/
 select c.folio as Folio,m.nombre as Mascota, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño, c.fecha as Fecha, c.hora as Hora from citas as c
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as p on p.id_persona=m.propietario
where c.veterinario=(select v.id_veterinario from veterinarios as v 
					inner join personas as per on per.id_persona=v.persona
                     inner join usuarios as us on us.id_usuario=per.usuario
                     where us.nombre_usuario='rpeatman1');

/*Citas de un veterinario en cierto periodo*/
select concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Veterinario, m.nombre as Mascota, concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Dueño,c.fecha as Fecha, c.hora as Hora from citas as c
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as p on p.id_persona=v.persona
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as per on per.id_persona=m.propietario
inner join especie as e on e.id_especie=m.especie
where c.fecha BETWEEN '2020-06-15' and '2020-06-30' and 
	  c.veterinario=(select v.id_veterinario from veterinarios as v 
					inner join personas as pers on pers.id_persona=v.persona
                     inner join usuarios as us on us.id_usuario=pers.usuario
                     where us.nombre_usuario='rpeatman1');
                     
/*Dtos de los veterinarios del sistema*/
select concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Nombre, p.correo_contacto as Correo, p.telefono as Telefono,
v.cedula as Cedula_profesional from personas as p
inner join veterinarios as v on v.persona=p.id_persona
inner join usuarios as u on u.id_usuario=p.usuario
inner join rol as r on r.id_rol=u.rol
where r.nombre_rol='Veterinario';

/*PROCEDIMIENTOS ALMACENADOS*/

/*Ver las mascotas de cada cliente*/
use animedics 
delimiter $$
create procedure mascotas_cliente (usuario varchar(30))
begin
select ma.nombre as Nombre,e.nombre as Especie, ma.edad as Edad, ma.sexo from mascotas as ma
inner join especie as e on e.id_especie=ma.especie
where ma.propietario=(select p.id_persona from personas as p
						inner join usuarios as u on u.id_usuario=p.usuario
						where u.nombre_usuario=usuario);
end $$

/*Ver las citas de cada animal*/
use animedics 
delimiter $$
create procedure citas_animal(mascota varchar(50),usuario varchar(30))
begin
select c.folio as Folio, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Veterinario,p.telefono, c.fecha as Fecha, c.hora as Hora from citas as c
INNER join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as p on p.id_persona=v.persona
where c.mascota=(SELECT m.id_animal from mascotas as m
                 inner JOIN personas as per on per.id_persona=m.propietario
                 inner join usuarios as us on us.id_usuario=per.usuario
                 where m.nombre=mascota and us.nombre_usuario=usuario);
end $$


/*Buscar datos de una cita por su folio*/
use animedics 
delimiter $$
create procedure buscar_citas_folio(folio char(15))
begin
select concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Veterinario,v.cedula as Cedula,
m.nombre as Mascota,e.nombre as Especie,c.fecha as Fecha,c.hora as Hora from citas as c 
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as p on p.id_persona=v.persona
inner join mascotas as m on m.id_animal=c.mascota
inner join especie as e on e.id_especie=m.especie
where c.folio=folio;
end $$

/*Buscar las citas por determinado periodo*/
use animedics 
delimiter $$
create procedure citas_cierto_periodo (inicio date,final date)
begin
select concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Veterinario, m.nombre as Mascota, 
concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Dueño,c.fecha as Fecha, c.hora as Hora 
from citas as c
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as p on p.id_persona=v.persona
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as per on per.id_persona=m.propietario
inner join especie as e on e.id_especie=m.especie
where c.fecha BETWEEN inicio and final;
end $$

/*Buscar las citas de un veterinario*/
use animedics 
delimiter $$
create procedure citas_veterinario (usuariovet varchar(30))
begin
select c.folio as Folio,m.nombre as Mascota, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño, c.fecha as Fecha, c.hora as Hora from citas as c
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as p on p.id_persona=m.propietario
where c.veterinario=(select v.id_veterinario from veterinarios as v 
					inner join personas as per on per.id_persona=v.persona
                     inner join usuarios as us on us.id_usuario=per.usuario
                     where us.nombre_usuario=usuariovet);
end $$

/*Ver a los usuarios Veterinarios, admins o clientes del sistema*/
use animedics 
delimiter $$
create procedure buscar_usuarios_rol (rol varchar(50))
begin
select u.nombre_usuario as Nombre_usuario,concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Nombre, p.correo_contacto as Correo, p.telefono as Telefono
from personas as p
inner join usuarios as u on u.id_usuario=p.usuario
inner join rol as r on r.id_rol=u.rol
where r.nombre_rol=rol;
end $$

/*Ver las citas completadas o no completadas*/
use animedics 
delimiter $$
create procedure citas_compl (estado char(2),usuario varchar(50))
begin
select c.folio as Folio, m.nombre as Mascota, e.nombre as Especie,
concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Dueño,c.fecha as Fecha, c.hora as Hora 
from citas as c
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as p on p.id_persona=v.persona
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as per on per.id_persona=m.propietario
inner join usuarios as u on u.id_usuario=p.usuario
inner join especie as e on e.id_especie=m.especie
where c.completada=estado and u.nombre_usuario=usuario;
end $$

 /*VISTAS*/
/*Vista de todas las citas de los invitados*/
use animedics;
create view citas_invitados as
select c.folio as Folio,m.nombre as Mascota, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño,p.telefono as Telefono, 
c.fecha as Fecha, c.hora as Hora, concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Veterinario from citas as c
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as p on p.id_persona=m.propietario
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as per on per.id_persona=v.persona
where p.usuario is null;

/*Ver todas las citas de usuarios registrados en el sistema*/
use animedics;
create view citas_registrados as
select c.folio as Folio,m.nombre as Mascota, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño,p.telefono as Telefono, 
c.fecha as Fecha, c.hora as Hora, concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Veterinario from citas as c
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as p on p.id_persona=m.propietario
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as per on per.id_persona=v.persona
where p.usuario is not null; 

/*Ver todas las citas realizadas en el sistema*/
use animedics;
create view total_citas as
select c.folio as Folio,m.nombre as Mascota,e.nombre as Especie, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño,p.telefono as Telefono, 
c.fecha as Fecha, c.hora as Hora, concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Veterinario from citas as c
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as p on p.id_persona=m.propietario
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as per on per.id_persona=v.persona
inner join especie as e on e.id_especie=m.especie;

/*Ver todas las citas completadas*/
use animedics;
create view citas_completadas as
select c.folio as Folio,m.nombre as Mascota, concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño,p.telefono as Telefono, 
c.fecha as Fecha, c.hora as Hora, concat(per.nombres,' ',per.ap_paterno,' ',per.ap_materno) as Veterinario from citas as c
inner join mascotas as m on m.id_animal=c.mascota
inner join personas as p on p.id_persona=m.propietario
inner join veterinarios as v on v.id_veterinario=c.veterinario
inner join personas as per on per.id_persona=v.persona
where c.completada='SI';

/*Vista de todos los usuarios del sistema*/
create view usuarios_sistema as
select u.nombre_usuario as Nombre_usuario,concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Nombre,
p.correo_contacto as Correo, p.telefono as Telefono, r.nombre_rol as Rol
from personas as p
inner join usuarios as u on u.id_usuario=p.usuario
inner join rol as r on r.id_rol=u.rol
order by Rol;

/*Ver a todas las mascotas del sistema de usuarios registrados*/
create view mascotas_sistema_registrados as 
select m.nombre as Nombre_animal,m.edad as Edad,m.sexo as Sexo, e.nombre as Especie, 
concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño
from mascotas as m 
inner join personas as p on p.id_persona=m.propietario
inner join especie as e on e.id_especie=m.especie
where p.usuario is not null;

/*Ver masctotas de los usuarios no registrados*/
create view mascotas_sistema_noregistrados as 
select m.nombre as Nombre_animal,m.edad as Edad,m.sexo as Sexo, e.nombre as Especie, 
concat(p.nombres,' ',p.ap_paterno,' ',p.ap_materno) as Dueño
from mascotas as m 
inner join personas as p on p.id_persona=m.propietario
inner join especie as e on e.id_especie=m.especie
where p.usuario is null;

/*DISPARADORES*/
/*Eliminar todos los servicios de una cita de un servicio retirado del sistema*/
delimiter $$
create trigger eliminar_servicios before delete on servicio for each row 
BEGIN
delete from cita_servicio where servicio=old.id_servicio;
END $$ 
delimiter ;
/**/

/**/