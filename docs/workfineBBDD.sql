-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gestor_tareas
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,'Rafa','Hola','2022-06-19 08:31:01','2022-06-19 08:31:01'),(2,'Rafa','Hola','2022-06-19 08:43:41','2022-06-19 08:43:41'),(3,'Pepe','Hola adios','2022-06-19 08:44:46','2022-06-19 08:44:46'),(4,'Autumn Murray','Quick, now!\' And.','2022-06-19 08:59:33','2022-06-19 08:59:33'),(5,'Lulu Hermiston','Hatter, \'or you\'ll.','2022-06-19 09:03:45','2022-06-19 09:03:45'),(6,'Mrs. Brisa Runte DVM','asd','2022-06-19 09:05:48','2022-06-19 09:05:48'),(7,'{\"id\":5,\"name\":\"admin\",\"email\":\"admin@admin.com\",\"email_verified_at\":null,\"created_at\":\"2022-04-16T09:37:11.000000Z\",\"updated_at\":\"2022-04-16T09:37:11.000000Z\"}','adas','2022-06-19 09:21:18','2022-06-19 09:21:18'),(8,'admin','hola','2022-06-19 09:24:04','2022-06-19 09:24:04'),(9,'admin','hola pepe','2022-06-19 09:24:36','2022-06-19 09:24:36'),(10,'admin','asd','2022-06-19 09:27:06','2022-06-19 09:27:06'),(11,'admin','sdadsa','2022-06-19 09:30:07','2022-06-19 09:30:07'),(12,'admin','sdfsdf','2022-06-19 09:31:20','2022-06-19 09:31:20');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_projects`
--

DROP TABLE IF EXISTS `comments_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_projects` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_project` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` longtext NOT NULL,
  `date_create` timestamp NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_project` (`id_project`),
  CONSTRAINT `comment_project` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_projects`
--

LOCK TABLES `comments_projects` WRITE;
/*!40000 ALTER TABLE `comments_projects` DISABLE KEYS */;
INSERT INTO `comments_projects` VALUES (3,25,5,'Prueba comentario','Esto es un comentario','2022-06-13 16:14:03',NULL),(4,25,6,'Comentario 2','comentario de prueba','2022-06-13 16:18:38',NULL);
/*!40000 ALTER TABLE `comments_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_tasks`
--

DROP TABLE IF EXISTS `comments_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_tasks` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_task` int(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` longtext NOT NULL,
  `date_create` timestamp NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_task` (`id_task`),
  CONSTRAINT `comment_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_tasks`
--

LOCK TABLES `comments_tasks` WRITE;
/*!40000 ALTER TABLE `comments_tasks` DISABLE KEYS */;
INSERT INTO `comments_tasks` VALUES (1,66,'Clase','Clase del lunes','2022-06-06 16:43:20',NULL);
/*!40000 ALTER TABLE `comments_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `description` longtext NOT NULL,
  `date_create` timestamp NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT NULL,
  `date_finally` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (25,'pr Matematicas','Prueba matematicas','2022-06-08 17:04:50','2022-06-19 14:35:01','2022-06-22 22:00:00'),(27,'Proyecto Lengua','adasda','2022-06-12 14:25:32',NULL,'2022-06-13 22:00:00'),(28,'Proyectos matemáticas','asdasd','2022-06-13 16:25:00',NULL,'2022-06-15 22:00:00');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` longtext NOT NULL,
  `date_create` timestamp NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT NULL,
  `date_finally` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_user` (`id_user`),
  CONSTRAINT `task_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (66,5,'Tarea Lengua','asdasd','2022-06-06 16:42:56',NULL,'2022-06-08 21:59:59'),(67,5,'Tarea Mates 2','adsasd','2022-06-06 17:02:02','2022-06-06 17:04:10','2022-06-15 21:59:59'),(68,5,'Tarea hoy','hoy','2022-06-12 07:47:58',NULL,'2022-06-12 21:59:59'),(69,5,'tarea hoy 2','asdasads','2022-06-12 07:51:36',NULL,'2022-06-12 21:59:59'),(70,5,'Prueba fecha 14','','2022-06-13 16:23:41',NULL,'2022-06-14 21:59:59'),(72,5,'asdasa','asdasdas','2022-06-19 14:46:56',NULL,'2022-06-25 21:59:59'),(73,5,'Prueba','asdasd','2022-06-19 14:47:01',NULL,'2022-06-24 21:59:59');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_project`
--

DROP TABLE IF EXISTS `user_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_project` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) NOT NULL,
  `id_project` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyecto` (`id_project`),
  KEY `usuario` (`id_user`),
  CONSTRAINT `proyecto` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_project`
--

LOCK TABLES `user_project` WRITE;
/*!40000 ALTER TABLE `user_project` DISABLE KEYS */;
INSERT INTO `user_project` VALUES (10,5,25),(13,5,27),(20,5,28),(38,6,25);
/*!40000 ALTER TABLE `user_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'admin','admin@admin.com',NULL,'$2y$10$E2Mz1odnqHYi/5qpjGYzJuu1SVDS6lef0nnSC8UYLYbu41j2WTY3i',NULL,'2022-04-16 07:37:11','2022-04-16 07:37:11'),(6,'Rafa','rafamcruza10@gmail.com',NULL,'$2y$10$aaJan2.YT9nbu5W.i7NL2eBtJ2yY9LS4yZd355BrbwO63BBgG.Grm','ojzmgI5ikJ624xDswQveQFvylJ4pzPv9hOZQtXx39PLZiC1jiUXbKtuTjYKj','2022-05-14 08:55:52','2022-06-19 09:42:30'),(7,'usuario1','usuario1@prueba.com',NULL,'$2y$10$kPVhFkVhyZq0ZbOzesfGAe3M4t0cxMpCqCZJHSgGDY9vwMSlzzMea',NULL,'2022-06-08 16:23:01','2022-06-08 16:23:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 19:13:49
