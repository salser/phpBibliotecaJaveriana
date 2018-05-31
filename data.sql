/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : inn

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-30 19:48:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for inn_news
-- ----------------------------
DROP TABLE IF EXISTS `inn_news`;
CREATE TABLE `inn_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) DEFAULT NULL,
  `shortstory` text,
  `longstory` text,
  `published` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `author` varchar(40) DEFAULT NULL,
  `seo` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inn_news
-- ----------------------------
INSERT INTO `inn_news` VALUES ('1', '¡Bienvenidos!', '¿HabboInn estará de regreso?', '<p class=\"MsoNormal\"><em><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Despu&eacute;s de un largo descanso es hora de volver a nuestro hogar: HabboInn<br /> Han pasado meses desde que nuestro hotel cerr&oacute; sus puertas y dijo adi&oacute;s a toda su comunidad por m&uacute;ltiples razones que estuvieron fuera de nuestras manos, pero ahora estamos decididos a volver y dar lo mejor de cada uno de nosotros para que sea mejor que nunca. Ya que vendr&aacute;n nuevas sorpresas y algunas otras cosas que se dir&aacute;n a continuaci&oacute;n:</span></em></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Tendremos la versi&oacute;n m&aacute;s nueva y ser&aacute; actualizada diariamente. As&iacute; mismo tendr&aacute;s los cat&aacute;logos renovados y algunos nuevos comandos. </span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Usuarios nuevos ser&aacute;n integrados al equipo administrativo del hotel mediante diferentes maneras que ser&aacute;n publicadas a detalle en nuestra p&aacute;gina de Facebook: </span><a href=\"https://www.facebook.com/HabboInn/\"><strong><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\'; color: #e36c0a; mso-themecolor: accent6; mso-themeshade: 191;\">https://www.facebook.com/HabboInn/</span></strong></a><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">. As&iacute; como juegos, concursos y algunas notas importantes que ser&aacute;n de tu inter&eacute;s.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Ser&aacute;n integradas nuevas actividades y sistemas de entretenimiento para que cada d&iacute;a disfrutes m&aacute;s estar en el hotel. As&iacute; como tambi&eacute;n se implementar&aacute;n nuevos premios en los juegos diarios dentro del hotel y una manera m&aacute;s divertida de obtener rares .</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Los rangos se ganar&aacute;n por medio de la colaboraci&oacute;n con la publicidad. Con cierta cantidad de onlines, se har&aacute;n las entrevistas a los m&aacute;s activos en las oleadas (Tengan en cuenta que esto suceder&aacute; cuando la fase beta termine).</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Se les brindar&aacute; m&aacute;s informaci&oacute;n despu&eacute;s de que la fase beta concluya, esperamos que si ven alg&uacute;n bug o error dentro del hotel, nos lo hagan saber a cualquier integrante del equipo staff.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><strong><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Actualmente estar&aacute;s probando la versi&oacute;n beta pero pr&oacute;ximamente disfrutar&aacute;s del hotel en toda su perfecci&oacute;n</span></strong></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 8.5pt; line-height: 115%; font-family: \'Verdana\',\'sans-serif\';\">Y finalmente.. &iquest;Est&aacute;s list@ para vivir una experiencia maravillosa?</span></p>', '1469068260', 'http://bottila.com/admin/data/topstory/topStory_merger_2.gif', 'Administración', 'bienvenidos');
INSERT INTO `inn_news` VALUES ('4', 'Un nuevo comienzo...', 'Inn abre sus puertas una vez más para ti, ¿estás preparado?', '<p class=\"MsoNormal\">Hemos regresado a darlo todo para que tu estad&iacute;a en el hotel sea la mejor y te sientas a gusto con las sorpresas que tenemos preparadas para ti. Para comenzar, hablaremos sobre los grupos oficiales.</p>\r\n<ul>\r\n<li><strong>&iquest;Qu&eacute; son los grupos oficiales?</strong></li>\r\n</ul>\r\n<p class=\"MsoNormal\">Son grupos donde destaca gente que se dedican a algo en especial, tales como <em>Pixel </em>Art, <em>Voceros</em>, <em>Arquitectos, Famosos... </em>Entre otros.</p>\r\n<ul>\r\n<li><strong>&iquest;C&oacute;mo funcionan?</strong></li>\r\n</ul>\r\n<p>Su funci&oacute;n es trabajar de acorde al grupo al que pertenezca. En cada uno de ellos habr&aacute; una persona responsable que se encargar&aacute; de supervisar a los dem&aacute;s. De acuerdo al grupo en el que est&eacute;s, se te dar&aacute; una placa oficial que deber&aacute;s llevar para que los dem&aacute;s usuarios puedan reconocer tu trabajo. Cada dos semanas se promover&aacute;n a los miembros, dejando solamente a los que se esfuerzan.&nbsp;<strong>Esto no s&oacute;lo es por diversi&oacute;n, cada miembro recibir&aacute; premios correspondientes, siendo como un \"sueldo\" o por trabajo realizado. Entre ellos est&aacute;n diamantes y cr&eacute;ditos.</strong></p>\r\n<ul>\r\n<li><strong>&iquest;C&oacute;mo puedo pertenecer a ellos?</strong></li>\r\n</ul>\r\n<p><strong>Cada</strong><strong> mes</strong> se har&aacute;n unas pruebas para entrar al grupo al que quieras pertenecer, no todas las entrevistas se realizar&aacute;n en un mismo d&iacute;a. Para lograr acceder, mencionado anteriormente, se llevar&aacute;n a cabo <strong>unas entrevistas</strong> en las que se demostrar&aacute; si realmente est&aacute;s preparado para entrar. Cabe destacar que en el grupo <em>Arquitectos</em> <strong><u>no tendr&aacute;s</u></strong> que esperar hasta el pr&oacute;ximo mes para poder presentarte y entrar, sino que mediante concursos oficiales o eventos en los que su trabajo sea realizar una sala, se valorar&aacute; tambi&eacute;n la forma en la que el usuario la realiza pudiendo obtener antes de tiempo <strong>la oportunidad para entrar.</strong></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>El equipo administrativo.</strong></li>\r\n</ul>\r\n<p>Las personas que integran el equipo administrativo desarrollan una funci&oacute;n muy importante en el hotel, pues cada rango desempe&ntilde;a una funci&oacute;n que hace que el hotel se mantenga en calma, con total seguridad y garantiz&aacute;ndonos diversi&oacute;n. Como sabes, no todos los rangos desempe&ntilde;an el mismo papel. <strong>Cada rango se destaca por una placa oficial y distinta.</strong></p>\r\n<p class=\"MsoNormal\"><strong>CEO:</strong> Su funci&oacute;n es m&aacute;s compleja que los dem&aacute;s rangos, ya que ellos se encargan de la parte t&eacute;cnica del hotel. Gracias a ellos los errores que se encuentren en el hotel ser&aacute;n corregidos y las actualizaciones las estar&aacute;n implementando en todo momento, para que disfrutes completamente del hotel en su perfecci&oacute;n.</p>\r\n<p class=\"MsoNormal\"><strong>Administrador:</strong> Tanto como hacer concursos y noticias en la p&aacute;gina principal, se encargan m&aacute;s que nada de administrar el hotel como su nombre lo indica, y de supervisar a los dem&aacute;s rangos. Si tienes alg&uacute;n problema, siempre puedes preguntarles a ellos.</p>\r\n<p class=\"MsoNormal\"><strong>Game Master:</strong> Su trabajo es hacer juegos dentro del hotel para la diversi&oacute;n del usuario, y todo su papel se centra en eso: en la diversi&oacute;n. Tambi&eacute;n estar&aacute;n rondando por el hotel para solucionar todos los inconvenientes posibles.</p>\r\n<p class=\"MsoNormal\"><strong>Moderador:</strong> Deben moderar el hotel. Estas personas se encargan de resolver todos los reportes y ayudar a todos los usuarios del hotel.</p>\r\n<p class=\"MsoNormal\"><strong>Lince:</strong> Tambi&eacute;n conocido como gu&iacute;a, es quien se encarga de resolver las dudas de los usuarios. Los puedes encontrar en el <strong>Centro de Atenci&oacute;n</strong> y a veces rondando por las salas. Son expertos en el manejo del hotel, as&iacute; que no tengas miedo en preguntar.</p>\r\n<p class=\"MsoNormal\"><em>*</em><em>Aunque pertenezcan a la misma secci&oacute;n, el rango Lince se diferencia de los dem&aacute;s al no ser parte en s&iacute; del equipo administrativo. Este rango es el principal, y pertenece al equipo de colaboradores. Es importante que no te confundas.</em></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<ul>\r\n<li><strong>&iquest;C&oacute;mo puedo formar parte del equipo administrativo?</strong><em><br /></em></li>\r\n</ul>\r\n<p>Para poder pertenecer al equipo administrativo deber&aacute;s destacarte. Como estamos iniciando y necesitamos gente, a&uacute;n no se implementar&aacute; el sistema de gu&iacute;as voluntarios <em>(el cual abrir&aacute; cuando el equipo ya est&eacute; completo)</em>. Por ahora, las entrevistas se har&aacute;n cada cierta cantidad de conectados, <strong>no clones o no tendr&aacute;s la oportunidad, date cuenta que siempre revisamos la IP de los usuarios, tienen que ser conocidos o por publicidad que se queden en el hotel</strong>. Despu&eacute;s de que el equipo est&eacute; sin cupos, podremos dar bienvenida al espacio de gu&iacute;as voluntarios. <strong><u>Las entrevistas para voluntarios ser&aacute;n cada dos semanas, as&iacute; que est&eacute;n muy pendientes</u></strong>.</p>\r\n<p><em>*</em><em>Otra forma de entrar al equipo, es haciendo publicidad, que se explicar&aacute; en el siguiente punto.</em></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Publicidad.</strong><em><br /></em></li>\r\n</ul>\r\n<p>La publicidad es algo que se har&aacute; diariamente con el fin de obtener mucha gente en nuestra comunidad. <strong>Habr&aacute; un grupo de publicistas</strong>, que s&oacute;lo pertenecer&aacute;n los encargados de hacer publicidad y abrir oleadas oficiales. <em>Se destacar&aacute;n a los mejores publicistas y ellos obtendr&aacute;n m&aacute;s oportunidad a la hora de pertenecer al equipo administrativo</em>. Normalmente las oleadas se llevan a cabo cada 3 veces por semana, pero por el momento se realizar&aacute;n diariamente para subir la cantidad de conectados. Los jefes de publicidad <strong>lucir&aacute;n una placa exclusiva</strong> por lo que puedes reconocerlos f&aacute;cilmente.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>El valor del cr&eacute;dito.</strong></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"margin-left: 18.0pt;\">Anteriormente el cr&eacute;dito no tuvo mucho valor, era algo que se consegu&iacute;a cada cierto tiempo y no ten&iacute;a ninguna funci&oacute;n importante, pero eso ha cambiado. De hecho, el cr&eacute;dito m&aacute;s que nada ahora desempe&ntilde;ar&aacute; un rol importante, pues con &eacute;l puedes adquirir <strong>raros y placas</strong>. No tienes que preocuparte por comprar en el cat&aacute;logo ya que todo est&aacute; al valor de cero. Pero no solamente el cr&eacute;dito adopta un valor importante, tambi&eacute;n los diamantes que se dar&aacute;n junto con los cr&eacute;ditos, que se otorgar&aacute;n en los <strong>eventos oficiales, concursos y juegos.</strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 18.0pt;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 18.0pt;\">Finalizando esta noticia, queremos desearles una feliz estad&iacute;a. El hotel se actualizar&aacute; cada cierto tiempo, por lo tanto no se preocupen por ello. <strong>Inn termin&oacute; su fase beta</strong> por lo que puedes disfrutar de &eacute;l en su totalidad, <u>est&eacute;n atentos al evento de la apertura oficial.</u></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 18.0pt;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 18pt; text-align: left;\">Un saludo,</p>', '1478722195', 'http://meluxhotelreturn.altervista.org/images_files/TS_newsflash.png', 'Administración', 'un-nuevo-comienzo');
INSERT INTO `inn_news` VALUES ('6', 'Oleadas Publicitarias', 'Publicidad Oficial en el hotel ¿Quieres colaborarnos?', '<p style=\"text-align: center;\"><strong>Oleadas de publicidad</strong></p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">Esta publicidad consiste, en traer usuarios a nuestro hotel, aumentando la cantidad de ons por medio de publicidad constante diariamente, por estos tiempos se estar&aacute; realizando publicidad constante y diaria en el hotel \"Normalmente se har&iacute;a 3 veces en la semana\" pero este tiempo se har&aacute; constante y diariamente para s&iacute; incrementando la cantidad de usuarios conectados<strong><br /></strong></p>\r\n<p style=\"text-align: left;\">Se har&aacute;n Eventos oficiales, concursos y juegos para mantener el hotel divertido y entretenido logrando tambi&eacute;n una estrategia para la diversi&oacute;n de los usuarios nuevos y de los conectados; habr&aacute;n premiaciones como Cr&eacute;ditos, diamantes, y con especialidad placas &iexcl;Que el cr&eacute;dito ser&aacute; un objeto muy valioso que con ellos puedes comprar Megas, Rares y entre otros</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>Los encargados publicitarios</strong></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">Ellos abriran oleadas de publicidad a toda constancia para colaborar y ayudar al hotel, ellos utilizan su placa oficial con lo que los puedas reconocer; ellos se encargan de abrir los eventos publicitarios, y les estar&aacute; dando la explicaci&oacute;n como llevar a cabo la publicidad</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">La publicidad se estar&aacute; llevando a cabo, pueda ser en las tardes o en las noches dependiendo de sus horarios correspondientes:</p>\r\n<p style=\"text-align: left;\">*<em>Venezuela: 4Pm, 5pm o 7pm, 8pm</em></p>\r\n<p style=\"text-align: left;\"><em>*Espa&ntilde;a: 3pm, 4pm, o 10pm, 11pm</em></p>\r\n<p style=\"text-align: left;\"><em>*M&eacute;xico: 4pm, 5pm, o 8pm, 9pm</em></p>\r\n<p style=\"text-align: left;\"><em>*Los dem&aacute;s pa&iacute;ses ponerses de acuerdo con la Administraci&oacute;n o contactar con sus amigos</em></p>\r\n<p style=\"text-align: left;\">lo importante es hacer publicidad constante diariamente por el hotel y para s&iacute; elevando cada vez m&aacute;s los conectados y los usuarios; los publicitarios que se esfuerzen y que se vean sus logros constantes se les estar&aacute; premiando con cr&eacute;ditos y diamantes, y sobre todo se le estar&aacute; observando sus buenos logros y la capacitaci&oacute;n para pertenecer al equipo de Inn, o Colaboradores</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">Gracias por su atenci&oacute;n</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&iexcl;Fel&iacute;z d&iacute;a y estad&iacute;a en el hotel!</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>', '1481316630', 'http://bottila.com/admin/data/topstory/topStory_merger_2.gif', 'Administración', 'oleadas-publicitarias');

-- ----------------------------
-- Table structure for inn_radio
-- ----------------------------
DROP TABLE IF EXISTS `inn_radio`;
CREATE TABLE `inn_radio` (
  `current_id` int(11) NOT NULL,
  `stamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inn_radio
-- ----------------------------
INSERT INTO `inn_radio` VALUES ('0', '0');

-- ----------------------------
-- Table structure for inn_ranks
-- ----------------------------
DROP TABLE IF EXISTS `inn_ranks`;
CREATE TABLE `inn_ranks` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `badge` varchar(10) DEFAULT NULL,
  `side` varchar(2) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inn_ranks
-- ----------------------------
INSERT INTO `inn_ranks` VALUES ('1', 'Usuario', 'LLL', 'r', 'blue');
INSERT INTO `inn_ranks` VALUES ('2', 'Administrador', 'ADM', 'r', 'red');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  UNIQUE KEY `id_3` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Jose', '123456', 'joserafaeldn@gmail.com', '1');
