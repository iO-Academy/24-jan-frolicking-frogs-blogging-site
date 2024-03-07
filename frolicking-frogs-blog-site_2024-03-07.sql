# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.2.3-MariaDB-1:11.2.3+maria~ubu2204)
# Database: frolicking-frogs-blog-site
# Generation Time: 2024-03-07 11:17:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `author-name` varchar(40) DEFAULT 'anonymous ',
  `date-time` timestamp NOT NULL,
  `user-id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `content`, `author-name`, `date-time`, `user-id`)
VALUES
	(1,'Monday','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis vulputate metus. Suspendisse at tristique leo, vel suscipit tortor. Vivamus bibendum turpis risus, a lacinia urna porttitor semper. Phasellus eu elit eget metus porttitor hendrerit. Donec metus ligula, gravida eu commodo ac, iaculis tincidunt diam. Vivamus quis vehicula lorem. Mauris et purus hendrerit, dapibus nisl nec, cursus leo. Proin hendrerit nulla non sapien volutpat volutpat.\n\nCurabitur sed justo imperdiet, fermentum purus a, suscipit nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam faucibus, lacus ac sollicitudin elementum, neque dolor hendrerit augue, volutpat varius mi lorem vel nulla. Etiam porta, felis at egestas lacinia, nulla enim ullamcorper neque, venenatis molestie justo dui eget diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas cursus finibus. Vivamus vel enim a.','Alex','0000-00-00 00:00:00',1),
	(2,'Shopping','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis vulputate metus. Suspendisse at tristique leo, vel suscipit tortor. Vivamus bibendum turpis risus, a lacinia urna porttitor semper. Phasellus eu elit eget metus porttitor hendrerit. Donec metus ligula, gravida eu commodo ac, iaculis tincidunt diam. Vivamus quis vehicula lorem. Mauris et purus hendrerit, dapibus nisl nec, cursus leo. Proin hendrerit nulla non sapien volutpat volutpat.\n\nCurabitur sed justo imperdiet, fermentum purus a, suscipit nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam faucibus, lacus ac sollicitudin elementum, neque dolor hendrerit augue, volutpat varius mi lorem vel nulla. Etiam porta, felis at egestas lacinia, nulla enim ullamcorper neque, venenatis molestie justo dui eget diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas cursus finibus. Vivamus vel enim a.','Alex','0000-00-00 00:00:00',1),
	(3,'holidays','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis vulputate metus. Suspendisse at tristique leo, vel suscipit tortor. Vivamus bibendum turpis risus, a lacinia urna porttitor semper. Phasellus eu elit eget metus porttitor hendrerit. Donec metus ligula, gravida eu commodo ac, iaculis tincidunt diam. Vivamus quis vehicula lorem. Mauris et purus hendrerit, dapibus nisl nec, cursus leo. Proin hendrerit nulla non sapien volutpat volutpat.\n\nCurabitur sed justo imperdiet, fermentum purus a, suscipit nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam faucibus, lacus ac sollicitudin elementum, neque dolor hendrerit augue, volutpat varius mi lorem vel nulla. Etiam porta, felis at egestas lacinia, nulla enim ullamcorper neque, venenatis molestie justo dui eget diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas cursus finibus. Vivamus vel enim a.','Victoria','0000-00-00 00:00:00',2),
	(4,'plants','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis vulputate metus. Suspendisse at tristique leo, vel suscipit tortor. Vivamus bibendum turpis risus, a lacinia urna porttitor semper. Phasellus eu elit eget metus porttitor hendrerit. Donec metus ligula, gravida eu commodo ac, iaculis tincidunt diam. Vivamus quis vehicula lorem. Mauris et purus hendrerit, dapibus nisl nec, cursus leo. Proin hendrerit nulla non sapien volutpat volutpat.\n\nCurabitur sed justo imperdiet, fermentum purus a, suscipit nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam faucibus, lacus ac sollicitudin elementum, neque dolor hendrerit augue, volutpat varius mi lorem vel nulla. Etiam porta, felis at egestas lacinia, nulla enim ullamcorper neque, venenatis molestie justo dui eget diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas cursus finibus. Vivamus vel enim a.','Leon','0000-00-00 00:00:00',3),
	(5,'DIY','quite fun','anonymous ','0000-00-00 00:00:00',3),
	(6,'cooking','food','Rosina','0000-00-00 00:00:00',4),
	(7,'Glasses','they;re useful','Connonr','0000-00-00 00:00:00',5);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user-name` varchar(50) NOT NULL,
  `email-address` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `user-name`, `email-address`, `password`)
VALUES
	(21,'Emily','emily@emily.com','$2y$10$7iLKL98ODWXKZxziLcVmnOW72Ppin/uzwQSXSRvTgKGs0Qz75T2xC'),
	(22,'mike','mike@mike.com','$2y$10$crSeQeGo6dpzL/i.6hvh7ufrIZkyoWo3sEj9.4gQ75heGfbC9kvYW'),
	(23,'hellobob2','hellobob2@gmail.com','$2y$10$/ZRJag4iWcCfPBfXY8V/Q.ru63KSFHqBD6VcpOFX.uRRWXLclPUsi'),
	(24,'cheese','cheese@cheese.com','$2y$10$lhHqVY4sedGPfoeyrzUmA.Do8PvMW/x3W6k/oWhM1t39VfCPejLTS'),
	(25,'apple','apple@apple.com','$2y$10$xctc4a.ipglkowYeqtB.tORUY8VeSJZCtaVxU/reQfmtwt4sPRGja'),
	(26,'pie','pie@pie.com','$2y$10$tfDwvdEa.C51eT.OpL1PDulZxQf3U4sUzWHGbghhhQcYuNIoGu9tO'),
	(27,'pear','pear@pear.com','$2y$10$Nw4bYkGcaYqrfx4OLijlyOher11zxgASLjVJ0A5mMJ/K24uFZ3ASq'),
	(28,'banana','banana@banana.com','$2y$10$RwDTeu7nabiU2.F8IrSb9eAFLCo12sgq3t06XQ4ns5z91vXhPooau'),
	(31,'lemon','lemon@lemon.com','$2y$10$W4C7FRZM3M9XU8Jmtebj3ehGRg7BZH6rV98VUAdBQ1N./omBHq5e2'),
	(32,'plant','plant@plant.com','$2y$10$NtrZtyxcoM0t0sKhspNi1.Seu7WbUumOFUyhThA7v8TOUDSuTpRVi'),
	(33,'egg','egg@egg.com','$2y$10$xOwaZSmkIY21OkVacQrJe.zlLeFKrIsIVTU1ogDsFHtC1OhGXdUbS'),
	(34,'chicken','chicken@chicken.com','$2y$10$PAxil6GRY1yq.klOe1W.i.xt83HN64X2a/TluRssxC3Y6TBDMCv1G');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
