-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 28, 2022 at 02:55 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemaDB`
--
CREATE DATABASE IF NOT EXISTS `cinemaDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `cinemaDB`;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `text`) VALUES
(1, '<p> The cinema was completely renovated in 2010 in accordance with the latest world standards. Reconstruction and adaptation of the old cinema space resulted in the first multiplex in Vojvodina, with superbly equipped halls, with a total capacity of almost 1,000 seats, as well as two restaurants - Cinema and The End cafe. <p>\n\n<p> In addition to the regular film repertoire, the Cinema organizes ceremonial premieres of domestic movies, as well as the festivals FEST, Cinema City, Cinemania and Kids Fest. An important segment of our offer is the possibility of buying concessions (popcorn, nachos and various soft drinks) that the audience can consume during the screening. <p>\n\n<p> Cinemas are located near numerous lines of public and suburban transport, which allows citizens to get to the cinema quickly and cheaply. In front of the cinema and in its surroundings there are public parking areas, and in the immediate vicinity there are several organized parking lots, which facilitates the arrival of visitors who decide for their own transportation. <p>');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `phone_number` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`, `phone_number`, `city`) VALUES
(1, 'bulevar mihajla pupina 20', '123456789', 'beograd'),
(2, 'Annenstraße 32', '12343123', 'Berlin'),
(42, 'luka', '12312435', 'luka'),
(43, 'nikola', '1235413', 'nikola'),
(54, 'Květinářství garlens 15', '021543543', 'Prague'),
(55, 'Laxenburger Str. 60', '024242424', 'Vienna'),
(56, 'CompuTREND 87', '018556677', 'Budapest'),
(57, 'Dositejeva 40', '8765432', 'Beograd'),
(71, 'Partizan baza', '112345', 'Subotica'),
(72, 'AAAAAccccc', 'AAAAAccccc', 'cccccAAAA'),
(73, '123', '13', '123'),
(74, '123', '123', '123'),
(75, '123', '13', '123'),
(76, '123', '123', '123'),
(77, '123', '123', '123'),
(78, '123', '123', '132'),
(79, '1123', '1124', '1232'),
(80, 'adresa1', 'telefon', '1grad'),
(81, 'adresamarko', 'telefon', 'gradmarko'),
(82, 'ilija', 'phone', 'ilija'),
(83, 'test', '31312', 'test'),
(84, '3428 armand vanasse', '5147783802', 'Montreal');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `cinema_picture` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `about_cinema` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `address_id`, `cinema_picture`, `about_cinema`) VALUES
(1, 'Cinema Berlin', 2, '5d30aa13d48381.86338464.jpg', 'The working hours of the cinema depend on the beginning of the first screening. In short, the box office of the cinema opens half an hour before the first screening of the movie, which means during the working week from 10:30 am, and on weekends from 11:00 am. The cinema box office, as well as the box office for the sale of food and drinks, are open for up to 15 minutes after the start of the last screening.'),
(2, 'Cinema Vienna', 55, '5d30aaafccba91.56783691.jpg', 'The working hours of the cinema depend on the beginning of the first screening. In short, the box office of the cinema opens half an hour before the first screening of the movie, which means during the working week from 10:30 am, and on weekends from 11:00 am. The cinema box office, as well as the box office for the sale of food and drinks, are open for up to 15 minutes after the start of the last screening.'),
(3, 'Cinema Prague', 54, '5d30aa29340754.16000381.jpg', 'The working hours of the cinema depend on the beginning of the first screening. In short, the box office of the cinema opens half an hour before the first screening of the movie, which means during the working week from 10:30 am, and on weekends from 11:00 am. The cinema box office, as well as the box office for the sale of food and drinks, are open for up to 15 minutes after the start of the last screening.'),
(4, 'Cinema Budapest', 56, '5d30aa4a3142d9.79760837.jpg', 'The working hours of the cinema depend on the beginning of the first screening. In short, the box office of the cinema opens half an hour before the first screening of the movie, which means during the working week from 10:30 am, and on weekends from 11:00 am. The cinema box office, as well as the box office for the sale of food and drinks, are open for up to 15 minutes after the start of the last screening.');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `mail` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `phone_number` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `date_of_birth`, `mail`, `phone_number`, `address_id`, `user_name`, `password`, `points`) VALUES
(24, 'Jonas', 'Jonas', '2022-01-13', 'mail@gmail.com', '123456', 71, 'Jonas', '12345', 0),
(25, 'ilija1', 'popovic2', '1989-07-28', 'mail@gmail.com', '123456', 80, 'ilija123', '$2y$10$sExX6PNTRlwwF4gr8A28w..XuFr2gsHGV.XQ7jb9rNuS1DJYm/1Iy', 0),
(26, 'marko', 'markovic', '1999-07-28', 'mail@gmail.com', '12345', 81, 'marko', '$2y$10$H5NV6tb6zvMX2azJxv/8Eua0zM.NgNu9VdnFcgNJ.9eN22cgbU27u', 0),
(27, 'ilija', 'ilija', '1999-07-28', 'mailmail@gmail.com', '1234567', 82, 'ilija', '$2y$10$6SdXpNuHzZciS85Uc4GxtOO4fQZHDYeOHGK7JILSyLXym6iGWe5Ma', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `grade` int(11) NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `grade`, `movie_id`, `client_id`) VALUES
(13, 'my commnet', 4, 45, 24),
(16, 'bad movie', 1, 44, 26),
(18, 'I love this movie', 4, 44, 25),
(19, 'top', 2, 45, 27);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `number_seats` int(11) NOT NULL,
  `number_rows` int(11) NOT NULL,
  `cinema_id` int(10) UNSIGNED NOT NULL,
  `technology_id` int(10) UNSIGNED NOT NULL,
  `number_vip_rows` int(11) NOT NULL,
  `hall_picture` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `screen_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `name`, `number_seats`, `number_rows`, `cinema_id`, `technology_id`, `number_vip_rows`, `hall_picture`, `screen_size`) VALUES
(1, 'hall 1', 14, 10, 2, 1, 3, '5d2ef96780f679.35902907.jpg', 66),
(195, 'hall 2', 10, 13, 2, 1, 1, '5d2efa42717390.70039982.jpg', 59),
(201, 'hall 3', 10, 15, 2, 4, 1, '5d2efa575f3170.44103877.jpg', 59),
(204, 'hall 1', 10, 13, 1, 4, 2, '5d2efd7722e407.96658558.jpg', 80),
(205, 'hall 2', 5, 10, 1, 1, 1, '5d2efe01dce2f8.64930693.jpg', 40),
(206, 'hall 3', 10, 14, 1, 2, 3, '5d2efee395f363.14831585.jpg', 70),
(207, 'hall 1', 8, 8, 3, 1, 0, '5d2eff68926af7.26091823.jpg', 46),
(208, 'hall 2', 10, 16, 3, 2, 3, '5d2effacb80293.43801027.jpg', 66),
(209, 'hall 1', 12, 12, 4, 3, 2, '5d2effebde15a5.39218450.jpg', 50),
(210, 'hall 2', 10, 7, 4, 5, 2, '5d30ba976b14f4.57544202.jpg', 50),
(213, '12345', 2, 3, 2, 3, 2, '627a810e25ee61.12814942.png', 12),
(215, 'test', 15, 15, 4, 3, 2, '62824be7b76222.81416270.jpg', 123);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `date_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `client_id`, `date_log`) VALUES
(1, 24, '2022-01-18 02:19:28'),
(2, 24, '2022-01-18 02:19:35'),
(3, 24, '2022-01-18 02:27:20'),
(4, 24, '2022-01-18 08:44:24'),
(5, 24, '2022-01-18 09:00:16'),
(6, 24, '2022-01-18 09:15:33'),
(7, 24, '2022-01-18 09:15:34'),
(8, 24, '2022-01-18 09:18:54'),
(9, 24, '2022-04-04 16:13:28'),
(10, 25, '2022-05-12 19:04:13'),
(11, 25, '2022-05-12 19:09:21'),
(12, 25, '2022-05-12 19:36:44'),
(13, 26, '2022-05-12 19:52:04'),
(14, 26, '2022-05-13 18:06:11'),
(15, 25, '2022-05-14 18:14:15'),
(16, 25, '2022-05-14 20:40:38'),
(17, 25, '2022-05-14 20:54:12'),
(18, 25, '2022-05-14 20:55:00'),
(19, 25, '2022-05-16 15:00:06'),
(20, 25, '2022-05-16 15:05:32'),
(21, 25, '2022-05-16 15:25:54'),
(22, 25, '2022-05-17 15:17:10'),
(23, 27, '2022-06-01 00:11:43'),
(24, 27, '2022-06-01 00:11:43'),
(25, 27, '2022-06-01 00:21:21'),
(26, 27, '2022-06-15 13:50:04'),
(27, 27, '2022-06-22 17:32:33'),
(28, 27, '2022-06-26 23:11:23'),
(29, 27, '2022-06-26 23:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `language` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `length` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci NOT NULL,
  `trailer_youtube` text COLLATE utf8_slovenian_ci NOT NULL,
  `poster` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `beginning` date DEFAULT NULL,
  `genre` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `actors` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `language`, `length`, `description`, `trailer_youtube`, `poster`, `beginning`, `genre`, `actors`) VALUES
(43, 'Die Hard', 'English', '120', 'High above the streets of Los Angeles, a group of terrorists occupied a building, captured hostages and declared war. But one man went unnoticed ... a police officer on vacation.\r\n\r\nHe is lonely ... tired ... and the only chance for salvation. Bruce Willis plays ...', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4kXMaToMQTE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2dd041145ab2.64800466.jpg', '2020-07-10', 'Action\n    ', 'Brus Vilis'),
(44, 'Martian', 'English', '141', 'Martian: Rescue Mission is an American science fiction movie made in 2015 and directed by Ridley Scott. The main role is played by Matt Damon. the film is based on the 2011 Martian novel by Andy Weir, which he adapted for the Drew Goddard spritzer. Damon plays an astronaut who is mistaken for dead and abandoned on the planet Mars. the movie describes his struggle for survival and \"the efforts of others to save him.\" Supporting roles include Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael Peña, Kate Mara, Sean Bean, Sebastian Stan, Axel Hennie and Chiwetel Ejiofor.\r\n\r\nProducer Simon Kinberg began work on the film project after 20th Century Fox bought the rights to the novel in March 2013. Drew Goddard adapted the novel for the spritzer and was initially considered directing it, but the project did not move forward. Ridley Scott replaced Goddard, and Damon was given the role of the main character, after which the shoot was given the green light. Filming began in November 2014 and lasted about 70 days. About 20 sets were built on the sound stage in Budapest, Hungary, which is one of the largest in the world. The Wadi Rum desert in Jordan was used as a practical background for filming.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ej3ioOneTy8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2dd15da50304.10133442.jpg', '2023-08-08', 'Asi-fi                            \n    ', 'Mat Diamon'),
(45, 'Spider-Man', 'English', '130', 'After the events with the Avengers, Peter Parker and his friends go on a summer vacation to Europe. But their peaceful vacation is interrupted by a dangerous Mystery.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Nt9L1jCKGnE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2f01fd089f45.87105080.jpg', '2020-07-04', 'Adventure, Fantasy, Family    \n    ', 'Tom Holland, Jake Gyllenhaal, Zendaya, Samuel L. Jackson, Cobie Smulders'),
(46, 'Aladin', 'English', '128', '\"ALADIN\" is an exciting story about the charming young man Aladdin, who spends most of his life on the street, the brave and determined Princess Jasmine and the Spirit from the Lamp who can be the main one in determining their destiny.\r\nIn the movie \"ALADIN\", they play Will Smith, who plays the role of a charming ghost from the lamp, who is bigger than life itself, Mena Masood, who is the charming tramp Aladdin, Naomi Scott as the beautiful and determined Princess Jasmine, Marven Kenzari is the powerful wizard Jafar. Navid Negaban is the Sultan and many others.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/foyufD52aog\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2f02833ad017.58824912.jpg', '2020-05-23', 'Adventure, Fantasy, Family\n    ', 'Will Smith, Billy Magnussen, Naomi Scott, Marwan Kenzari, Mena Massoud'),
(47, 'Anabel 3', 'English', '105', 'Demonologists Ed and Lorraine are determined to save Annabel from destruction and place her in a locked room in their house. Their plan is to protect her by putting her \"safely\" behind glass with the priest\'s blessing. However, the unfortunate night begins when Anabel awakens evil spirits in the room and together they see a new target - Warren\'s ten-year-old daughter Judy and her friends.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bCxm7cTpBAs\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2f030de31c70.84218773.jpg', '2020-06-27', 'Horror, Mystery, Thriller\n    ', 'Emily Brobst, Patrick Wilson, Mckenna Grace,Katie Sarife, Vera Farmiga'),
(48, 'Man in black', 'English', '115', 'The people in black have always protected the earth from space enemies. In the latest adventure, the enemy is hidden among themselves.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/F3lJwV7ZIIk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2f03731fd322.83770050.jpg', '2020-06-13', 'Action, Comedy, Science fiction\n    ', 'Chris Hemsworth, Rebecca Ferguson, Tessa Thompson, Liam Neeson, Emma Thompson'),
(49, 'Fast and Furious ', 'English', '136', 'Ever since the law envoy, big Hobbes (Dwayne Johnson), a loyal agent of the US Secret Service and an outlaw who has problems with the law, Shaw (Jason Statham), a former operative of elite units of the British army, first met in the movie HELL STREETS 7, 2015 year, the two of them do not stop exchanging insults and heavy blows in attempts to overcome each other.\r\nBut the moment he is promoted, cyber-genetic anarchist Brixton (Idris Elba) grabs a secret biological threat that can wipe out humanity forever and hires a brilliant, fearless and mischievous MI6 agent (Vanessa Kirby), who is actually the sister of Deckard Shaw, two sworn enemies Hobbes and Shaw will have to unite to defeat the only man who is perhaps more dangerous than the two of them.\r\nmovie HOBBY AND SHO explosively opens a new chapter in the movie universe HELL STREETS, spreading across the planet, from Los Angeles to London and from the toxic areas of Chernobyl to the gorgeous beauty of Samoa.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HZ7PAyCDwEg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2f0439ee0633.47324969.png', '2020-08-01', 'action, adventure\n    ', 'Dwayne Johnson, Jason Statham, Idris Elba, Vanessa Kirby, Helen Mirren'),
(50, 'Once upon a time ... in Hollywood', 'English', '162', '\"Once Upon a Time in Hollywood\" is a true Hollywood story about an actor and his double who set out to find their place under the sun in the movie industry. Their journey takes place at the height of hippie Hollywood, back in 1969 in LA.\r\nThe main characters in the film, Rick Dalton (Leonardo DiCaprio), the former star of a western TV series and his longtime double Cliff Booth (Brad Pitt), are fighting for their success in the world capital of the film industry, which they no longer recognize, during the last twitches of golden Hollywood. But Rick has a popular neighbor - Sharon Tate (Margo Robbie).', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ELeMaP8EPAA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2f04b3400053.06784381.png', '2023-08-15', 'Drama\n    ', 'Leonardo DiCaprio, Brad Pitt, Margot Robbie, Luke Perry'),
(51, 'Toy story 4', 'English', '100', 'When Forki, a toy that Bonnie made as part of the task, declares himself a scumbag and not a toy, Woody believes that his role is to help Forki accept that he is a toy. But when Bonnie takes a whole gang of toys on a family trip, Woody will find himself in an unexpected adventure in which he will meet his long-lost friend, Bo Pipp, again. After many years spent alone, her adventurous spirit and life on the move changed her delicate, porcelain exterior. Woody and Bo will realize that when they come to life as toys, they are completely different, but also that this is one of their least worries.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wmiIUN-7qhE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d2f05f08df649.02667937.jpg', '2020-09-19', 'animated, adventure, comedy\n    ', 'Toys... duh'),
(52, 'Lion king', 'Srpski', '117', 'Disney\'s \"LION KING\" directed by John Favreau will take us to the African savannah, where the future king was born. Simba adores his father, King Mufasa, and heartily accepts his royal destiny. But not everyone in the kingdom is looking forward to the birth of a new baby. Scar, Mufasa\'s brother and heir to the throne until then, has other plans. The struggle for the kingdom is marked by betrayal, tragedy and drama that will end in Simba\'s exile. With the help of new, unusual and interesting friends, Simba will have to find a way to grow up and return what belongs to him at birth.\r\nAmong the fantastic actors who borrowed voices are Donald Glover (Nikola Šurbanović) as Simba, Beyonce Knowles Carter (Andrijana Oliverić) as Nala, James Earl Jones (Vladan Živković) as Mufasa, Cujitel Edžiofor (Dragan Vujić Vujke) as Skar, Set Rogen (Marco Gvero) as Pumbaa and Billy Eichner (Milan Antonic) as Timon. Using new and bold techniques to revive some of the most beloved characters, now in a completely new way, Disney\'s \"LION KING\" will roar in cinemas from July 17, 2019.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/F-2UCgfcNAM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d30710035e305.68606764.png', '2020-07-17', 'Animated, Comedy, Adventure    \n    ', 'Donald Glover, Chiwetel Ejiofor, Seth Rogen'),
(53, 'Seacret life of pets', 'English', '120', 'It is a sequel to the blockbuster comedy from 2016, which had the best weekend opening ever, when it comes to the original movie, animated or both. The new chapter is full of specific humor that is a trademark of Illumination Studies. It explores the emotional life of our pets, the deep bonds that unite them with families who love them and answers the question that has always intrigued every owner: What do our pets really do when we are not at home.\r\nTerrier Max is facing great upheavals in his life. His owner is now a married woman and has a son Liam. Max is so worried about the boy\'s safety that he started getting tics on a nerve base. On a family vacation, on a farm outside the city, Max and his friend Duke meet a cow intolerant of dogs, a hostile fox and a terrifying turkey, which only intensifies Max\'s anxiety. Fortunately, Max will receive important advice from a veteran of the farm, Rooster\'s dog. He will push Max to face his fears, find his inner alpha male and give Liam a little freedom.\r\nMeanwhile, in the city, while her owner is absent, the brave Pomeranian Divna, with the help of her friend, the cat Chloe, who discovered the joy of catnip, tries to save Max\'s favorite toy that was in an apartment full of cats.\r\nAnd the crazy but cute bunny Grudvica lives in the delusion that he is a superhero, from the moment his owner Molly started dressing him in superhero pajamas. But when Daisy, a fearless shit, appears and asks for Grudvic\'s help because of a dangerous mission, he will have to find the courage to become the hero he just pretended to be.\r\nCan Max, Divna and Grudvica and the rest of the company find courage in themselves and face their biggest fears', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/i-80SGWfEjM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5d30c4a4b6f378.73025477.jpg', '2023-08-08', 'Animated, Comedy, Adventure    \n    ', 'Patton Oswalt, Eric Stonestreet, Kevin Hart'),
(64, 'test', 'test language', '', ' this is movie this is movie this is movie this is moviethis is movie this is movie this is movie this is movie this is movie this is movie this is movie this is movie', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/f_SKIXRAeOA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '62820e7f652276.66268098.jpg', '2022-04-28', 'dadjkwald,awdkjwalkd,jiawldw,\n          ', '123,1423,15341');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `text`) VALUES
(1, '<p> All discounts are counted at the checkout. </p>\n<p> Ticket prices for 3D projections include a spectacle accessory. </p>\n<p> All prices include VAT. </p>\n<p> Reduced prices on weekdays do not apply to public holidays. </p>\n<p> Organized groups of 15 or more visitors get a discount on tickets in the amount of 50 dinars. </p>\n<p> On Mondays and Wednesdays, students can get a discount on the purchase of a ticket in the amount of 50 dinars with a valid index. </p>\n<p> Children under the age of 2 do not pay for a cinema ticket. </p>\n<p> Wheelchair users, along with a companion, pay one ticket at the regular price instead of two. </p>\n<p> The opening hours of the cinema box office are every day from 09:00 to 23:00 </p>');

-- --------------------------------------------------------

--
-- Table structure for table `projection`
--

CREATE TABLE `projection` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `projection_date` datetime NOT NULL,
  `hall_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `projection`
--

INSERT INTO `projection` (`id`, `movie_id`, `projection_date`, `hall_id`) VALUES
(110, 45, '2022-01-19 12:30:00', 204),
(111, 44, '2022-01-20 14:30:00', 210),
(112, 46, '2022-01-19 15:30:00', 1),
(113, 44, '2022-04-05 17:30:00', 206),
(114, 48, '2022-04-05 16:30:00', 208),
(118, 44, '2022-05-13 15:30:00', 205),
(119, 45, '2022-05-14 16:30:00', 209),
(121, 52, '2022-05-15 15:30:00', 1),
(124, 44, '2022-05-19 16:30:00', 209),
(125, 49, '2022-05-20 13:40:00', 215),
(126, 43, '2022-05-20 15:30:00', 204),
(127, 44, '2022-05-20 15:30:00', 204),
(128, 46, '2022-05-20 15:30:00', 204),
(129, 47, '2022-05-20 15:30:00', 204),
(130, 48, '2022-05-20 15:30:00', 204),
(131, 50, '2022-05-20 15:30:00', 204),
(132, 51, '2022-05-20 15:30:00', 204),
(133, 53, '2022-05-20 15:30:00', 204),
(134, 52, '2022-05-21 15:30:00', 204),
(135, 50, '2022-05-21 15:30:00', 204),
(136, 45, '2022-07-13 16:30:00', 215),
(138, 45, '2022-07-25 15:30:00', 204),
(139, 46, '2022-07-26 15:30:00', 209),
(140, 43, '2022-07-27 16:30:00', 209),
(141, 49, '2022-07-28 15:52:00', 207),
(142, 49, '2022-07-29 15:57:00', 207),
(143, 49, '2022-07-20 15:59:00', 207),
(144, 47, '2022-07-19 16:02:00', 215),
(145, 47, '2022-07-13 23:12:00', 215),
(147, 44, '2022-06-18 16:47:00', 1),
(148, 44, '2022-07-22 16:47:00', 209),
(149, 50, '2022-07-22 16:48:00', 206);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `projection_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `reservation_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `projection_id`, `client_id`, `reservation_date`, `active`) VALUES
(60, 110, 24, '2022-01-18', 1),
(61, 111, 24, '2022-01-18', 1),
(62, 113, 24, '2022-04-04', 1),
(64, 118, 25, '2022-05-12', 1),
(65, 118, 25, '2022-05-12', 1),
(66, 118, 25, '2022-05-12', 1),
(67, 118, 25, '2022-05-12', 1),
(68, 118, 25, '2022-05-12', 1),
(69, 118, 26, '2022-05-12', 1),
(70, 124, 25, '2022-05-16', 1),
(71, 125, 25, '2022-05-16', 1),
(72, 126, 25, '2022-05-17', 1),
(73, 136, 27, '2022-05-31', 1),
(75, 136, 27, '2022-06-22', 1),
(76, 140, 27, '2022-06-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reserved_place`
--

CREATE TABLE `reserved_place` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_seat` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `row_seat` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `reserved_place`
--

INSERT INTO `reserved_place` (`id`, `number_seat`, `row_seat`, `reservation_id`) VALUES
(190, '3', '6', 60),
(191, '4', '6', 60),
(192, '5', '6', 60),
(193, '6', '6', 60),
(194, '7', '6', 60),
(195, '6', '4', 61),
(196, '5', '4', 61),
(197, '4', '4', 61),
(199, '5', '5', 61),
(200, '6', '5', 61),
(201, '6', '5', 62),
(202, '6', '6', 62),
(203, '6', '7', 62),
(217, '2', '1', 66),
(218, '2', '2', 66),
(219, '4', '3', 66),
(220, '4', '4', 66),
(221, '2', '3', 66),
(222, '2', '4', 66),
(223, '4', '2', 66),
(224, '4', '1', 66),
(225, '4', '5', 66),
(226, '2', '5', 66),
(227, '2', '6', 66),
(228, '4', '6', 66),
(233, '2', '3', 67),
(234, '2', '4', 67),
(235, '4', '2', 67),
(236, '4', '1', 67),
(237, '4', '5', 67),
(238, '2', '5', 67),
(239, '2', '6', 67),
(240, '4', '6', 67),
(241, '3', '1', 68),
(244, '3', '7', 69),
(245, '3', '8', 69),
(246, '3', '9', 69),
(256, '5', '9', 70),
(257, '6', '6', 71),
(258, '8', '6', 71),
(259, '8', '7', 71),
(260, '8', '8', 71),
(261, '7', '8', 71),
(262, '7', '7', 71),
(264, '9', '8', 71),
(265, '9', '9', 71),
(266, '10', '9', 71),
(267, '10', '8', 71),
(268, '10', '7', 71),
(269, '10', '6', 71),
(270, '9', '6', 71),
(271, '7', '6', 71),
(272, '7', '9', 71),
(273, '8', '9', 71),
(274, '6', '9', 71),
(275, '6', '8', 71),
(276, '6', '7', 71),
(277, '5', '7', 71),
(278, '5', '8', 71),
(279, '5', '9', 71),
(280, '5', '6', 71),
(284, '7', '8', 72),
(285, '6', '8', 72),
(286, '5', '8', 72),
(287, '7', '6', 73),
(288, '8', '6', 73),
(289, '9', '6', 73),
(290, '10', '6', 73),
(291, '10', '7', 73),
(292, '9', '7', 73),
(293, '8', '7', 73),
(294, '7', '7', 73),
(301, '7', '9', 75),
(302, '8', '9', 75),
(303, '5', '9', 75),
(304, '6', '9', 75),
(305, '6', '10', 75),
(306, '6', '11', 75),
(307, '6', '12', 75),
(308, '8', '12', 75),
(309, '5', '4', 76),
(312, '8', '4', 76),
(313, '8', '5', 76),
(314, '7', '5', 76);

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `name`, `price`, `discount`) VALUES
(1, 'digital 2d', 5, 15),
(2, 'digital 3d', 10, 10),
(3, 'imax 3d', 15, 20),
(4, 'imax', 23, 20),
(5, 'MX4D ', 20, 15),
(6, 'RealD 3D', 30, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cinema_address1_idx` (`address_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client_address1_idx` (`address_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_movie1_idx` (`movie_id`),
  ADD KEY `fk_comment_client1_idx` (`client_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hall_cinema1_idx` (`cinema_id`),
  ADD KEY `fk_hall_technology1_idx` (`technology_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_client1` (`client_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projection`
--
ALTER TABLE `projection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projection_movie1_idx` (`movie_id`),
  ADD KEY `fk_projection_hall1_idx` (`hall_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservation_projection1_idx` (`projection_id`),
  ADD KEY `fk_reservation_client1_idx` (`client_id`);

--
-- Indexes for table `reserved_place`
--
ALTER TABLE `reserved_place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserved_place_reservation1_idx` (`reservation_id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projection`
--
ALTER TABLE `projection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `reserved_place`
--
ALTER TABLE `reserved_place`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `fk_cinema_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `fk_comment_movie1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `fk_hall_cinema1` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `fk_hall_technology1` FOREIGN KEY (`technology_id`) REFERENCES `technology` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `projection`
--
ALTER TABLE `projection`
  ADD CONSTRAINT `fk_projection_hall1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_projection_movie1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `fk_reservation_projection1` FOREIGN KEY (`projection_id`) REFERENCES `projection` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reserved_place`
--
ALTER TABLE `reserved_place`
  ADD CONSTRAINT `fk_reserved_place_reservation1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
