-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 08:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(50) NOT NULL,
  `book_category` int(30) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_image` text NOT NULL,
  `book_price` int(20) NOT NULL,
  `book_author` text NOT NULL,
  `book_desc` text NOT NULL,
  `book_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_category`, `book_title`, `book_image`, `book_price`, `book_author`, `book_desc`, `book_keyword`) VALUES
(1, 4, 'Tony Stark', '8d8702385b11da8d0c7604563ffe5e18.jpg', 1234, 'sadfg', 'afegsrhe', 'afes'),
(2, 2, 'Percy Jackson', '814USDSQBaL.jpg', 399, 'Rick Riordan', 'sdasfvc', 'advfs'),
(6, 2, 'Joker', 'images (2).jpg', 249, 'Jeremiah Valeska', 'sqwdeqwre', 'joker'),
(8, 3, 'Khal Drogo', '16736e5dade2f3fdba98135c51c5b68c.jpg', 1321, 'Danerys', 'danerys aur khal ke chudai ki katha', 'GOT'),
(9, 3, 'Lion King', '1200px-Lion_waiting_in_Namibia.jpg', 1351, 'Mufasa', 'Revenge on Scar', 'family'),
(10, 6, 'Reverse Osmosis', 'download.jpg', 345, 'Akella Sivaramakrishnan', 'Nice.', 'Vit'),
(11, 6, 'Joker Original', 'dfwkvm.jpg', 425, 'Heath Ledger', 'Rip Heath Ledger.', 'batman'),
(12, 3, 'Batman', 'the_dark_knight_rises-wallpaper-1920x1080.jpg', 676, 'Ben Affleck', 'I am Batman.', 'joker');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `b_id` int(10) DEFAULT NULL,
  `ip_add` varchar(255) DEFAULT NULL,
  `qty` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`b_id`, `ip_add`, `qty`) VALUES
(2, '::1', 1),
(12, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'All books'),
(2, 'Fiction'),
(3, 'Children\'s Books'),
(4, 'Editor\'s Choice'),
(5, 'Scientific'),
(6, 'Exam Preparation'),
(7, 'Biography');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_state` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_state`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(5, '::1', 'arya', 'arya.atharva6@gmail.com', 'arya', 'Andaman and Nicobar Islands', 'jamshedpur', '9003487569', '8d8702385b11da8d0c7604563ffe5e18.jpg', 'ghar'),
(6, '::1', 'Lakshit', 'lakshit99@gmail.com', '123', 'Delhi', 'delhi', '098574564576', '16736e5dade2f3fdba98135c51c5b68c.jpg', 'dubai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `b_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `order_state` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `trx_id` int(100) NOT NULL,
  `currency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `quoted_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote`, `quoted_by`) VALUES
(2, 'There is no friend as loyal as a book.', ' Ernest Hemingway'),
(3, 'A reader lives a thousand lives before he dies . . . The man who never reads lives only one.', 'George R.R. Martin'),
(4, '... a mind needs books as a sword needs a whetstone, if it is to keep its edge.', 'George R.R. Martin'),
(5, 'Books are a uniquely portable magic.', 'Stephen King'),
(6, 'Fairy tales are more than true: not because they tell us that dragons exist, but because they tell us that dragons can be beaten.', 'Neil Gaiman'),
(7, 'That\'s the thing about books. They let you travel without moving your feet.', 'Jhumpa Lahiri'),
(8, 'I do believe something very magical can happen when you read a book.', 'J.K. Rowling'),
(9, 'There is some good in this world, and it\'s worth fighting for.', 'J.R.R. Tolkien, The Two Towers'),
(10, 'Twenty years from now you will be more disappointed by the things that you didn\'t do than by the ones you did do.', 'H.Jackson Brown Jr., P.S. I Love You'),
(11, 'Every human life is worth the same, and worth saving.', 'J.K. Rowling, Harry Potter and the Deathly Hallows'),
(12, 'The goal isn\'t to live forever, the goal is to create something that will.', 'Chuck Palahniuk, Diary'),
(13, 'Most people are nice when you finally see them.\r\n', 'Harper Lee, To Kill a Mockingbird'),
(14, 'There is no friend as loyal as a book.', 'Ernest Hemingway'),
(15, 'We\'ve all got both light and dark inside us. What matters is the part we choose to act on. That\'s who we really are.', 'J. K. Rowling, Harry Potter and the Order of the Phoenix'),
(16, 'Get busy living or get busy dying.', 'Stephen King, The Shawshank Redemption'),
(17, 'My advice is, never do tomorrow what you can do today. Procrastination is the thief of time.', 'Charles Dickens, David Copperfield'),
(18, 'And so we beat on, boats against the current, borne back ceaselessly into the past.', 'F. Scott Fitzgerald, The Great Gatsby'),
(19, 'It\'s the possibility of having a dream come true that makes life interesting.', 'Paulo Coelho, The Alchemist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_1` (`b_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`b_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
