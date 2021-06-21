/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.19-MariaDB : Database - cafeteria2021
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cafeteria2021` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cafeteria2021`;

/*Table structure for table `carrito` */

DROP TABLE IF EXISTS `carrito`;

CREATE TABLE `carrito` (
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  KEY `id_producto` (`id_producto`),
  KEY `INDEX` (`id_usuario`) USING BTREE,
  CONSTRAINT `id_producto` FOREIGN KEY (`id_producto`) REFERENCES `inventario` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `carrito` */

insert  into `carrito`(`id_usuario`,`id_producto`,`cantidad`) values 
(2,1,2),
(2,9,1),
(2,15,1),
(2,20,1),
(2,25,1);

/*Table structure for table `detalle_pedido` */

DROP TABLE IF EXISTS `detalle_pedido`;

CREATE TABLE `detalle_pedido` (
  `id_pedido` int(10) NOT NULL AUTO_INCREMENT,
  `id_producto` int(5) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `estado` int(2) NOT NULL,
  `auditoria` date DEFAULT NULL,
  PRIMARY KEY (`id_pedido`,`id_producto`),
  KEY `fkproducto` (`id_producto`),
  KEY `fkusuario` (`id_usuario`),
  CONSTRAINT `fkproducto` FOREIGN KEY (`id_producto`) REFERENCES `inventario` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkusuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `detalle_pedido` */

insert  into `detalle_pedido`(`id_pedido`,`id_producto`,`cantidad`,`id_usuario`,`estado`,`auditoria`) values 
(12,1,1,1,1,'2021-06-20'),
(13,5,1,1,1,'2021-06-12'),
(14,11,1,1,1,'2021-06-19'),
(15,2,1,59,1,'2021-06-20'),
(16,5,1,59,1,'2021-06-20'),
(17,10,1,59,0,'2021-06-20'),
(18,26,1,59,0,'2021-06-20'),
(19,36,1,59,0,'2021-06-20');

/*Table structure for table `inventario` */

DROP TABLE IF EXISTS `inventario`;

CREATE TABLE `inventario` (
  `id_producto` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `existencia` int(5) NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `auditoria` datetime DEFAULT NULL,
  `categoria` varchar(25) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

/*Data for the table `inventario` */

insert  into `inventario`(`id_producto`,`nombre`,`descripcion`,`existencia`,`precio`,`imagen`,`auditoria`,`categoria`) values 
(1,'Espresso','60ml de espresso. Dulce con un acidez ligero',48,40,'espresso','2021-06-15 11:31:54','Café'),
(2,'Cortado','Espresso con leche texturizada 180ml',2,48,'cortado','2021-06-15 11:31:54','Café'),
(3,'CHIQUITITO','Leche condensada, espresso y leche texturizada 240ml',75,50,'chiquitito','2021-06-15 11:31:54','Café'),
(4,'Americano','Espresso con agua caliente 360ml',5,48,'americano','2021-06-15 11:33:30','Café'),
(5,'Cappuccino','Espreso con leche texturizada',1,55,'capuccino','2021-06-15 11:37:47','Café'),
(6,'Latte','Espresso con leche texturizada 480ml',2,58,'latte','2021-06-15 11:37:47','Café'),
(7,'Café con leche','Espresso con agua caliente, y leche texturizada 480ml',57,55,'cafe_con_leche','2021-06-15 11:37:47','Café'),
(8,'Latte Vainilla','Espresso, vainilla y leche texturizada 480ml',2,60,'latte_vainilla','2021-06-15 11:37:47','Café'),
(9,'Mocha','Espresso, chocolate y leche texturizada 480ml',0,60,'mocha','2021-06-15 11:37:47','Café'),
(10,'Latte Caramelo','Espresso, caramelo y leche texturizada 480ml',0,60,'latte_caramelo','2021-06-15 11:37:47','Café'),
(11,'Matcha Latte Puro','Matcha latte hecho con matcha puro 480ml',0,65,'matcha_latte_puro','2021-06-15 11:41:45','Bebidas Calientes'),
(12,'Matcha Latte Dulce','Matcha latte hecho con matcha poquito endulzado 480ml',34,65,'matcha_latte_dulce','2021-06-15 11:41:46','Bebidas Calientes'),
(13,'Doradita','Bebida con mezcla de especias con base en curcuma 360ml',0,60,'doradita','2021-06-15 11:41:46','Bebidas Calientes'),
(14,'Betabel Latte','Bebida con mezcla de especias con base de betabel 360ml',0,60,'betabel_latte','2021-06-15 11:41:46','Bebidas Calientes'),
(15,'Té','Escoges el tipo de té',0,50,'te_','2021-06-15 11:41:46','Bebidas Calientes'),
(16,'Chocolate Caliente','Chocolate estilo oaxaqueno con leche texturizada 480ml',0,60,'chocolate_caliente_','2021-06-15 11:41:46','Bebidas Calientes'),
(17,'Chai Dulce','Base de chai poco endulzado con leche texturizada 480ml',0,65,'chai_dulce','2021-06-15 11:44:39','Bebidas Calientes'),
(18,'Chai Masala','Chai natural de especies 360ml',0,55,'chai_masala','2021-06-15 11:44:39','Bebidas Calientes'),
(19,'Chai Espresso','Base de chai poco endulzado, leche texturizada y espresso 480ml',0,70,'chai_espresso','2021-06-15 11:44:39','Bebidas Calientes'),
(20,'Babyccino','Leche texturizada con sabor a tu elección 240ml',42,40,'babyccino','2021-06-15 11:44:39','Bebidas Calientes'),
(21,'Aeropress','Café hecho en manera artesanal en el Aeropress 300ml',0,50,'aeropress','2021-06-15 11:47:43','Métodos Artesanales'),
(22,'Chemex','Café hecho en manera artesanal en el Chemex 300ml',0,50,'chemex','2021-06-15 11:47:44','Métodos Artesanales'),
(23,'Prensa Francesa','Café hecho en manera artesanal en el Prensa Francesa 300ml',0,50,'prensa_francesa','2021-06-15 11:47:44','Métodos Artesanales'),
(24,'Pour Over V60','Café hecho en manera artesanal en el Hario v60 300ml',0,50,'pour_over_v60','2021-06-15 11:47:44','Métodos Artesanales'),
(25,'Cold Brew','Extracción en frío de cafpe, el extracto mezclado con agua 480ml',0,50,'cold_brew','2021-06-15 11:53:54','Bebidas Frías'),
(26,'Botella Cold Brew','Extracto puro de café 250ml',0,150,'botella_cold_brew','2021-06-15 11:53:54','Bebidas Frías'),
(27,'Espresso Tonic','Extracto puro de café 250ml',0,65,'espresso_tonic','2021-06-15 11:53:54','Bebidas Frías'),
(28,'Latte Frío en Botella','Latte frío en botella para tomar en casa con gusto 500ml',0,90,'latte_frio_en_botella','2021-06-15 11:53:55','Bebidas Frías'),
(29,'Chocolate Frío','Chocolate estilo oaxacaqueno con leche fría 480ml',0,60,'chocolate_frio','2021-06-15 11:53:55','Bebidas Frías'),
(30,'Latte Frío','Latte hecho con espresso o cold brew con leche 480ml',0,58,'latte_frio','2021-06-15 11:53:55','Bebidas Frías'),
(31,'Chai Dulce Frío','Base de Chai poco endulzado con leche fría 480ml',0,65,'chai_dulce_frio','2021-06-15 11:53:55','Bebidas Frías'),
(32,'Chai Masala Latte Frío','Chai natural de especies 480ml',0,60,'chai_masala_latte_frio','2021-06-15 11:53:55','Bebidas Frías'),
(33,'Matcha Frío','Matcha latte hecho con matcha poquito endulzado 480ml',0,65,'matcha_frio','2021-06-15 11:53:55','Bebidas Frías'),
(34,'Frappé Cappuccino','Base frappé café con espresso, leche y hielos 480ml',0,70,'frappe_cappuccino','2021-06-15 11:56:24','Bebidas Frías'),
(35,'Frappé Chai','Base frappé chai con leche y hielos 480ml',0,70,'frappe_chai','2021-06-15 11:56:24','Bebidas Frías'),
(36,'Frappé Matcha','Base frappé matcha con leche y hielos',0,70,'frappe_matcha','2021-06-15 11:56:24','Bebidas Frías'),
(37,'Topo Chico','Topo Chico Mineral 355ml',0,35,'topo_chico','2021-06-15 11:56:24','Bebidas Frías'),
(38,'Dominga Kombucha','-',0,105,'dominga_kombucha','2021-06-15 11:56:24','Bebidas Frías'),
(39,'Pudín de Chía','Pudín de chía con leche de coco, toque de miel y frutos rojos',0,60,'pudin_de_chia','2021-06-15 11:59:51','Postres'),
(40,'Yoghurt Orgánico con Granola','Yoghurt orgánico, frutos rojos y granola de la casa',0,55,'yoghurt_organico_con_granola','2021-06-15 11:59:51','Postres'),
(41,'Arroz con 3 Leches','Arroz con 3 Leches',0,55,'arroz_con_3_leches','2021-06-15 11:59:51','Postres'),
(42,'Gelatina de Queso','Gelatina de Queso',0,50,'gelatina_de_queso','2021-06-15 11:59:51','Postres'),
(43,'Pay de Limón con Merengue','Pay de limón con merengue',0,55,'pay_de_limon_con_merengue','2021-06-15 11:59:51','Postres'),
(44,'Gajos de Toronja','-',0,54,'gajos_de_toronja','2021-06-15 11:59:52','Postres'),
(45,'Panqué de Plátano Rebanada','Panqué de Plátano Rebanada',0,45,'panque_de_platano_rebanada','2021-06-15 12:05:58','Panqués-Galletas-Scones'),
(46,'Panqué de Matcha Rebanada','Panqué de Matcha Rebanada',0,55,'panque_de_matcha_rebanada','2021-06-15 12:05:58','Panqués-Galletas-Scones'),
(47,'Panqué de Nata Rebanada','Panqué de Nata Rebanada',0,45,'panque_de_nata_rebanada','2021-06-15 12:05:58','Panqués-Galletas-Scones'),
(48,'Panqué de yoghurt, limón y cardamomo rebanada','Panqué de yoghurt, limón y cardamomo rebanada',0,45,'panque_de_yoghurt_limon_y_cardamomo_rebanada','2021-06-15 12:05:58','Panqués-Galletas-Scones'),
(49,'Panqué de Plátano Completa','Panqué de Plátano Completa-Pedir con un día de anticipación',0,270,'panque_de_platano_completa','2021-06-15 12:05:58','Panqués-Galletas-Scones'),
(50,'Panqué de Matcha Completa','Panqué de Matcha Completa-Pedir con un día de anticipación',0,300,'panque_de_matcha_completa','2021-06-15 12:05:59','Panqués-Galletas-Scones'),
(51,'Panqué de Nata Completa','Panqué de Nata Completa-Pedir con un día de anticipación',0,270,'panque_de_nata_completa','2021-06-15 12:05:59','Panqués-Galletas-Scones'),
(52,'Panqué de yoghurt, limón y cardamomo completa','Panqué de yoghurt, limón y cardamomo completa-Pedir con un día de anticipación',0,270,'panque_de_yoghurt_limon_y_cardamomo_completa','2021-06-15 12:05:59','Panqués-Galletas-Scones'),
(53,'Galleta Chispas de Chocolate','Galleta Chispas de Chocolate',0,30,'galleta_chispas_de_chocolate','2021-06-15 12:09:12','Panqués-Galletas-Scones'),
(54,'Galleta de Avena','Galleta de Avena',0,25,'galleta_de_avena','2021-06-15 12:09:13','Panqués-Galletas-Scones'),
(55,'Galleta de Dulce de Leche','Galleta de Dulce de Leche',0,30,'galleta_de_dulce_de_leche','2021-06-15 12:09:13','Panqués-Galletas-Scones'),
(56,'Galleta de Nutella','Galleta de Nutella',0,30,'galleta_de_nutella','2021-06-15 12:09:13','Panqués-Galletas-Scones'),
(57,'Galleta de Nuez','Galleta de Nuez',0,40,'galletas_de_nuez','2021-06-15 12:09:13','Panqués-Galletas-Scones'),
(58,'Scones','-',0,45,'scones','2021-06-15 12:09:13','Panqués-Galletas-Scones'),
(59,'Pan de Granos Aguacate','Pan de granos, aguacate, arúgula, aceite de oliva, jitomate y sal de mar',0,120,'pan_de_granos_aguacate','2021-06-15 12:14:03','Sandwiches'),
(60,'Pan de Granos Hummus','Pan de granos, hummus, arúgula, aceite de oliva, jitomate y sal de mar',0,105,'pan_de_granos_hummus','2021-06-15 12:14:03','Sandwiches'),
(61,'Croissant con Jamón de Pavo','-',0,75,'croissant_con_jamon_de_pavo','2021-06-15 12:14:03','Sandwiches'),
(62,'Pan Blanco','Pan blanco con jamón de pavo, panela, tomate, lechuga y mayonesa chipotle',0,110,'pan_blanco','2021-06-15 12:14:03','Sandwiches'),
(63,'Baguel de Salmón','Baguel, salmón, alcaparras y queso crema',0,115,'bagel_de_salmon','2021-06-15 12:14:03','Sandwiches'),
(64,'Ciabatta Queso de Cabra','Ciabatta con queso de cabra, pepino y tapenade',0,95,'ciabatta_queso_de_cabra','2021-06-15 12:14:03','Sandwiches'),
(65,'Baguette Tomates Rojos','Baguette con tomates rojos, mozzarella fresco y pesto de la casa',0,100,'baguette_tomates_rojos','2021-06-15 12:14:03','Sandwiches'),
(66,'Baguette de Jamón Serrano','Baguette con jamón serrano, queso brie, moztaza dijon, aguacate, lechuga y aceite de oliva',0,125,'baguette_de_jamon_serrano','2021-06-15 12:14:03','Sandwiches'),
(67,'Espresso Boca Del Monte-Café en Grano','Este es el café que usamos para nuestro espresso. viene del boca del monte, veracruz, es dulce, con una acidez presente, con notas de chocolate, almendra, y miel, es muy versátil, lo puedes usar para todos los métodos de preparación de café',0,150,'espresso_boca_del_monte_cafe_en_grano','2021-06-15 12:20:07','Café en grano-Para casa'),
(68,'Café con Jiribilla Veracruz','Del productor Marco Córdoba tenemos un café de un micro lote de la Finca Corahe, en Zentla, Veracruz, es café natural, secado en camas, de la variedad sarchimor, notas de sabor: caramelo, fresa y chocolate. Café con Jiribilla es el proyecto de Carlos de la Torre',0,195,'cafe_con_jiribilla_veracruz','2021-06-15 12:20:07','Café en grano-Para casa'),
(69,'Café con Jiribilla Oaxaca','Del productor Salvador Moreno tenemos un café de la Finca el Zacatal, en Santa Cruz Acatepec, Oaxaca, es una mezcla de los variedades typica y bourbon, con un proceso lavado, que típicamente deja una taza muy fresca y limpia en la boca, notas de sabor: toronja deshidratada, flor de naranja y ciruela',0,195,'cafe_con_jiribilla_oaxaca','2021-06-15 12:20:07','Café en grano-Para casa'),
(70,'Café Finca Las Nieves','Este café es un bourbon natural, con notas de sabor: Cacao obscuro, cereza, fresa',0,175,'cafe_finca_las_nieves','2021-06-15 12:20:07','Café en grano-Para casa'),
(71,'Granola de la casa','Una bolsa de 250 gramos de nuestra granola hecha en casa',0,100,'granola_de_la_casa','2021-06-15 12:20:07','Café en grano-Para casa'),
(72,'Mama Pacha Chocolate en Barra','Mamá Pacha chocolate artesanal, Ingredientes: 75% cacao nativo, azúcar de coco 70 gramos',0,125,'mama_pacha_chocolate_en_barra','2021-06-15 12:20:07','Café en grano-Para casa'),
(73,'Tote Bag Chiquitito','-',0,250,'tote_bag_chiquitito','2021-06-15 12:20:07','Café en grano-Para casa'),
(74,'Hamburguesas BBQ','-',65,80,'hamburguesas_bbq','2021-06-15 12:21:06','Hamburguesas');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `numero` char(10) DEFAULT NULL,
  `tipo` int(1) NOT NULL,
  `saldo` double DEFAULT NULL,
  `auditoria` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nombre`,`correo`,`contrasena`,`numero`,`tipo`,`saldo`,`auditoria`) values 
(1,'Administrador','maildelproyectocafe@gmail.com','c3fb70e0148b844856fa9d1674ffaf4e',NULL,0,288,'2021-06-15 11:22:37'),
(2,'Cocinero','kitchen1@gmail.com','110169456ce5030bba735693870435ff',NULL,1,0,'2021-06-15 11:23:29'),
(3,'Juan García','benvadam@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,2,1600,'2021-06-15 11:24:27'),
(4,'Fernando Diosdado','thelvadam@outlook.com','25d55ad283aa400af464c76d713c07ad',NULL,2,250,'2021-06-15 11:25:25'),
(5,'Darío Martínez','correo@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,2,248,'2021-06-15 11:26:22'),
(59,'Diego Ivan Aragón García','iivanggarcia0@gmail.com','25d55ad283aa400af464c76d713c07ad','9512351246',2,2999617,'2021-06-20 22:18:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
