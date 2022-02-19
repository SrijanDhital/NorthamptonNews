-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 11:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(5) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Srijan', 'Dhital', 'srijandhital@gmail.com', '$2y$10$a7NpCITBm6DVPaHqLjnmVeOPZd4g7TOzZFdQaXgFJI5NADR5BVa9C'),
(8, 'testadminf', 'testadminl', 'testadmin@gmail.com', '$2y$10$tc00Odd9/9pj7Mx66oLDf.Fxd5pGdz3t2s6hhUfeIGNVjK1tWntmK');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `published_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `category`, `content`, `published_date`, `image`, `publisher`) VALUES
(1, '100 Days Without Trump on Twitter: A Nation Scrolls More Calmly', 'Tech News', 'That soothing sound that Gary Cavalli hears emanating from Twitter these days? It is the sound of silence — specifically, the silence of former President Donald J. Trump.\r\n\r\n“My blood pressure has gone down 20 points,” said Mr. Cavalli, 71, whose obsessive hate-following of Mr. Trump ended for good when Twitter permanently barred the former president in January. “Not having to read his latest dishonest tweets has made my life so much happier.”\r\n\r\nIt seems like just yesterday, or perhaps a lifetime ago, that Mr. Trump swaggered through the corridors of Twitter as if he owned the place, praising himself and denigrating his enemies in an endless stream of poorly punctuated, creatively spelled, factually challenged ALL-CAPS DIATRIBES that inflamed, delighted and terrified the nation to varying degrees. That all ended on Jan. 8, two days after a mob egged on by his incendiary remarks had stormed the United States Capitol in an ill-conceived effort to overturn the results of the presidential election.\r\n\r\nOne hundred days have now elapsed since the start of the ban — a move that raised questions of free speech and censorship in the social media age, upset pro-Trump Republicans and further enraged a now-former president who still refuses to accept the fact that he lost the election.\r\n\r\n', '2018-04-21', 'articleimages/18trumptwitter-jumbo.jpg', 'srijandhital@gmail.com'),
(3, 'The European Soccer', 'Sports', 'LONDON — A dozen of the world’s richest and most storied soccer clubs on Sunday announced that they had formed a breakaway European club competition that would, if it comes to fruition, upend the structures, economics and relationships that have bound global soccer for nearly a century.\r\n\r\nAfter months of secret talks, the breakaway teams — which include Real Madrid and Barcelona in Spain; Manchester United and Liverpool in England; and Juventus and A.C. Milan in Italy — confirmed their plans late Sunday. They said they planned to add at least three more founding members, hold midweek matches that would put the league in direct competition with the existing Champions League, and begin play “as soon as practicable.”\r\n\r\n“We will help football at every level and take it to its rightful place in the world,” said Real Madrid President Florentino Pérez, who was named the first chairman of what the clubs were calling the Super League.', '2019-04-21', 'articleimages/sports1.jpg', 'srijandhital@gmail.com'),
(8, 'EURO 2020: This is your quick guide to Poland - form, fixtures and players to watch', 'Sports', 'After finishing bottom of their group at the 2018 FIFA World Cup, Poland replaced their manager Adam Nawałka with Jerzy Brzęczek, and they steered safely through qualifying to reach this summer\'s tournament.\r\n\r\nBut, despite Poland winning their group with relative ease, Brzęczek was replaced in January by former Portugal international Paulo Sousa.\r\n\r\nOn the pitch, matters have been more stable for Poland and their rebuilt squad features a number of promising prospects, many of whom ply their trade in Europe\'s top five leagues.\r\n\r\nUndoubtedly all eyes will focus on star striker Robert Lewandowski, who has so far only scored twice for his country in three major tournaments.\r\n\r\nWhat is Poland\'s best previous performance at a European Championship?\r\nQuarter-finals (2016)\r\n\r\n\r\nHow did Poland qualify for EURO 2020?\r\nBy winning Group G with a record of P10 W8 D1 L1 F18 A5.\r\n\r\nWhat kind of form are Poland in?\r\nLast six games: DDLWDL\r\n\r\n\r\nWho is one Polish player you might have heard of?\r\nRobert Lewandowski: Poland\'s most-capped player and all-time leading goalscorer netted 41 times in the Bundesliga for Bayern Munich this season and was named Best FIFA Men\'s Player in 2020.\r\n\r\nWho is one Polish player who could impress at EURO 2020?\r\nPiotr Zieliński: The highly-rated Napoli midfielder scored eight goals in a career-best Serie A season and has been a regular for his country since 2013.', '2021-06-11', 'articleimages/euro 2020.jpg', 'srijandhital@gmail.com'),
(11, 'Explosive secrets rocking the Southern Baptist Convention', 'Politics', 'Demands for political loyalty. Disputes about racism. A fight between conservatives and ultraconservatives. It sounds like current debates within the Republican Party, but on Tuesday thousands of Southern Baptists will gather in Nashville to vote on issues that will shape the massive denomination’s future, including the choice of its next president.\r\n\r\nRonnie Floyd wearing a suit and tie: In this 2014 photo, the Rev. Ronnie Floyd, center, of Cross Church in northwest Arkansas, hugs the Rev. Dwight McKissic, right, of Cornerstone Baptist Church in Arlington, Tex., after Floyd was elected the new president of the Southern Baptist Convention during its annual meeting in Baltimore. (AP Photo/Steve Ruark)© Steve Ruark/AP In this 2014 photo, the Rev. Ronnie Floyd, center, of Cross Church in northwest Arkansas, hugs the Rev. Dwight McKissic, right, of Cornerstone Baptist Church in Arlington, Tex., after Floyd was elected the new president of the Southern Baptist Convention during its annual meeting in Baltimore. (AP Photo/Steve Ruark)\r\nMore than 16,000 people are expected to attend the denomination’s annual meeting, likely the largest religious gathering since the pandemic, as well as the biggest Baptist meeting in decades.\r\n\r\n\r\nWhat is especially unusual about the meeting is infighting at the highest levels of leadership that has become public in recent weeks. New details released to news media outlets have shined a light on the backroom dealings of several of its high-profile leaders.\r\n\r\nRussell Moore, who previously led the SBC’s public policy arm, recently left his position and his church for a new position at Christianity Today magazine. On his way out, two letters he sent to SBC leadership were leaked to media, in which Moore described a culture of racism and mishandling of sexual abuse claims.\r\n\r\nSince Moore’s letters were leaked, several leaders have called for a third-party investigation into how the SBC leadership has responded to the issue of sexual abuse within', '2021-06-12', 'articleimages/convension.jfif', 'srijandhital@gmail.com'),
(13, 'Democrats Craft Budget Plans as Infrastructure Talks Continue', 'Politics', 'WASHINGTON—Senior Democrats said they hoped to pass budget resolutions by the end of July, teeing up for late summer and early fall a package that could determine the scope of President Biden’s legislative ambitions on infrastructure and social programs.\r\n\r\nAt the same time, Congress will likely have to juggle key spending bills and legislation to raise the country’s borrowing limit, aligning must-pass legislation with a period of high-stakes internal negotiations.\r\n\r\nIn an interview this week, House Budget Committee Chairman John Yarmuth (D., Ky.) said he was working on a fiscal year 2022 budget resolution that he hoped to send to the House floor for a vote by the end of July. Senate Budget Committee Chairman Bernie Sanders (I., Vt.) said he hoped “we can get it done by then” as well.\r\n\r\n\r\nAlthough the budget blueprint is typically a largely symbolic document, it holds unusual significance this year. It is the necessary first step if Democrats want to pass all or part of Mr. Biden’s infrastructure and anti-poverty proposals without GOP support.\r\n\r\nSenate Democrats said this week they were moving forward with a process tied to the budget known as reconciliation that allows them to pass legislation with just a simple majority, rather than the 60 votes most bills require.', '2021-06-13', 'articleimages/ent.jfif', 'testadmin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(2, 'Tech News', 'Technology related news fall in this category'),
(3, 'Sports', 'News related to sports and games fall in this category'),
(5, 'Politics', 'News related to politics and political activities fall in this category.'),
(7, 'Entertainment', 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(5) NOT NULL,
  `article_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `date`, `user_id`, `article_id`) VALUES
(1, 'This is awesome', '2021-04-18', 1, 1),
(3, 'Please improve your articles', '2021-06-12', 2, 3),
(6, 'Something is wrong', '2021-06-13', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Srijan', 'Dhital', 'sdhital111@gmail.com', '$2y$10$0NRntc.jclVIlu8IF1ZSS.9AdDmP.14/hc8CAuFOxrCWY7Tz2Foi6'),
(4, 'User', 'Userlast', 'lastuser@gmail.com', '$2y$10$6MXZrY3ILc2VcaPUaPX0XejWsDx/XtxCxVFo7FIKgxtn.wH/BMHom'),
(7, 'testfname', 'testlname', 'testuser@gmail.com', '$2y$10$SkpDUK/kfB7iGOtkd2Rt9euJ/q/zw5sjXI2mHNqV57/EQBh4cyKya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
