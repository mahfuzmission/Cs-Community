-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 11:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cscommunity`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `catagory_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `catagory_name`) VALUES
(1, 'AI'),
(2, 'Data Structure'),
(3, 'Algorithm'),
(4, 'Neural Network'),
(5, 'Data Mining'),
(6, 'Networking'),
(7, 'Web Tech'),
(8, 'web Design'),
(9, 'Web Development'),
(10, 'Search Engine Optimization'),
(11, 'SEO'),
(12, 'C'),
(13, 'C++'),
(14, 'Java'),
(15, 'C#'),
(16, 'Php'),
(17, 'JavaScript'),
(18, 'html'),
(19, 'css'),
(20, 'Bootstrap'),
(21, 'python'),
(22, 'AJAX');

-- --------------------------------------------------------

--
-- Table structure for table `chat_box`
--

CREATE TABLE `chat_box` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `msg_time` datetime NOT NULL,
  `msg` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_text` mediumtext NOT NULL,
  `author_user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_text`, `author_user_id`, `parent_id`, `time`, `post_id`) VALUES
(8, 'JavaScript and Java are completely different languages, both in concept and design.  JavaScript was invented by Brendan Eich in 1995, and became an ECMA standard in 1997. ECMA-262 is the official name of the standard. ECMAScript is the official name of the language. ', 1, 0, '2017-09-19 01:09:22', 32),
(9, 'ok..thanks', 1, 0, '2017-09-19 01:09:14', 32),
(10, 'Great!!!!', 1, 0, '2017-09-19 07:09:48', 43),
(11, 'wow!!!!', 1, 0, '2017-09-19 07:09:21', 42),
(12, 'WoW!!!!', 1, 0, '2017-09-19 08:09:11', 37),
(13, 'Yeeeeee!!!!!!', 2, 0, '2017-09-19 08:09:18', 43),
(14, 'nope!!!', 2, 0, '2017-09-19 08:09:14', 43),
(15, 'Yeeee!!!!', 2, 0, '2017-09-19 08:09:26', 43);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `user_id`) VALUES
(39, 0, 1),
(48, 10, 1),
(52, 30, 1),
(59, 27, 1),
(61, 31, 2),
(62, 29, 1),
(63, 36, 1),
(64, 43, 1),
(65, 43, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_text` longtext NOT NULL,
  `author_user_id` int(11) NOT NULL,
  `time` mediumtext NOT NULL,
  `category` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_text`, `author_user_id`, `time`, `category`) VALUES
(37, 'AJAX DONE&lt;/br&gt;', 1, '2017-09-19-02:09:23', 'AJAX'),
(38, 'Mahfuz</br>Mission</br>', 1, '2017-09-19-02:09:45', 'cat'),
(39, '</br></br></br></br></br>Long Run</br></br>Half run</br></br></br></br></br></br></br></br>', 1, '2017-09-19-02:09:12', 'cat'),
(40, '</br></br></br>gfhgfhfh', 1, '2017-09-19-02:09:45', 'cat'),
(41, 'asdasd</br></br></br>asddasd</br></br></br></br>asasda', 1, '2017-09-19-02:09:16', 'cat'),
(42, 'Webtech</br></br>Web design', 2, '2017-09-19-06:09:15', 'cat'),
(43, 'Welcome to Profile Feed', 1, '2017-09-19-07:09:16', 'cat');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment_relationship`
--

CREATE TABLE `post_comment_relationship` (
  `relationship_id` int(11) NOT NULL,
  `post_id` int(200) NOT NULL,
  `comment_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `workplace` varchar(100) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `pic` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_id`, `full_name`, `user_name`, `email`, `phone`, `address`, `school`, `college`, `university`, `workplace`, `gender`, `pic`) VALUES
(1, '1', 'Fahad Tanim', 'fahadtanim', 'fahadtanim@gmail.com', '01619941006', 'South Banasree, Dhaka-1214, Bangladesh', 'Motijheel Model High School', ' National Ideal College', 'American International University-Bangladesh', 'Shift-it.net', 'male', '1_09192017083758ep03_capture_000032.jpg'),
(2, '2', 'Mahfuz Mission', 'mahfuz.mission_gmail.com', 'mahfuz.mission@gmail.com', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'male', '2_091920170648046_city_anime.jpg'),
(3, '3', 'Mujahid Shadhin', 'mujahid_gmail.com', 'mujahid@gmail.com', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'male', NULL),
(4, '4', 'Samiul Haque', 's.h.shovon_gmail.com', 's.h.shovon@gmail.com', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `friendship_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `friend` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(10000) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `online_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `online_status`) VALUES
(1, 'fahadtanim@gmail.com', '1234Asd@', 0),
(2, 'mahfuz.mission@gmail.com', '1234Near@', 0),
(3, 'mujahid@gmail.com', '1234Asd@', 0),
(4, 's.h.shovon@gmail.com', 'Shovon@123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_relationship`
--

CREATE TABLE `user_profile_relationship` (
  `up_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat_box`
--
ALTER TABLE `chat_box`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comment_relationship`
--
ALTER TABLE `post_comment_relationship`
  ADD PRIMARY KEY (`relationship_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`friendship_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile_relationship`
--
ALTER TABLE `user_profile_relationship`
  ADD PRIMARY KEY (`up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `chat_box`
--
ALTER TABLE `chat_box`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `post_comment_relationship`
--
ALTER TABLE `post_comment_relationship`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `friendship_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_profile_relationship`
--
ALTER TABLE `user_profile_relationship`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
