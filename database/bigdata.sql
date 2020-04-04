-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 05:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `credit_unit` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `course_code`, `programme`, `credit_unit`, `price`) VALUES
(1, 'Computer in the society', 'CIT 101', 'Computer Science', '2', '2000'),
(2, 'Introduction to Biology', 'BIO 101', 'Microbiology', '2', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `courseware`
--

CREATE TABLE `courseware` (
  `ID` int(22) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `title` mediumtext,
  `module` varchar(500) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `description` longtext NOT NULL,
  `media` text,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseware`
--

INSERT INTO `courseware` (`ID`, `topic`, `title`, `module`, `class`, `description`, `media`, `DateCreated`) VALUES
(59, 'qoooooooo', 'LEFT THE SCHOOL', 'Geometry 2', 'JSS2', 'qqqwqwqw', '1530432515.xlsx', '2018-07-01 08:08:35'),
(60, '', 'Courseware on Logarithms', 'Logarithms', 'SSS3', 'A self explanatory material to take you through Logarithms', '1532085475.pdf', '2018-07-20 11:17:55'),
(61, '', 'Couresware Sequence and series', 'Sequences and Series', 'SSS3', 'A self explanatory material to guide you through learning Sequence and series', '1532093203.pdf', '2018-07-20 13:26:43'),
(62, '', 'Courseware on Finance', 'Finance', 'SSS3', 'A self explanatory material for Finance', '1532093364.pdf', '2018-07-20 13:29:24'),
(63, '', 'All JSS1 modules', 'All', 'JSS1', 'A material that covers all JSS1 math modules', '1532122219.pdf', '2018-07-20 21:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `event` varchar(1000) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `event`, `date`) VALUES
(1, 'Admission into JUPEB Programme', 'Application are hereby invited from suitable qualified candidates for admission into the Joint Universities Preliminary Examinations Board (JUPEB) programme for 2017/2018 Session.', '08-12-2017'),
(2, 'Schedule of fees payable for 2016/2017 session', ' Ensure that you pay into the correct bank designated to your faculties as any request for transfer of fees from one bank to the other or outright refund of wrongly paid fees will not be tolerated.', '08-12-2017');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty`) VALUES
(1, 'Law'),
(2, 'Engineering'),
(3, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `description`, `amount`, `date`, `last_update`) VALUES
(1, 'Fuel 10 litres', '1450', '23/10/2017', '2017-10-23 09:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `programmes` varchar(100) NOT NULL,
  `hod` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `programmes`, `hod`, `faculty`) VALUES
(1, 'Computer Science', 'Mr Okolo Igwe', 'Engineering'),
(2, 'Microbiology', 'Prof Ade Mike', 'Engineering'),
(3, 'Electrical Electronics', 'Prof Ade Mike', 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `regi_course`
--

CREATE TABLE `regi_course` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `credit_unit` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quiz` varchar(100) DEFAULT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regi_course`
--

INSERT INTO `regi_course` (`id`, `student_id`, `course_id`, `course_title`, `course_code`, `credit_unit`, `price`, `quiz`, `exam`, `date`) VALUES
(1, '1', '1', 'Computer in the society', 'CIT 101', '2', '2000', '20', '30', '2017-10-05 06:25:47'),
(2, '2', '2', 'Introduction to Biology', 'BIO 101', '2', '2000', '15', '30', '2017-10-05 13:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `reg_admin`
--

CREATE TABLE `reg_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `security_key` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `programme` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `status` varchar(3) NOT NULL,
  `block` varchar(3) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `date_reg` varchar(100) NOT NULL,
  `time_reg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_admin`
--

INSERT INTO `reg_admin` (`id`, `fullname`, `username`, `security_key`, `level`, `password`, `email`, `gender`, `phone`, `address`, `qualification`, `programme`, `salary`, `status`, `block`, `last_login`, `date_reg`, `time_reg`) VALUES
(1, 'Davis Umeoka', 'dumeoka@visiondatatechs.com', 'dayveeys', 'super', '07068969591', '', 'male', '07068969591', 'Enugu', 'B.SC, PHD', 'All', NULL, 'No', 'No', '2018-07-21 10:25:47 pm', '30/09/2017', '10:09am'),
(28, 'popo', 'dum@visiondatatechs.com', '1234abcd', 'super', '123456', 'dum@visiondatatechs.com', 'male', '01055654588', 'Enugu', 'B.SC, PHD', 'All', NULL, 'No', 'No', '2018-07-18 05:55:24 pm', '05/07/2018', '12:15pm'),
(29, 'Davis', 'adminwqw', 'dumeokaqwqw', 'super', '123456', 'admiere@visiondatatechs.com', 'female', '01055654588', 'my adress', 'B.SC, PHD', 'All', NULL, 'No', 'No', '', '05/07/2018', '12:23pm'),
(30, 's', 'dumeoka@visiondatatechs.com', '1234abcd', 'staff', '123456', 'dumeoka@visiondatatechs.com', 'female', '01055654588', 'my adress', 'B.SC, PHD', 'JSSI', NULL, 'No', 'No', '2018-07-18 10:41:16 pm', '05/07/2018', '12:38pm'),
(31, 's', 'sawaleq2', '1234abcd', 'staff', '123456', 'dumeoka@visiondatatechs.com', 'male', '01055654588', 'my adress', 'B.SC, PHD', 'JSSI', NULL, 'No', 'No', '', '05/07/2018', '12:39pm'),
(32, 's', 'sawaleq212', '1234abcd', 'super', '123456', 'dere@visiondatatechs.com', 'male', '01055654588', 'my adress', 'B.SC, PHD', 'All', NULL, 'No', 'No', '', '05/07/2018', '12:42pm');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`) VALUES
(2, '979240.jpg'),
(3, '3397574.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `othernames` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `date_reg` varchar(100) NOT NULL,
  `time_reg` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `passport`, `reg_no`, `firstname`, `lastname`, `othernames`, `email`, `password`, `gender`, `dob`, `phone`, `address`, `state`, `lga`, `nationality`, `programme`, `school`, `date_reg`, `time_reg`, `last_update`) VALUES
(1, 'davis-07068969591.png', 'EMTH/2018/133091', 'Davis', 'Umeoka', 'Chinedu', 'dumeoka@visiondatatechs.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', '02/10/2017', '07068969591', '8 city, state.', 'State', 'Lga', 'Nigeria', 'SSS3', 'Kings High School', '02/10/2017', '12:17pm', '2018-07-18 22:10:05'),
(4, 'edugbodo-07056656548.png', 'ESUT/2018/147869', 'edugbodo', 'ada', 'Chinedu', 'dayveeys@gmail.com', '123456', 'male', '02/10/2017', '07056656548', '8 city, state.', 'State', 'Lga', 'Nigeria', 'SSS2', 'Undergraduate', '04/07/2018', '01:46am', '2018-07-04 00:46:25'),
(5, 'edugbodo-07056656548.png', 'ESUT/2018/428722', 'edugbodo', 'ada', 'Chinedu', 'dmbah@visiondatatechs.com', '123456', 'female', '02/10/2017', '07056656548', '8 city, state.', 'State', 'Lga', 'Nigeria', 'SSS3', 'Undergraduate', '04/07/2018', '01:47am', '2018-07-04 00:47:53'),
(6, 'wwwww-0705665654.png', 'ESUT/2018/435082', 'wwwww', 'dddddddddddd', 'Chinedu', 'webmaster@visiondatatechs.com', 'vision57webmaster', 'male', '02/10/2017', '0705665654', '8 city, state.', 'State', 'Lga', 'Nigeria', 'JSSI', 'Undergraduate', '04/07/2018', '01:53am', '2018-07-04 00:53:23'),
(7, 'wwwww-07056656548.png', 'EMTH/2018/102895', 'wwwww', 'ada', 'Chinedu', 'sunnygkp10@gmail.com', '12345', 'male', '02/10/2017', '07056656548', 'ooooooo', 'State', 'Lga', 'Nigeria', 'JSS2', 'Bright star', '07/07/2018', '02:17pm', '2018-07-07 13:17:23'),
(8, 'wwwww-07056656548.png', 'EMTH/2018/167215', 'wwwww', 'ada', 'Chinedu', 'sunnygkp10@gmail.comoo', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '02/10/2017', '07056656548', 'ooooooo', 'State', 'Lga', 'Nigeria', 'JSS2', 'Bright star', '07/07/2018', '02:22pm', '2018-07-07 13:22:20'),
(9, 'wwwww-07056656548.png', 'EMTH/2018/654994', 'wwwww', 'ada', 'Chinedu', 'sunnygkp100@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', '02/10/2017', '07056656548', 'ooooooo', 'State', 'Lga', 'Nigeria', 'JSS2', 'Bright star', '07/07/2018', '02:23pm', '2018-07-07 13:23:42'),
(10, 'wwwww-07056656548.png', 'EMTH/2018/908427', 'wwwww', 'ada', 'Chinedu', 'sunnygkp1000@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', '02/10/2017', '07056656548', 'ooooooo', 'State', 'Lga', 'Nigeria', 'JSS2', 'Bright star', '07/07/2018', '02:26pm', '2018-07-07 13:26:52'),
(11, 'qew-07056656548.png', 'EMTH/2018/900123', 'qew', 'Umeoka', 'Student', 'nurse@cleon.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '02/10/2017', '07056656548', 'o', 'State', 'Lga', 'Nation', 'SSS2', 'Bright star', '18/07/2018', '11:28am', '2018-07-18 10:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `vc`
--

CREATE TABLE `vc` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vc`
--

INSERT INTO `vc` (`id`, `content`, `type`) VALUES
(1, 'It is with delight that I welcome you to the Enugu State University of Science and Technology, a top-ranking University of Technology in Nigeria and indeed the nation s technological pride. Established in 1981 as the very first state University, the University has grown tremendously, stretching its academic disciplines and research across six different Schools and thirty academic departments. ESUT is located at Agbani in Enugu State, Nigeria and its vision and mission are not only clearly stated, but very vigorously pursued. ', 'speech'),
(2, 'Prof. Luke', 'name'),
(3, 'vc.jpg', 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `ID` int(22) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `title` mediumtext,
  `module` varchar(500) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `description` longtext NOT NULL,
  `media` text,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`ID`, `topic`, `title`, `module`, `class`, `description`, `media`, `DateCreated`) VALUES
(62, 'pop', 'lol', 'JSS3', 'JSS3', 'yryt', '1530398163.xlsx', '2018-06-30 22:36:03'),
(64, 'pop', 'lol', 'JSS3', 'JSS3', 'yryt', '1530398268.xlsx', '2018-06-30 22:37:48'),
(66, 'pop', 'lol', 'JSS3', 'JSS3', 'yryt', '1530429898.xlsx', '2018-07-01 07:24:59'),
(67, 'pop', 'lol', 'JSS3', 'JSS3', 'yryt', '1530430503.xlsx', '2018-07-01 07:35:03'),
(68, 'pop', 'lol', 'JSS3', 'JSS3', 'yryt', '1530430528.xlsx', '2018-07-01 07:35:28'),
(71, '', 'SEREQWERTYU', 'Measurement 1', 'JSS3', 'WEERRTTY', '1530431636.xlsx', '2018-07-01 07:53:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseware`
--
ALTER TABLE `courseware`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regi_course`
--
ALTER TABLE `regi_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_admin`
--
ALTER TABLE `reg_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vc`
--
ALTER TABLE `vc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courseware`
--
ALTER TABLE `courseware`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `regi_course`
--
ALTER TABLE `regi_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reg_admin`
--
ALTER TABLE `reg_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vc`
--
ALTER TABLE `vc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
