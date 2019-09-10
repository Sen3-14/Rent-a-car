CREATE DATABASE IF NOT EXISTS cars;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `admin` (
    `admin_id` INT(11) NOT NULL AUTO_INCREMENT,
    `uname` VARCHAR(255) NOT NULL,
    `pass` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`admin_id`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1 AUTO_INCREMENT=2;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `cars` (
    `car_id` INT(11) NOT NULL AUTO_INCREMENT,
    `car_name` VARCHAR(255) NOT NULL,
    `car_type` VARCHAR(255) NOT NULL,
    `image` TEXT NOT NULL,
    `hire_cost` INT(11) NOT NULL,
    `capacity` INT(11) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`car_id`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1 AUTO_INCREMENT=8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_type`, `image`, `hire_cost`, `capacity`, `status`) VALUES
(1, 'Mercedes Benz', 'Coupe', 'car1.jpg', 110000, 5, 'Available'),
(2, 'Range Rover', 'Mini-SUV', 'car2.jpg', 32000, 6, 'Available'),
(3, 'Toyota', 'Coupe', 'car3.jpg', 31000, 6, 'Available'),
(5, 'Toyota V8', 'SUV ', 'images (2).jpg', 40000, 5, 'Available'),
(6, 'Hummer', 'SUV', 'sonkort2.png', 46000, 8, 'Available'),
(7, 'Wedding Limousine', 'Wedding Limousine', 'images (3).jpg', 28000, 10, 'Available');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS client (
    client_id INT(11) NOT NULL AUTO_INCREMENT,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    passw LONGTEXT NOT NULL,
    phone INT(11) NOT NULL,
    locat VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    car_id INT(11),
    status VARCHAR(255),
    mpesa VARCHAR(255),
    PRIMARY KEY (client_id)
)  ENGINE=INNODB;

--
-- Dumping data for table `client`
--

INSERT INTO client (`client_id`, `fname`, `email`, `passw`, `phone`, `locat`, `gender`, `car_id`, `status`, `mpesa`) VALUES
(2, 'felix kiamba', 'kiambafelix@yahoo.com', 30073147, 705053484, 'nairobi', 'Male', 1, 'Approved', 'GTD45H7H6'),
(3, 'concepter', 'concybogita@gmail.com', 27695131, 707403614, 'kisii', 'Female', 2, 'Approved', 'DJFL870FDK9'),
(4, 'enock bosire', 'enock@gmail.com', 1234567, 717056766, 'narok', 'Male', 2, 'Approved', 'HJHK678X');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `hire` (
    `hire_id` INT(11) AUTO_INCREMENT,
    `client` VARCHAR(255),
    `car_id` INT(11),
    `status` VARCHAR(255),
    PRIMARY KEY (`hire_id`)
)  ENGINE=INNODB;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `message` (
    `msg_id` INT(11) NOT NULL AUTO_INCREMENT,
    `client_id` VARCHAR(255) NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `time` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`msg_id`)
)  ENGINE=INNODB AUTO_INCREMENT=6;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `client_id`, `message`, `status`, `time`) VALUES
(2, 0, 'Am happy its working?', 'Unread', '0000-00-00 00:00:00'),
(3, 0, 'Thanks for that..OK?', 'Unread', '0000-00-00 00:00:00'),
(5, 0, 'I love this. It worked the way i want...', 'Unread', '2015-08-04 21:45:33');
