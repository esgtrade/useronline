--
-- Database: `testing2`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_image` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_type`, `user_image`) VALUES
(1, 'john_smith@gmail.com', '$2y$10$cHpf3TzonURXDENRiRF0de1ycSfnM4NJ27sdwyUCf5L.sewDlkCBe', 'master', ''),
(2, 'dona_huber@gmail.com', '$2y$10$lcLYyNeK1adgzYcBplv45uuXHFuFyWYThnj3nB2SZ/LbQvtWSoGjO', 'user', 'dona_huber.jpg'),
(3, 'roy_hise@gmail.com', '$2y$10$XlyVI9an5B6rHW3SS9vQpesJssKJxzMQYPbSaR7dnpWjDI5fpxJSS', 'user', 'roy_hise.jpg'),
(4, 'peter_goad@gmail.com', '$2y$10$n1B.FdHNwufTkmzp/pNqc.EiwjB8quQ1tBCEC7nkaldI5pS.et04e', 'user', 'peter_goad.jpg'),
(5, 'sarah_thomas@gmail.com', '$2y$10$s57SErOPlgkIZf1lxzlX3.hMt8LSSKaYig5rusxghDm7LW8RtQc/W', 'user', 'sarah_thomas.jpg'),
(6, 'edna_william@gmail.com', '$2y$10$mfMXnH.TCmg5tlYRhqjxu.ILly8s9.qsLKOpyxgUl6h1fZt6x/B5C', 'user', 'edna_william.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
