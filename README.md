# PhotoGenics
A simple way for artists to sell their work.

# Dependencies
This project is dependant on:
- <a href="https://getcomposer.org/">Composer</a>
- PHP version 5.4 or greater

# Installation
<b>Project Setup</b> <br />
Step 1. `composer update` <br />
Step 2. `php artisan migrate` <br />
Step 3. `php artisan serve` <br /><br />

<b>Insert Existing Data</b> <br />
Insert Users:
```
INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_active`, `stripe_id`, `stripe_subscription`, `stripe_plan`, `last_four`, `trial_ends_at`, `subscription_ends_at`)
VALUES
	(1,'damasio','gerena','dgerena','darktheman2000@yahoo.com','$2y$10$RsUfxIxLGM4RaKZdKzN1S.l6mEg63.g.FoI7.9WXlhDQOv3OSe9RG','6MIEAgtkSauVjtbtGJX8XlLZf31jSRVx4kXQiZAhWR67AvYSGuRHJ0jfdxIb','2015-01-19 06:27:17','2015-01-19 06:27:17',0,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,'A','Studnicky','astudnicky','astud@somewhere.com','$2y$10$ZXo43GlLdMTyVWzMfmdbVesZnqt3O9s0WiAmiLFCFMEHzB9ygS/jO','RtwhCNmYOpuoUg7bTqkFymZdE7mmpgMXdBb3l4UByIANnOfFYjGFt0aXd5Xq','2015-01-19 18:27:46','2015-01-19 18:27:46',0,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,'L','Roberts','lroberts','lroberts@someplace.com','$2y$10$QrGCExBCXKP0RIbErngYz.fvQcnhE5xxWgMQdjiMaP81DCQIJhnBe',NULL,'2015-01-19 18:53:53','2015-01-19 18:53:53',0,NULL,NULL,NULL,NULL,NULL,NULL);
```

Insert Prints:
```
INSERT INTO `prints` (`id`, `path`, `user_id`, `title`, `category`, `price`, `dimensions`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'/uploads/dgerena/AbstractCatGrass.jpg',1,'Cat made of Grass','animals','2000','20\" x 20\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:27:45','2015-01-19 06:27:45'),
	(2,'/uploads/dgerena/AbstractHumanity.jpg',1,'Human Art of Masking Themselves','people','4000','30\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:29:13','2015-01-19 06:29:13'),
	(3,'/uploads/dgerena/abstractPAperBlock3D.jpg',1,'Paper craft art ','people','100','20\" x 20\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:30:50','2015-01-19 06:30:50'),
	(4,'/uploads/dgerena/ChainLinkLocks.jpg',1,'The chains that bind us','people','200','20\" x 20\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:32:04','2015-01-19 06:32:04'),
	(5,'/uploads/dgerena/CreativeExpositionViaChess.jpg',1,'Warrior Queen','people','2000','12\" x 12\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:40:51','2015-01-19 06:40:51'),
	(6,'/uploads/dgerena/GeometricLightCraft.jpg',1,'Paper craft art Defined through  light and folds','people','150','12\" x 12\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.12','2015-01-19 06:41:36','2015-01-19 06:41:36'),
	(7,'/uploads/dgerena/lightRightingTunnel.jpg',1,'Photo of light art','people','1040','99\" x 99\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:42:41','2015-01-19 06:42:41'),
	(8,'/uploads/dgerena/LydiardPhoto.jpg',1,'Lydiard photo creation','art','230','22\" x 22\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:43:56','2015-01-19 06:43:56'),
	(9,'/uploads/dgerena/MedusasEnd.jpg',1,'Medusas End','people','200','50\" x 50\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:45:37','2015-01-19 06:45:37'),
	(10,'/uploads/dgerena/OrbOfRefraction.jpg',1,'Orb Reflection','people','200','22\" x 32\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:50:54','2015-01-19 06:50:54'),
	(11,'/uploads/dgerena/PaperMakeHouseOfStairs.jpg',1,'Paper Art House of Stairs','people','300','20\" x 20\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:52:17','2015-01-19 06:52:17'),
	(12,'/uploads/dgerena/RecylcledArt.jpg',1,'Great recycling of bottles','people','3000','10\" x 10\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:55:45','2015-01-19 06:55:45'),
	(13,'/uploads/dgerena/StoneWorks.jpg',1,'Stone Standing Firm in many forms','people','400','30\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:56:52','2015-01-19 06:56:52'),
	(14,'/uploads/dgerena/WomanRooftopMoon.jpg',1,'Womans reflection on her own thoughts.','people','500','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 06:58:55','2015-01-19 06:58:55'),
	(15,'/uploads/dgerena/AbstractSelf.jpg',1,'Self abstraction','people','10.01','10\" x 10\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 07:00:29','2015-01-19 07:00:29'),
	(16,'/uploads/dgerena/CatUponBench.jpg',1,'A wonderful fluffy cat going about its day.','animals','60','10\" x 20\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 07:01:23','2015-01-19 07:01:23'),
	(17,'/uploads/dgerena/DogBlackAndWhite.jpg',1,'Black and white Photo of a faily dog','animals','300','30\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:04:53','2015-01-19 18:04:53'),
	(18,'/uploads/dgerena/RidingTogetherGrayScale.jpg',1,'Rider and there companions','animals','3000','30\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:05:45','2015-01-19 18:05:45'),
	(19,'/uploads/dgerena/SheepPhoto.jpg',1,'Baaa says the sheep','animals','100','20\" x 20\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:06:13','2015-01-19 18:06:13'),
	(20,'/uploads/dgerena/AbstractCities.jpg',1,'Going Bananas in the city','people','30','30\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:07:54','2015-01-19 18:07:54'),
	(21,'/uploads/dgerena/BridgeIntheHills.jpg',1,'Bridge Standing Firm Before the Sun','nature','30','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:08:39','2015-01-19 18:08:39'),
	(22,'/uploads/dgerena/BrightLightDowntown.jpg',1,'Bright future begins here','art','400','33\" x 03\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:09:38','2015-01-19 18:09:38'),
	(23,'/uploads/dgerena/BuildingTheSkyline.jpg',1,'Time stamp of Growth','art','6000','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:10:29','2015-01-19 18:10:29'),
	(24,'/uploads/dgerena/CathedralNight.jpg',1,'Cathedral in twilight','art','500','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:10:57','2015-01-19 18:10:57'),
	(25,'/uploads/dgerena/CityRiverFlow.jpg',1,'The River Never Sleeps','nature','400','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:11:28','2015-01-19 18:11:28'),
	(26,'/uploads/dgerena/FountainByDusk.jpg',1,'Beautiful Night Frame','art','300','30\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:12:06','2015-01-19 18:12:06'),
	(27,'/uploads/dgerena/GuardedArchway.jpg',1,'Guardians on Archway','art','600','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:12:45','2015-01-19 18:12:45'),
	(28,'/uploads/dgerena/HolySquare.jpg',1,'Ancient Protectors Stand atop','art','400','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:13:24','2015-01-19 18:13:24'),
	(29,'/uploads/dgerena/LightFunWithCubes.jpg',1,'Neon cubism','art','600','56\" x 56\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:15:04','2015-01-19 18:15:04'),
	(30,'/uploads/dgerena/LondonBridge.jpg',1,'Majestic London Bridge','art','600','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:15:38','2015-01-19 18:15:38'),
	(31,'/uploads/dgerena/MajesticCieling.jpg',1,'Beautiful Vaulted Ceiling','art','20000','30\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:17:42','2015-01-19 18:17:42'),
	(32,'/uploads/dgerena/NaturalOverBelvadere.jpg',1,'Time waits for no man.','nature','400','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:18:14','2015-01-19 18:18:14'),
	(33,'/uploads/dgerena/NiceBuildingWithStatuetes.jpg',1,'Castle To Tourism','art','60000','60\" x 60\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:21:22','2015-01-19 18:21:22'),
	(34,'/uploads/dgerena/OrbitalStand.jpg',1,'Abstract Sat Dish','art','5000','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:24:09','2015-01-19 18:24:09'),
	(35,'/uploads/dgerena/PaintedCityBlock.jpg',1,'Downtown Painting','people','40','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:26:27','2015-01-19 18:26:27'),
	(36,'/uploads/astudnicky/ReflectiveBar.jpg',2,'Nice Bar Idea','art','60000','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:28:31','2015-01-19 18:28:31'),
	(37,'/uploads/astudnicky/ReflectiveCityScape.jpg',2,'Reflective Skyline','people','40','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:29:24','2015-01-19 18:29:24'),
	(38,'/uploads/astudnicky/SeatleSkyline.jpg',2,'Seatle at its best.','people','200','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:29:59','2015-01-19 18:29:59'),
	(39,'/uploads/astudnicky/SkyLineArchway.jpg',2,'Barrier Scraping the sky','art','600','49\" x 49\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:30:51','2015-01-19 18:30:51'),
	(40,'/uploads/astudnicky/SquishyBall.jpg',2,'Funnest building Ever','people','400','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:35:12','2015-01-19 18:35:12'),
	(41,'/uploads/astudnicky/WarmBells.jpg',2,'Ancient Bell Structure','art','600','40\" x 60\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:36:19','2015-01-19 18:36:19'),
	(42,'/uploads/astudnicky/WinterOnFarm.jpg',2,'Sweet Home','art','300','40\" x 45\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:36:55','2015-01-19 18:36:55'),
	(43,'/uploads/astudnicky/ArtistAndMedium.jpg',2,'Artist Freehanding','art','300','40\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:37:44','2015-01-19 18:37:44'),
	(44,'/uploads/astudnicky/BallarinaPracticing.jpg',2,'Practicing perseverence ','art','400','40\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:40:28','2015-01-19 18:40:28'),
	(45,'/uploads/astudnicky/BallroomToRemember.jpg',2,'Happiness  Expressed','people','300','40\" x 25\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:40:59','2015-01-19 18:40:59'),
	(46,'/uploads/astudnicky/DrinkingLonelyNight.jpg',2,'NightCap Aftermath','people','400','40\" x 35\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:41:52','2015-01-19 18:41:52'),
	(47,'/uploads/astudnicky/CorveteAtShow.jpg',2,'Dreams Are Made Of','people','48000','40\" x 35\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:42:53','2015-01-19 18:42:53'),
	(48,'/uploads/astudnicky/AbstractWomenJugglingLife.jpg',2,'Roles of life','people','600','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:43:31','2015-01-19 18:43:31'),
	(49,'/uploads/astudnicky/BloomingUpClose.jpg',2,'Time in a single twig','nature','300','40\" x 50\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:44:00','2015-01-19 18:44:00'),
	(50,'/uploads/astudnicky/doge-pattern-27481-1440x900.jpg',2,'Doge Doge Doge','animals','9001','40\" x 30\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:50:09','2015-01-19 18:52:29'),
	(51,'/uploads/astudnicky/dogehd.jpg',2,'High Quality Doge','animals','1337','50\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:50:58','2015-01-19 18:50:58'),
	(52,'/uploads/astudnicky/dogepng.jpeg',2,'Just the Doge','animals','300','40\" x 60\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:51:46','2015-01-19 18:51:46'),
	(53,'/uploads/lroberts/ManStatueWithinSunlight.jpg',3,'Midday thought','art','4000','40\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:54:47','2015-01-19 18:54:47'),
	(54,'/uploads/lroberts/Oriental_Dragon.jpg',3,'Dragon Of the East','art','400','60\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:55:31','2015-01-19 18:55:31'),
	(55,'/uploads/lroberts/BeveragePrint.jpg',3,'Foaming for Life','people','300','40\" x 60\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:56:46','2015-01-19 18:56:46'),
	(56,'/uploads/lroberts/CarnivalAtNight.jpg',3,'Fun night out','people','400','60\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:57:15','2015-01-19 18:57:15'),
	(57,'/uploads/lroberts/cigarettes.jpg',3,'Health Distortion','art','200','60\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 18:57:53','2015-01-19 18:57:53'),
	(58,'/uploads/lroberts/MetaMeltMind.jpg',3,'Giving your all','art','300','30\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 19:00:18','2015-01-19 19:00:18'),
	(59,'/uploads/lroberts/MetaThoughtOnWall.jpg',3,'Off with her head','art','10','60\" x 40\"','A Piece created with the feelings and soul of its artist in every movement. All sales final shipping to be handled on a case by case basis.','2015-01-19 19:00:56','2015-01-19 19:00:56');
```

Insert Sessions:
```
INSERT INTO `sessions` (`id`, `payload`, `last_activity`)
VALUES
	('a79c1a7073082de785e46223ef31f9b9f5e66440','YTo0OntzOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJPU1BpYmhsdGRKdzNKMHNXOWlIWjlJSTQ3Q1d2NG54c2xqMDlDZGFnIjtzOjM4OiJsb2dpbl84MmU1ZDJjNTZiZGQwODExMzE4ZjBjZjA3OGI3OGJmYyI7aTozO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDIxNjk0MTIzO3M6MToiYyI7aToxNDIxNjQ4ODA3O3M6MToibCI7czoxOiIwIjt9fQ==',1421694123);
```

# Developers
<b>Front End:</b>
- Lindsay Roberts<br />

<b>Back End:</b>
- Lindsay Roberts
- Andrew Studnicky
- Eli Damasio

# Get in Touch
For all inquiries, please contact on of the developers below:<br>
- Lindsay Roberts | lrroberts0122@fullsail.edu
- Andrew Studnicky | A.J.Studnicky@gmail.com
- Eli Damasio | darkstar87d@gmail.com
