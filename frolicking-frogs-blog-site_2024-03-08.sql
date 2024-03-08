# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.2.3-MariaDB-1:11.2.3+maria~ubu2204)
# Database: frolicking-frogs-blog-site
# Generation Time: 2024-03-08 09:57:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(400) NOT NULL,
  `date` timestamp NOT NULL,
  `user-id` int(11) NOT NULL,
  `post-id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `content`, `date`, `user-id`, `post-id`)
VALUES
	(1,'This is a comment on post 20','2024-03-07 17:56:06',21,20),
	(2,'This is comment on post 18','2024-03-07 17:58:01',21,18),
	(3,'This is a new comment on post 20','2024-03-07 17:58:30',21,20),
	(4,'Test adding comment','2024-03-07 20:31:55',21,20),
	(5,'Test adding comment','2024-03-07 20:32:28',21,20),
	(6,'Test adding comment','2024-03-07 20:36:57',21,20),
	(7,'This should add now as it over 10 characters','2024-03-07 20:38:46',21,20),
	(8,'This should refresh and show underneath','2024-03-07 20:48:58',21,20),
	(9,'This should refresh now','2024-03-07 20:52:19',21,20),
	(10,'success message to display','2024-03-07 20:54:14',21,20);

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date-time` timestamp NOT NULL,
  `user-id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `content`, `date-time`, `user-id`)
VALUES
	(1,'Leap into the World of Frogs: An Overview','Frogs have been around for 250 million years, pre-dating the dinosaurs. There are over 7,000 species of frogs, ranging from the tiny Gardiner\'s frog to the massive Goliath frog.','2023-10-01 10:11:09',1),
	(2,'Froggy Symphony: The Unique Calls of Frogs','Each frog species has its own distinctive call. The coqui frog from Puerto Rico, for example, has a call so loud that it can be heard up to a mile away.','2022-10-01 10:11:09',5),
	(3,'Frog Parenting: A Surprising Approach','Some frogs, like the male Darwin\'s frog, carry their tadpoles in their vocal sacs until they\'re ready to hop out fully formed.','2023-08-01 10:11:09',2),
	(4,'The Glowing Frogs of the Amazon','Meet the fantastic South American tree frog species that literally glow in the dark. This bioluminescence helps them communicate and attract mates.','2020-10-10 10:11:09',3),
	(5,'Frozen Frogs: The Art of Hibernation','Wood frogs are known for surviving being frozen solid during winter. They stop breathing and their hearts cease beating until they thaw out in spring.','2021-01-01 10:11:09',3),
	(6,'Frogs as Environmental Indicators','Amphibians are sensitive to changes in their environment, making them crucial indicators of ecosystem health. Their decline can signal broader environmental issues.','2019-07-01 10:11:09',4),
	(7,'The Odd-Eyed Wonders: Budgett\'s Frogs','Budgett\'s frogs have a unique appearance with large, flattened bodies and bulging eyes. They\'re known for their distinctive vocalizations resembling a barking dog.','2022-10-01 10:11:09',5),
	(8,'Frog Olympics: Jumping Records','The world record for the longest frog jump is held by a South African frog, which leaped an astonishing 33 feet in a single bound.','2022-03-06 14:09:56',5),
	(9,'Frogs in Medicine: The Secretions of the Poison Dart Frog','The skin secretions of some poison dart frogs contain compounds that have been used in medical research, potentially leading to new drugs and treatments.','2024-03-20 14:32:46',21),
	(10,'Camouflage Kings: The Incredible Disguises of Frogs','Many frog species have exceptional camouflage abilities. The Vietnamese mossy frog, for instance, looks like a patch of moss, helping it blend seamlessly into its surroundings.','2024-01-06 14:33:54',7),
	(11,'Froggy Friends: Symbiotic Relationships','Certain frogs form symbiotic relationships with other animals, like the tree-dwelling poison dart frog that relies on a specific species of ant for protection.','2024-03-06 14:35:00',21),
	(12,'Froggy Folklore Around the World','From ancient Egyptian goddesses to Chinese symbols of prosperity, frogs hold diverse cultural significance globally, representing luck, fertility, and transformation.','2024-03-06 14:40:26',9),
	(13,'The Jumping Dead: Resurrection Frogs','In some arid regions, certain frog species can come back to life after being dried out. This process, known as estivation, allows them to survive in harsh conditions.','2024-03-06 14:40:47',15),
	(14,'Froggy Feasts: What Frogs Eat and Are Eaten By','Frogs are both predators and prey. Some species, like the Pacman frog, are known for their voracious appetites, while others are crucial links in the food chain.','2024-03-06 14:41:17',21),
	(17,'Frogs with a Crown: The Horned Frog','Horned frogs, found in South America, have a distinctive set of \"horns\" above their eyes, resembling a crown. They are ambush predators known for their powerful jaws.','2024-03-06 17:06:18',11),
	(18,'Frog Artistry: The Masterpieces of Mudskipper Frogs','Mudskipper frogs create intricate nests from mud and plants, showcasing impressive architectural skills. These nests protect their eggs from predators and drying out.','2024-03-07 11:44:07',21),
	(19,'Frogs in Space: The NASA Tadpole Experiment','In 1994, NASA sent tadpoles into space to study the effects of microgravity on their development. The results provided insights into the impact of space travel on vertebrates.','2024-03-07 11:58:07',19),
	(20,'Frog Conservation: The Fight Against Amphibian Decline','Habitat loss, pollution, and a deadly fungal disease are threatening many frog species. Conservation efforts focus on preserving their habitats and captive breeding programs.','2024-03-07 12:03:05',21);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user-name` varchar(50) NOT NULL,
  `email-address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `user-name`, `email-address`, `password`)
VALUES
	(1,'alex','alex@gmail.com','$2y$10$1iaklqi1..Q70newcrXKoOn20dCyr/REN7PqcCxZgT9'),
	(2,'victoria','victoria@gmail.com','test2'),
	(3,'leon','leon@gmail.com','test3'),
	(4,'Rosina','rosina@gmail.com','test4'),
	(5,'Connor','connor@gmail.com','test5'),
	(6,'victoriamccusker','vrmm@hotmail.co.uk','fvabb'),
	(7,'hellobob','fddfdf@flkgdn.com','fdfddffd'),
	(8,'robertpezet','fddfdf@flkgdn.com','gsfettehte'),
	(9,'dsv','email@email.com','dad'),
	(10,'vdfb','email@email.com','dsvd'),
	(11,'fdvbf','gail@gail.com','svdvsd'),
	(12,'dfag','s2@gmail.com','dsgs'),
	(13,'dsvd','email@email.com','dvsvds'),
	(14,'fasv','rtt@gmail.com','sbesb'),
	(15,'vdsva','wve@gmail.com','ebrbre'),
	(16,'vads','grr@gmail.com','eet'),
	(17,'vasdvd','fekjb@gmail.com','eshh'),
	(18,'ss','svfg@gmail.com','grws'),
	(19,'Peter','peter@peter.com','$2y$10$2C23fKvB9ycXBUSXbIv0seVdvzFHzdZy6J8HrliRbXw'),
	(20,'Vic','vic@vic.com','Vitoria1234'),
	(21,'james','james@james.com','$2y$10$IlpMJJhgmR/F3f9M.J9LSOx5OJC.S2gRJEbq5d3onqZpcIrd64Tqu');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
