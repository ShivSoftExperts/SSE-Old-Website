-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 02:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiv`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(1000) NOT NULL,
  `address` text NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `branch_name`, `address`, `display_order`, `status`, `created_date`, `updated_date`) VALUES
(2, 'USA HEADQUARTERS', '2501 PETER JEFFERSON LN HERNDON, VA 20171', 1, 'active', '2024-01-07 16:56:24', '2024-01-07 16:56:24'),
(3, 'INDIA OFFICE', 'Vasavi\'s MPM Grand, Suite #1319, Ameerpet, Hyderabad, Telangana 500073.', 2, 'active', '2024-01-07 16:56:38', '2024-01-07 16:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` int(11) NOT NULL,
  `display_name` varchar(150) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `salt`, `display_name`, `mobile_number`, `email`, `role`, `image`, `status`, `created_date`, `updated_date`) VALUES
(1, 'admin', '28ef62ec7e97889bb2ba61101e8718f8', 53440, 'SHIV Admin', '8895568688', 'b.rajaramesh123@gmail.com', 1, 'assets/images/image/044140f4c13e782bfc3060afd19e2e5e.png', '1', '2020-01-08 11:31:00', '2023-12-20 23:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_id`, `ip_address`, `created_date`, `updated_date`) VALUES
(1, 1, '::1', '2024-01-07 16:46:41', NULL),
(2, 1, '::1', '2024-01-07 19:37:32', NULL),
(3, 1, '::1', '2024-01-09 08:54:14', '2024-01-09 09:00:52'),
(4, 1, '::1', '2024-01-09 09:00:53', '2024-01-09 09:01:08'),
(5, 1, '::1', '2024-01-09 19:46:03', NULL),
(6, 1, '::1', '2024-01-10 21:04:35', NULL),
(7, 1, '::1', '2024-01-10 21:04:46', NULL),
(8, 1, '::1', '2024-01-11 08:28:17', NULL),
(9, 1, '::1', '2024-01-11 19:26:00', NULL),
(10, 1, '::1', '2024-01-13 11:56:41', NULL),
(11, 1, '::1', '2024-01-13 15:28:23', NULL),
(12, 1, '::1', '2024-01-14 10:35:42', NULL),
(13, 1, '::1', '2024-01-14 19:07:22', NULL),
(14, 1, '::1', '2024-01-14 22:17:09', NULL),
(15, 1, '::1', '2024-01-15 09:39:31', NULL),
(16, 1, '::1', '2024-01-15 19:03:42', NULL),
(17, 1, '::1', '2024-01-16 21:52:42', NULL),
(18, 1, '::1', '2024-01-20 13:06:34', NULL),
(19, 1, '::1', '2024-01-21 18:35:00', NULL),
(20, 1, '::1', '2024-01-31 08:05:21', NULL),
(21, 1, '::1', '2024-03-07 21:27:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `meta_data` text DEFAULT NULL,
  `meta_title` varchar(1000) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `banner1` varchar(250) DEFAULT NULL,
  `banner2` varchar(250) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `meta_data`, `meta_title`, `title`, `description`, `image_path`, `created_date`, `updated_date`, `status`, `banner1`, `banner2`, `question`) VALUES
(1, 'WHAT IS YOUR APPROACH TO TESTING AND IMPROVING QA?', NULL, 'APPLICATION DEVELOPMENT', '<p>Quality assurance and testing are the cornerstones of a successful product development process. In today&#39;s competitive landscape, ensuring that your products and services meet high-quality standards and deliver an exceptional user experience is vital. Neglecting the crucial aspects of quality assurance (QA) and testing can lead to bug-ridden releases and a stream of customer complaints. To prevent these issues, it&#39;s essential to adopt the right testing and QA approaches for your business. In this comprehensive guide, we&#39;ll explore the strategies and principles that can help you create a robust QA process.</p>\r\n\r\n<p>Defining Clear Quality Standards</p>\r\n\r\n<p>The foundation of an effective QA Testing strategy begins with defining clear quality standards for your products and services. To do this, consider establishing SMART goals &ndash; Specific, Measurable, Achievable, Realistic, and Time-bound. Setting these specific quality standards helps your team have a clear and unified vision of what is expected.</p>\r\n\r\n<p>Comprehensive Test Plans</p>\r\n\r\n<p>Creating a comprehensive test plan is another critical step in your QA strategy. A well-structured test plan should cover the scope of testing, objectives, test cases, test data, testing environments, and realistic timelines. This plan acts as your roadmap throughout the testing process, ensuring that nothing is left to chance.</p>\r\n\r\n<p>Embracing Automation</p>\r\n\r\n<p>Embracing test automation is paramount in modern QA practices. Automated testing helps reduce the workload of your QA team by handling repetitive and time-consuming test cases. It not only increases efficiency but also minimizes the likelihood of human error. By implementing automated testing tools and frameworks, you can enhance the overall effectiveness of your QA process.</p>\r\n\r\n<p>Continuous Integration and Continuous Testing</p>\r\n\r\n<p>Continuous Integration (CI) and Continuous Testing (CT) are crucial practices in modern software development. These methodologies involve the integration of code changes into the main codebase frequently, followed by automated testing. The goal is to identify and rectify issues at an early stage of development, ensuring the creation of a high-quality product. By continuously testing, you can catch and address issues as they arise, rather than letting them accumulate and become overwhelming.</p>\r\n\r\n<p>Performance and Security Testing</p>\r\n\r\n<p>A robust QA process should include rigorous performance and security testing. Performance testing ensures that your products can handle the anticipated user loads efficiently, helping to avoid performance bottlenecks or system crashes. This includes load testing, stress testing, and performance profiling. Simultaneously, security testing is essential to identify and mitigate vulnerabilities, safeguarding your products against data breaches and cyber threats.</p>\r\n\r\n<p>Usability and User Feedback</p>\r\n\r\n<p>Usability testing is a critical component of any QA strategy. It&#39;s not just about technical performance; it&#39;s about ensuring that your products are user-friendly and align with the needs and expectations of your target audience. User feedback plays a crucial role in this aspect, as it provides insights into the user experience and helps shape product improvements.</p>', 'assets/images/blog/ac00afa204ce007a6a255a1fd0774640.png', '2024-01-07 05:03:00', '2024-01-16 16:54:24', 'active', 'assets/images/banners/c5ff834176d867d3f966395c83f2bbda.png', 'assets/images/banners/b04459fe5638748706a77266b8b98c67.png', 'How to build a website'),
(2, 'WHAT IS YOUR APPROACH TO TESTING AND IMPROVING QA?', NULL, 'QA SERVICES', '<p>Quality assurance and testing are the cornerstones of a successful product development process. In today&#39;s competitive landscape, ensuring that your products and services meet high-quality standards and deliver an exceptional user experience is vital. Neglecting the crucial aspects of quality assurance (QA) and testing can lead to bug-ridden releases and a stream of customer complaints. To prevent these issues, it&#39;s essential to adopt the right testing and QA approaches for your business. In this comprehensive guide, we&#39;ll explore the strategies and principles that can help you create a robust QA process.</p>\r\n\r\n<p>Defining Clear Quality Standards</p>\r\n\r\n<p>The foundation of an effective QA Testing strategy begins with defining clear quality standards for your products and services. To do this, consider establishing SMART goals &ndash; Specific, Measurable, Achievable, Realistic, and Time-bound. Setting these specific quality standards helps your team have a clear and unified vision of what is expected.</p>\r\n\r\n<p>Comprehensive Test Plans</p>\r\n\r\n<p>Creating a comprehensive test plan is another critical step in your QA strategy. A well-structured test plan should cover the scope of testing, objectives, test cases, test data, testing environments, and realistic timelines. This plan acts as your roadmap throughout the testing process, ensuring that nothing is left to chance.</p>\r\n\r\n<p>Embracing Automation</p>\r\n\r\n<p>Embracing test automation is paramount in modern QA practices. Automated testing helps reduce the workload of your QA team by handling repetitive and time-consuming test cases. It not only increases efficiency but also minimizes the likelihood of human error. By implementing automated testing tools and frameworks, you can enhance the overall effectiveness of your QA process.</p>\r\n\r\n<p>Continuous Integration and Continuous Testing</p>\r\n\r\n<p>Continuous Integration (CI) and Continuous Testing (CT) are crucial practices in modern software development. These methodologies involve the integration of code changes into the main codebase frequently, followed by automated testing. The goal is to identify and rectify issues at an early stage of development, ensuring the creation of a high-quality product. By continuously testing, you can catch and address issues as they arise, rather than letting them accumulate and become overwhelming.</p>\r\n\r\n<p>Performance and Security Testing</p>\r\n\r\n<p>A robust QA process should include rigorous performance and security testing. Performance testing ensures that your products can handle the anticipated user loads efficiently, helping to avoid performance bottlenecks or system crashes. This includes load testing, stress testing, and performance profiling. Simultaneously, security testing is essential to identify and mitigate vulnerabilities, safeguarding your products against data breaches and cyber threats.</p>\r\n\r\n<p>Usability and User Feedback</p>\r\n\r\n<p>Usability testing is a critical component of any QA strategy. It&#39;s not just about technical performance; it&#39;s about ensuring that your products are user-friendly and align with the needs and expectations of your target audience. User feedback plays a crucial role in this aspect, as it provides insights into the user experience and helps shape product improvements.</p>', 'assets/images/blog/ac00afa204ce007a6a255a1fd0774640.png', '2024-01-07 05:03:00', '2024-01-16 16:55:23', 'active', 'assets/images/banners/c5ff834176d867d3f966395c83f2bbda.png', 'assets/images/banners/b04459fe5638748706a77266b8b98c67.png', 'How to build a website'),
(3, 'WHAT IS YOUR APPROACH TO TESTING AND IMPROVING QA?', NULL, 'IT CONSULTING', '<p>Quality assurance and testing are the cornerstones of a successful product development process. In today&#39;s competitive landscape, ensuring that your products and services meet high-quality standards and deliver an exceptional user experience is vital. Neglecting the crucial aspects of quality assurance (QA) and testing can lead to bug-ridden releases and a stream of customer complaints. To prevent these issues, it&#39;s essential to adopt the right testing and QA approaches for your business. In this comprehensive guide, we&#39;ll explore the strategies and principles that can help you create a robust QA process.</p>\r\n\r\n<p>Defining Clear Quality Standards</p>\r\n\r\n<p>The foundation of an effective QA Testing strategy begins with defining clear quality standards for your products and services. To do this, consider establishing SMART goals &ndash; Specific, Measurable, Achievable, Realistic, and Time-bound. Setting these specific quality standards helps your team have a clear and unified vision of what is expected.</p>\r\n\r\n<p>Comprehensive Test Plans</p>\r\n\r\n<p>Creating a comprehensive test plan is another critical step in your QA strategy. A well-structured test plan should cover the scope of testing, objectives, test cases, test data, testing environments, and realistic timelines. This plan acts as your roadmap throughout the testing process, ensuring that nothing is left to chance.</p>\r\n\r\n<p>Embracing Automation</p>\r\n\r\n<p>Embracing test automation is paramount in modern QA practices. Automated testing helps reduce the workload of your QA team by handling repetitive and time-consuming test cases. It not only increases efficiency but also minimizes the likelihood of human error. By implementing automated testing tools and frameworks, you can enhance the overall effectiveness of your QA process.</p>\r\n\r\n<p>Continuous Integration and Continuous Testing</p>\r\n\r\n<p>Continuous Integration (CI) and Continuous Testing (CT) are crucial practices in modern software development. These methodologies involve the integration of code changes into the main codebase frequently, followed by automated testing. The goal is to identify and rectify issues at an early stage of development, ensuring the creation of a high-quality product. By continuously testing, you can catch and address issues as they arise, rather than letting them accumulate and become overwhelming.</p>\r\n\r\n<p>Performance and Security Testing</p>\r\n\r\n<p>A robust QA process should include rigorous performance and security testing. Performance testing ensures that your products can handle the anticipated user loads efficiently, helping to avoid performance bottlenecks or system crashes. This includes load testing, stress testing, and performance profiling. Simultaneously, security testing is essential to identify and mitigate vulnerabilities, safeguarding your products against data breaches and cyber threats.</p>\r\n\r\n<p>Usability and User Feedback</p>\r\n\r\n<p>Usability testing is a critical component of any QA strategy. It&#39;s not just about technical performance; it&#39;s about ensuring that your products are user-friendly and align with the needs and expectations of your target audience. User feedback plays a crucial role in this aspect, as it provides insights into the user experience and helps shape product improvements.</p>', 'assets/images/blog/ac00afa204ce007a6a255a1fd0774640.png', '2024-01-07 05:03:00', '2024-01-16 16:55:59', 'active', 'assets/images/banners/c5ff834176d867d3f966395c83f2bbda.png', 'assets/images/banners/b04459fe5638748706a77266b8b98c67.png', 'How to build a website'),
(4, 'WHAT IS YOUR APPROACH TO TESTING AND IMPROVING QA?', NULL, 'AI & DATA ANALYTICS', '<p>Quality assurance and testing are the cornerstones of a successful product development process. In today&#39;s competitive landscape, ensuring that your products and services meet high-quality standards and deliver an exceptional user experience is vital. Neglecting the crucial aspects of quality assurance (QA) and testing can lead to bug-ridden releases and a stream of customer complaints. To prevent these issues, it&#39;s essential to adopt the right testing and QA approaches for your business. In this comprehensive guide, we&#39;ll explore the strategies and principles that can help you create a robust QA process.</p>\r\n\r\n<p>Defining Clear Quality Standards</p>\r\n\r\n<p>The foundation of an effective QA Testing strategy begins with defining clear quality standards for your products and services. To do this, consider establishing SMART goals &ndash; Specific, Measurable, Achievable, Realistic, and Time-bound. Setting these specific quality standards helps your team have a clear and unified vision of what is expected.</p>\r\n\r\n<p>Comprehensive Test Plans</p>\r\n\r\n<p>Creating a comprehensive test plan is another critical step in your QA strategy. A well-structured test plan should cover the scope of testing, objectives, test cases, test data, testing environments, and realistic timelines. This plan acts as your roadmap throughout the testing process, ensuring that nothing is left to chance.</p>\r\n\r\n<p>Embracing Automation</p>\r\n\r\n<p>Embracing test automation is paramount in modern QA practices. Automated testing helps reduce the workload of your QA team by handling repetitive and time-consuming test cases. It not only increases efficiency but also minimizes the likelihood of human error. By implementing automated testing tools and frameworks, you can enhance the overall effectiveness of your QA process.</p>\r\n\r\n<p>Continuous Integration and Continuous Testing</p>\r\n\r\n<p>Continuous Integration (CI) and Continuous Testing (CT) are crucial practices in modern software development. These methodologies involve the integration of code changes into the main codebase frequently, followed by automated testing. The goal is to identify and rectify issues at an early stage of development, ensuring the creation of a high-quality product. By continuously testing, you can catch and address issues as they arise, rather than letting them accumulate and become overwhelming.</p>\r\n\r\n<p>Performance and Security Testing</p>\r\n\r\n<p>A robust QA process should include rigorous performance and security testing. Performance testing ensures that your products can handle the anticipated user loads efficiently, helping to avoid performance bottlenecks or system crashes. This includes load testing, stress testing, and performance profiling. Simultaneously, security testing is essential to identify and mitigate vulnerabilities, safeguarding your products against data breaches and cyber threats.</p>\r\n\r\n<p>Usability and User Feedback</p>\r\n\r\n<p>Usability testing is a critical component of any QA strategy. It&#39;s not just about technical performance; it&#39;s about ensuring that your products are user-friendly and align with the needs and expectations of your target audience. User feedback plays a crucial role in this aspect, as it provides insights into the user experience and helps shape product improvements.</p>', 'assets/images/blog/ac00afa204ce007a6a255a1fd0774640.png', '2024-01-07 05:03:00', '2024-01-16 16:56:20', 'active', 'assets/images/banners/c5ff834176d867d3f966395c83f2bbda.png', 'assets/images/banners/b04459fe5638748706a77266b8b98c67.png', 'How to build a website'),
(5, 'WHAT IS YOUR APPROACH TO TESTING AND IMPROVING QA?', 'IT INFRASTRUCTURE', 'IT INFRASTRUCTURE', '<p>Quality assurance and testing are the cornerstones of a successful product development process. In today&#39;s competitive landscape, ensuring that your products and services meet high-quality standards and deliver an exceptional user experience is vital. Neglecting the crucial aspects of quality assurance (QA) and testing can lead to bug-ridden releases and a stream of customer complaints. To prevent these issues, it&#39;s essential to adopt the right testing and QA approaches for your business. In this comprehensive guide, we&#39;ll explore the strategies and principles that can help you create a robust QA process.</p>\r\n\r\n<p>Defining Clear Quality Standards</p>\r\n\r\n<p>The foundation of an effective QA Testing strategy begins with defining clear quality standards for your products and services. To do this, consider establishing SMART goals &ndash; Specific, Measurable, Achievable, Realistic, and Time-bound. Setting these specific quality standards helps your team have a clear and unified vision of what is expected.</p>\r\n\r\n<p>Comprehensive Test Plans</p>\r\n\r\n<p>Creating a comprehensive test plan is another critical step in your QA strategy. A well-structured test plan should cover the scope of testing, objectives, test cases, test data, testing environments, and realistic timelines. This plan acts as your roadmap throughout the testing process, ensuring that nothing is left to chance.</p>\r\n\r\n<p>Embracing Automation</p>\r\n\r\n<p>Embracing test automation is paramount in modern QA practices. Automated testing helps reduce the workload of your QA team by handling repetitive and time-consuming test cases. It not only increases efficiency but also minimizes the likelihood of human error. By implementing automated testing tools and frameworks, you can enhance the overall effectiveness of your QA process.</p>\r\n\r\n<p>Continuous Integration and Continuous Testing</p>\r\n\r\n<p>Continuous Integration (CI) and Continuous Testing (CT) are crucial practices in modern software development. These methodologies involve the integration of code changes into the main codebase frequently, followed by automated testing. The goal is to identify and rectify issues at an early stage of development, ensuring the creation of a high-quality product. By continuously testing, you can catch and address issues as they arise, rather than letting them accumulate and become overwhelming.</p>\r\n\r\n<p>Performance and Security Testing</p>\r\n\r\n<p>A robust QA process should include rigorous performance and security testing. Performance testing ensures that your products can handle the anticipated user loads efficiently, helping to avoid performance bottlenecks or system crashes. This includes load testing, stress testing, and performance profiling. Simultaneously, security testing is essential to identify and mitigate vulnerabilities, safeguarding your products against data breaches and cyber threats.</p>\r\n\r\n<p>Usability and User Feedback</p>\r\n\r\n<p>Usability testing is a critical component of any QA strategy. It&#39;s not just about technical performance; it&#39;s about ensuring that your products are user-friendly and align with the needs and expectations of your target audience. User feedback plays a crucial role in this aspect, as it provides insights into the user experience and helps shape product improvements.</p>', 'assets/images/blog/ac00afa204ce007a6a255a1fd0774640.png', '2024-01-07 05:03:00', '2024-03-07 16:20:31', 'active', 'assets/images/banners/c5ff834176d867d3f966395c83f2bbda.png', 'assets/images/banners/b04459fe5638748706a77266b8b98c67.png', 'How to build a website');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `blog_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `parent_id`, `blog_id`, `name`, `email`, `comment`, `status`, `created_date`, `updated_date`) VALUES
(1, 0, 5, 'Raja', 'b.rajaramesh123@gmail.com', 'This blog stands out with its clear articulation of QA best practices. The focus on defining quality standards and incorporating automation resonates well with the need for efficiency in testing processes. The mention of performance and security testing adds a comprehensive touch.', 'active', '2024-01-14 17:02:26', '2024-01-14 17:37:21'),
(2, 0, 5, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', 'Kudos! The blog not only delves into the technicalities of QA but also emphasizes the user-friendly aspect with usability testing and user feedback. The \'Read more\' button is a smart move for those who want to explore further. Well-balanced and informative!', 'active', '2024-01-14 17:02:57', '2024-01-14 17:09:06'),
(3, 2, 5, 'Ram', 'b.rajaramesh123@gmail.com', 'This blog stands out with its clear articulation of QA best practices. The focus on defining quality standards and incorporating automation resonates well with the need for efficiency in testing processes. The mention of performance and security testing adds a comprehensive touch.', 'active', '2024-01-14 17:12:58', '2024-01-14 17:12:58'),
(4, 2, 5, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', 'Kudos! The blog not only delves into the technicalities of QA but also emphasizes the user-friendly aspect with usability testing and user feedback. The \'Read more\' button is a smart move for those who want to explore further. Well-balanced and informative!', 'active', '2024-01-14 17:14:56', '2024-01-14 17:14:56'),
(5, 0, 5, 'Raja', 'b.rajaramesh123@gmail.com', 'Neglecting the crucial aspects of quality assurance (QA) and testing can lead to bug-ridden releases and a stream of customer complaints. To prevent these issues, it\'s essential to adopt the right testing and QA approaches for your business.', 'active', '2024-01-14 17:16:58', '2024-01-14 17:37:06'),
(9, 5, 5, 'Ramesh', 'b.rajaramesh123@gmail.com', 'Hello,. I have the same problem with this discussion. My CSRF Token does not refresh after I click the next page.', 'active', '2024-01-14 17:24:35', '2024-01-14 17:24:35'),
(10, 1, 5, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', 'Kudos! The blog not only delves into the technicalities of QA but also emphasizes the user-friendly aspect with usability testing and user feedback. The \'Read more\' button is a smart move for those who want to explore further. Well-balanced and informative!', 'active', '2024-01-14 17:42:08', '2024-01-14 17:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `tag` varchar(1500) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'SEO', 'active', '2024-01-07 10:33:00', '2024-01-16 22:24:24'),
(2, 1, 'SEO', 'active', '2024-01-13 16:39:30', '2024-01-16 22:24:24'),
(3, 1, 'Design', 'active', '2024-01-13 16:39:30', '2024-01-16 22:24:24'),
(4, 1, 'Development', 'active', '2024-01-13 16:39:30', '2024-01-16 22:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `banner` varchar(250) DEFAULT NULL,
  `small_banner` varchar(250) DEFAULT NULL,
  `company_name` varchar(500) DEFAULT NULL,
  `company_logo` varchar(250) DEFAULT NULL,
  `employ_type` varchar(500) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `job_type` varchar(500) DEFAULT NULL,
  `experience` varchar(500) DEFAULT NULL,
  `qualifications` varchar(500) DEFAULT NULL,
  `salary` varchar(500) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `responsibilities` mediumtext DEFAULT NULL,
  `skills_qualifications` mediumtext DEFAULT NULL,
  `applied_count` int(11) NOT NULL DEFAULT 0,
  `total_vacancies` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `banner`, `small_banner`, `company_name`, `company_logo`, `employ_type`, `location`, `job_type`, `experience`, `qualifications`, `salary`, `description`, `responsibilities`, `skills_qualifications`, `applied_count`, `total_vacancies`, `status`, `created_date`, `updated_date`) VALUES
(1, 'assets/images/banners/78c0dee3370fac9c4819a938d3acdd92.png', 'assets/images/banners/caafc997bb1d83d58f93d345a0b898bd.png', 'Shiv Soft Experts', 'assets/images/careers/dfb93974356151f21dbb26e8e7eed906.png', 'Part Time', 'Hyderabad, India', 'Back-end Developer', '2+ Year', 'MCA', '50k to 70k', '<p>One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others - which creates a distinct visual impression. Moreover, in Latin only words at the beginning of sentences are capitalized.</p>\r\n\r\n<p>This means that Lorem Ipsum cannot accurately represent, for example, German, in which all nouns are capitalized. Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts. If the fill text is intended to illustrate the characteristics of different typefaces.</p>\r\n\r\n<p>It sometimes makes sense to select texts containing the various letters and symbols specific to the output language.</p>\r\n', '<p>It sometimes makes sense to select texts containing the various letters and symbols specific to the output language.</p>\r\n\r\n<ul>\r\n	<li>Proven experience as a .NET Developer or Application Developer</li>\r\n	<li>good understanding of SQL and Relational Databases, specifically Microsoft SQL Server.</li>\r\n	<li>Experience designing, developing and creating RESTful web services and APIs</li>\r\n	<li>Basic know how of Agile process and practices</li>\r\n	<li>Good understanding of object-oriented programming.</li>\r\n	<li>Good understanding of concurrent programming.</li>\r\n	<li>Sound knowledge of application architecture and design.</li>\r\n	<li>Excellent problem solving and analytical skills</li>\r\n</ul>\r\n', '<p>It sometimes makes sense to select texts containing the various letters and symbols specific to the output language.</p>\r\n\r\n<ul>\r\n	<li>Proven experience as a .NET Developer or Application Developer</li>\r\n	<li>good understanding of SQL and Relational Databases, specifically Microsoft SQL Server.</li>\r\n	<li>Experience designing, developing and creating RESTful web services and APIs</li>\r\n	<li>Basic know how of Agile process and practices</li>\r\n	<li>Good understanding of object-oriented programming.</li>\r\n	<li>Good understanding of concurrent programming.</li>\r\n	<li>Sound knowledge of application architecture and design.</li>\r\n	<li>Excellent problem solving and analytical skills</li>\r\n</ul>\r\n', 0, 10, 'active', '2024-01-14 22:39:46', '2024-01-15 19:29:06'),
(2, 'assets/images/banners/78c0dee3370fac9c4819a938d3acdd92.png', 'assets/images/banners/caafc997bb1d83d58f93d345a0b898bd.png', 'Shiv Soft Experts', 'assets/images/careers/dfb93974356151f21dbb26e8e7eed906.png', 'Full Time', 'Puna, India', 'Front-end Developer', '2+ Year', 'MCA', '50k to 70k', '<p>One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others - which creates a distinct visual impression. Moreover, in Latin only words at the beginning of sentences are capitalized.</p>\r\n\r\n<p>This means that Lorem Ipsum cannot accurately represent, for example, German, in which all nouns are capitalized. Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts. If the fill text is intended to illustrate the characteristics of different typefaces.</p>\r\n\r\n<p>It sometimes makes sense to select texts containing the various letters and symbols specific to the output language.</p>\r\n', '<p>It sometimes makes sense to select texts containing the various letters and symbols specific to the output language.</p>\r\n\r\n<ul>\r\n	<li>Proven experience as a .NET Developer or Application Developer</li>\r\n	<li>good understanding of SQL and Relational Databases, specifically Microsoft SQL Server.</li>\r\n	<li>Experience designing, developing and creating RESTful web services and APIs</li>\r\n	<li>Basic know how of Agile process and practices</li>\r\n	<li>Good understanding of object-oriented programming.</li>\r\n	<li>Good understanding of concurrent programming.</li>\r\n	<li>Sound knowledge of application architecture and design.</li>\r\n	<li>Excellent problem solving and analytical skills</li>\r\n</ul>\r\n', '<p>It sometimes makes sense to select texts containing the various letters and symbols specific to the output language.</p>\r\n\r\n<ul>\r\n	<li>Proven experience as a .NET Developer or Application Developer</li>\r\n	<li>good understanding of SQL and Relational Databases, specifically Microsoft SQL Server.</li>\r\n	<li>Experience designing, developing and creating RESTful web services and APIs</li>\r\n	<li>Basic know how of Agile process and practices</li>\r\n	<li>Good understanding of object-oriented programming.</li>\r\n	<li>Good understanding of concurrent programming.</li>\r\n	<li>Sound knowledge of application architecture and design.</li>\r\n	<li>Excellent problem solving and analytical skills</li>\r\n</ul>\r\n', 0, 10, 'active', '2024-01-14 22:57:49', '2024-03-07 21:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image_path`, `status`, `created_at`) VALUES
(1, 'assets/images/clients/4386fec62baa9250a3f650dc57c07217.png', 'active', '2024-01-07 08:22:37'),
(2, 'assets/images/clients/392408f1645cd6f47bfb6a5f6f791162.png', 'active', '2024-01-07 08:22:42'),
(3, 'assets/images/clients/a6531d8c99a64f85f5ac068463d3db0a.png', 'active', '2024-01-07 08:22:45'),
(4, 'assets/images/clients/9fbb54f4a5ac7a52e197609d6f353315.png', 'active', '2024-01-07 08:22:50'),
(5, 'assets/images/clients/a7cfaa5cc8b660b8cda21121e62cc323.png', 'active', '2024-01-07 08:22:54'),
(6, 'assets/images/clients/50a7d1b04d347bfe35b89e50e4bf21f8.png', 'active', '2024-01-07 08:22:58'),
(7, 'assets/images/clients/18f8620c1c392e29cfda954612a3cd11.png', 'active', '2024-01-07 08:23:03'),
(8, 'assets/images/clients/028c8ebd20cb935fa20bb2739998eea6.png', 'active', '2024-01-07 08:23:08'),
(9, 'assets/images/clients/968d2112a78593735f5d0e9c87f8f73b.png', 'active', '2024-01-07 08:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(1000) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `company`, `message`, `created_date`) VALUES
(1, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '8895568688', 'Vayatronics', 'Test Message', '2024-01-07 11:33:25'),
(2, NULL, NULL, NULL, NULL, NULL, '2024-01-13 06:18:40'),
(3, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '+918895568688', NULL, 'dsgsdg', '2024-01-13 06:26:21'),
(4, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '+918895568688', NULL, 'sgdsg', '2024-01-13 06:28:37'),
(5, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '+918895568688', 'dsgsd', 'gsdg', '2024-01-13 06:30:17'),
(6, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '+918895568688', 'sdg', 'sdgsd', '2024-01-13 06:31:40'),
(7, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '+918895568688', 'sfghsfsfhsf', 'sfhsf', '2024-01-31 03:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `discover`
--

CREATE TABLE `discover` (
  `id` int(11) NOT NULL,
  `banner` varchar(250) DEFAULT NULL,
  `banner_2` varchar(250) DEFAULT NULL,
  `header_title` varchar(1000) DEFAULT NULL,
  `header_description` text DEFAULT NULL,
  `footer_title` tinytext DEFAULT NULL,
  `footer_description` text DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `body_title` varchar(1000) DEFAULT NULL,
  `meta_data` text DEFAULT NULL,
  `type` enum('why_shivsoft','our_process','about_us','payroll') NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discover`
--

INSERT INTO `discover` (`id`, `banner`, `banner_2`, `header_title`, `header_description`, `footer_title`, `footer_description`, `image_path`, `body_title`, `meta_data`, `type`, `updated_date`) VALUES
(1, 'assets/images/banners/6a58ca80316a27f16341886fc44be6f0.png', 'assets/images/banners/7d8abdcde59794de556d9a07aedf0a87.png', 'EXPECT THE EXTRAORDINARY', '<p>Shiv Software Experts conceived and developed in the realm of the extraordinary. Right from the beginning, we were rooted in surpassing conventional tech solutions and fostering meaningful connections.<br />\r\nFor us, the varying requirements of our clients are our vested interest. We delve deep into the nuances of your immediate requirements and future aspirations &ndash; and leverage the pinnacle of technical brilliance and cultural congruence tailored to those precise ambitions. Our relentless pursuit involves furnishing solutions steeped in experiential wisdom and managed service paradigms that empower you to preserve assets and insights. We transcend anticipations &ndash; with unwavering consistency, every time.</p>\r\n', 'LET’S CONNECT! <br/> WE ARE PASSIONATE ABOUT PEOPLE AND CONNECTIONS!', '<p>We are the know-how of the tech landscape and how it works. Through our integrated network and collaborations, we wield a trustworthy repository of insights that fuels us to deliver innovative solutions.<br />\r\nOur offerings are bespoke and moulded meticulously to mirror your distinctive ethos, ventures, technologies, and aspirations. When you opt for Shivsoft Experts, you welcome a realm of personalized, proficient, and customized assistance from individuals who embody trustworthiness.</p>\r\n', 'assets/images/banners/0c9664beec28cf2653aa20a7d62bd301.png', 'THE SHIV ADVANTAGE', 'EXPECT THE EXTRAORDINARY', 'why_shivsoft', '2024-01-21 18:37:19'),
(2, 'assets/images/banners/2bc0c05ac990eb22e2f1838a2d31061b.png', 'assets/images/banners/4a839b6ff48b693f09aec3a9dd98d4de.png', 'DIVE INTO OUR PROCESSES TO KNOW HOW WE DELIVER EXPERT SOLUTIONS.', 'Welcome to Shiv Software Experts, where passion and excellence drive our team of professionals every day. With over 4 years of experience, we have become the trusted partner for groundbreaking solutions that redefine the tech industry\'s landscape. At Shiv Software Experts, success pulsates through our way of life. Our dynamic team shares a collective mission: to inspire and ignite success in every venture we undertake. We have successfully served various industries, including hi-tech, real estate, and retail. Innovation is our lifeblood, setting us apart from competitors. Whether you\'re a thriving industry leader or an ambitious start-up, we welcome you to join us on this extraordinary adventure. Let us empower your business with our exceptional software expertise and unwavering commitment. With our tailored software development solutions and top-notch IT staffing services, we aim to surpass your expectations and deliver the best results. Trust us to redefine the possibilities and drive your business forward.\r\n<br />\r\nWe welcome you to have a sneak peek of how we work. Our relationship with you brews over a cup of coffee, enabling us to know you better with every sip. We pay keen attention to discovering you, your ethics, values, and business. We believe that a robust partnership starts from knowing each other better.', 'CUSTOMIZED, INNOVATIVE AND HASSLE-FREE STAFFING SOLUTIONS', 'Are you looking for top-notch staff solutions to propel your business? Look no further, we are here to help you!\r\n<br /><br />\r\nAt Shivsoft Experts, our commitment revolves around surpassing mere expectations and conventional solutions. Placing you at the pinnacle of our concerns, we are ceaselessly driven to craft tailor-made, ingenious solutions that align seamlessly with your requisites—no matter how unique they might be.\r\n<br /><br />\r\nOur adept navigators are unwaveringly committed to designing mavens who not only exhibit technical prowess but also radiate zeal, resilience, and an unwavering resolve to triumph in any professional arena we immerse them. With an array of comprehensive remedies and adept consultants catering to a kaleidoscope of needs, consider your concerns comprehensively addressed.\r\n<br /><br />\r\nExpertise is vital, yet so is the essence of a harmonious environment. At Shivsoft Experts, our team possesses the expertise to pose the perfect queries, adeptly uncovering the ideal individuals poised to integrate seamlessly into your professional tapestry.', 'assets/images/banners/d2e28d695421e63e7b6dd596433a2ffb.png', 'THE SHIV ADVANTAGE', 'DIVE INTO OUR PROCESSES TO KNOW HOW WE DELIVER EXPERT SOLUTIONS.', 'our_process', '2024-01-11 08:30:42'),
(3, 'assets/images/banners/55bef69b01756b35941c3dd2b73ba987.png', 'assets/images/banners/e8c304cb34cd5640bbef77f7842e3c09.png', 'THE BEST IT SOLUTION WITH INDUSTRY EXPERIENCE', 'Welcome to Shiv Software Experts, where passion and excellence drive our dedicated team of professionals every day. With over 4 years of experience, we have become the trusted partner for groundbreaking solutions that redefine the tech industry\'s landscape.\r\n<br />\r\nAt Shiv Software Experts, success pulsates through our way of life. Our dynamic team shares a collective mission: to inspire and ignite success in every venture we undertake. We have successfully served various industries, including hi-tech, real estate, and retail.\r\n<br />\r\nWith Innovation is our lifeblood, setting us apart from competitors. Whether you\'re a thriving industry leader or an ambitious start-up, we welcome you to join us on this extraordinary adventure.', '', '', 'assets/images/banners/a6fd949318b54102ead0fe6209592bb6.png', '', 'THE BEST IT SOLUTION WITH INDUSTRY EXPERIENCE', 'about_us', '2024-01-07 10:26:42'),
(4, 'assets/images/banners/2ca595ce38de93e68c35d9aa2f09aa43.png', 'assets/images/banners/a050838319397bf7464021e9119415d3.png', '', 'At Shiv Software Experts, our prowess isn\'t restricted to technological solutions alone! We are experts in offering comprehensive Payroll Services to simplify your business operations. Our dedicated team understands the complexities of payroll management and is committed to delivering efficient and accurate solutions tailored to your needs.\r\n<br /><br />\r\nYou can bid adieu to outdated systems and time-consuming paperwork! We deliver advanced payroll software that automates the entire process, ensuring accuracy in every calculation, deduction, and tax withholding, all while complying with the latest regulations.\r\n<br /><br />\r\nNavigating through the fluctuating landscape of payroll taxes can be tricky! Need our expert services to ensure that your tax calculations and reporting will always be up-to-date and in line with the latest tax laws.\r\n<br /><br />\r\nContact us today and let\'s ensure that your payroll operations run smoothly without any hiccups.', '', '', 'assets/images/banners/ec5e8464c4e4ea29cb965bf2bc96475e.jpg', '', 'Payroll Meta Description', 'payroll', '2024-01-11 22:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `job_title` varchar(1000) DEFAULT NULL,
  `employment_type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `resume` varchar(300) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `career_id`, `name`, `email`, `phone_number`, `job_title`, `employment_type`, `description`, `resume`, `created_at`) VALUES
(1, 2, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '08895568688', 'Front-end Developer', 'Full Time', 'Test', 'assets/images/resumes/c1be7c296a926f1792439de0269d7af6.pdf', '2024-01-15 21:16:50'),
(2, 2, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '08895568688', 'Front-end Developer', 'Full Time', 'Test', 'assets/images/resumes/8a45de085650500bfdcc792677b5a03e.pdf', '2024-01-15 21:21:24'),
(3, 2, 'Raja Ramesh', 'b.rajaramesh123@gmail.com', '08895568688', 'Front-end Developer', 'Full Time', 'Test', 'assets/images/resumes/f034f503ef13941a3ab0421ebf84e0b5.pdf', '2024-01-31 08:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `unique_name` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `title`, `icon`, `url`, `unique_name`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', 'dashboard', 'dashboard', 1, 0, '2023-12-20 08:56:11', '2024-01-14 19:11:54'),
(2, 'Masters', 'fa fa-sliders', NULL, 'masters', 1, 1, '2023-12-20 08:56:22', '2024-01-14 19:25:37'),
(3, 'Services', 'fa fa-wrench', 'services', 'services', 1, 4, '2023-12-20 08:56:29', '2024-01-14 19:26:49'),
(4, 'Blog', 'fa fa-quote-left', 'common/blog', 'blog', 1, 7, '2023-12-20 08:56:36', '2024-01-14 19:27:14'),
(5, 'Our Process', 'fa fa-spinner', 'common/our_process', 'our_process', 1, 6, '2023-12-20 08:56:58', '2024-01-14 19:27:04'),
(6, 'Why Shivsoft', 'fa fa-thumb-tack', 'common/why_shivsoft', 'why_shivsoft', 1, 5, '2023-12-20 08:57:06', '2024-01-14 19:26:52'),
(8, 'About Us', 'fa fa-info-circle', 'common/about_us', 'about_us', 1, 9, '2023-12-20 08:57:06', '2024-01-14 19:27:23'),
(9, 'Staff Augmentation', 'fa fa-mortar-board', 'common/staff_augmentation', 'staff_augmentation', 1, 10, '2023-12-20 08:57:06', '2024-01-14 19:27:35'),
(10, 'Payroll', 'fa fa-dollar', 'common/payroll', 'payroll', 1, 11, '2023-12-20 08:57:06', '2024-01-14 19:27:44'),
(11, 'Contact List', 'fa fa-list', 'common/contact_us', 'contact_us', 1, 12, '2023-12-20 08:56:11', '2024-01-14 19:27:55'),
(12, 'Clients', 'fa fa-users', 'common/clients', 'clients', 0, 3, '2023-12-20 08:56:11', '2024-01-14 19:32:16'),
(13, 'Why Choose Us', 'fa fa-ioxhost', 'common/why_choose_us', 'why_choose_us', 0, 2, '2023-12-20 08:56:11', '2024-01-14 19:32:28'),
(14, 'Branches', 'fa fa-code-fork', 'common/branches', 'branches', 0, 2, '2023-12-20 08:56:11', '2024-01-14 19:32:19'),
(15, 'Careers', 'fa fa-mortar-board', 'common/careers', 'careers', 1, 8, '2023-12-20 08:57:06', '2024-01-14 19:27:35'),
(16, 'Applications', 'fa fa-file-pdf-o', 'common/applications', 'applications', 1, 8, '2023-12-20 08:57:06', '2024-01-16 22:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `our_process_points`
--

CREATE TABLE `our_process_points` (
  `id` int(11) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `small_description` tinytext NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_process_points`
--

INSERT INTO `our_process_points` (`id`, `icon`, `title`, `small_description`, `display_order`, `created_at`, `updated_at`, `status`) VALUES
(1, 'assets/images/icons/2e9bcb601af46434eec61a0e557f9b46.svg', 'It\'s coffee time!', 'We believe in the magic of human connections. That\'s why we invite you to discuss life and business over a cup of coffee. Let us dive deep into your business and what your requirements are. Let us explore each other.', 1, '2024-01-07 09:05:46', '2024-01-11 08:30:42', 'active'),
(2, 'assets/images/icons/7322e7b7d5e1783e3c72a89f792a67b3.svg', 'Creative Ideation', 'Now, we put our brains and souls to work inspiring the creative flow of ideas. Our experts architect a strategic framework oozing with creativity and professionalism aimed at driving your business to greater heights.', 2, '2024-01-07 09:06:38', '2024-01-11 08:30:42', 'active'),
(3, 'assets/images/icons/514585e0ad359246d683d4a47a54a420.svg', 'On to the Stage!', 'We understand that lifting the burden from your shoulders doesn\'t translate to sidelining your influence. As we construct the blueprint of your scope and strategy, we eagerly anticipate the grand presentation—a stage where our harmonious interplay begin', 3, '2024-01-07 09:06:38', '2024-01-11 08:30:42', 'active'),
(4, 'assets/images/icons/894207f47294c96d0d86b09f193e0bef.svg', 'Hand over!', 'This is where we surpass your expectations by delivering solutions that blow your mind away. However, in the most unlikely case, if you feel we haven’t amazed you yet, let’s change the narrative.', 4, '2024-01-07 09:06:38', '2024-01-11 08:30:42', 'active'),
(5, 'assets/images/icons/5f564a2ea1952cd0318abf88e33cdb7f.svg', 'Strategic management', 'We keep the game going, ensuring that you work flawlessly at every stage. We take the load off your back through our strategic management which monitors every project and checks your budgets meticulously.', 5, '2024-01-07 09:07:15', '2024-01-11 08:30:42', 'active'),
(6, 'assets/images/icons/dad5286d28dc24818984f49ee460a915.svg', 'At your door, all the time!', 'We extend continued support offering your consultants and resources who are geared up to fix any issues that may arise. We promise to be there for you, through thick and thin and bugs and threats!', 6, '2024-01-07 09:07:15', '2024-01-11 08:30:42', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `meta_data` text DEFAULT NULL,
  `title` tinytext NOT NULL,
  `code` varchar(500) DEFAULT NULL,
  `banner1` varchar(255) DEFAULT NULL,
  `banner2` varchar(255) DEFAULT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `display_order` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `meta_data`, `title`, `code`, `banner1`, `banner2`, `icon`, `description`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'At Shiv Software Experts, our professionals are passionate about developing inventive and intuitive apps that streamline your business. We embrace cutting-edge technology for application development that acts as a powerful tool to drive brand awareness and facilitate customer engagement. We create apps for Android, iOS, BlackBerry, and Windows platforms featuring the industry’s best standards and features', 'APPLICATION DEVELOPEMENT', 'application_developement', 'assets/images/banners/e8f381010beaf41152ed0e606bb01f9b.png', 'assets/images/banners/08cd4da6283beb8748f5095e6780b109.png', 'assets/images/service_icons/6dbfde41b3048528b11163f807a66bf4.png', '<p>At Shiv Software Experts, our professionals are passionate about developing inventive and intuitive apps that streamline your business. We embrace cutting-edge technology for application development that acts as a powerful tool to drive brand awareness and facilitate customer engagement. We create apps for Android, iOS, BlackBerry, and Windows platforms featuring the industry&rsquo;s best standards and features.</p>\r\n\r\n<p>Our specialized team of experts designs cross-platform, responsive apps with captivating user interfaces and ensures robust backend security. We don&rsquo;t care if you are a biggie or a start-up, our innovative app development services are tailored to meet the unique needs of your industry and business. With our expertise, your business can harness the power of technology to drive innovation, enhance user experiences, and achieve remarkable success.</p>\r\n\r\n<p>We take pride in consistently surpassing client expectations and keeping them ahead of the curve, delivering smiles with every project. Join us on this transformative journey toward app excellence and experience the profound difference our unrivaled expertise can make for your business. At Shiv Software Experts, we are your partners in success and the best web development company to empower your digital presence.</p>', 'active', 1, '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(2, 'We take quality, a little too seriously! At ShivsoftExpert Solutions, we pay meticulous attention to detail, ensuring that your services meet the highest standards of quality, reliability, and user satisfaction. It is needless to say that if you want to succeed, delivering high-quality software and applications is inevitable. This is why you need our flawless QA services.', 'QA SERVICES', 'qa_services', 'assets/images/banners/ea10aa7efa2d26aed2cbd0765c0a8dfe.png', 'assets/images/banners/3630132d7d6afdc792386d501c41afe0.png', 'assets/images/service_icons/52bfaf6de7cf3f41c88aa63395339e4f.png', '<p>We take quality, a little too seriously! At ShivsoftExpert Solutions, we pay meticulous attention to detail, ensuring that your services meet the highest standards of quality, reliability, and user satisfaction. It is needless to say that if you want to succeed, delivering high-quality software and applications is inevitable. This is why you need our flawless QA services.</p>\r\n\r\n<p>Our team of experienced QA professionals employs a comprehensive range of testing methodologies to identify and resolve any potential issues or bugs. From functional testing and regression testing to performance testing and security testing, we thoroughly test your software or application across multiple platforms.</p>\r\n\r\n<p>We handle all aspects of test planning, execution, and reporting, ensuring that your testing process is streamlined and efficient. By leveraging industry-leading tools and frameworks, we provide detailed test reports and actionable insights, allowing you to make informed decisions for continuous improvement.</p>\r\n\r\n<p>By automating repetitive and time-consuming test scenarios, we accelerate the testing process while maintaining high levels of accuracy.</p>\r\n\r\n<p>We place your users at the center of our testing process, helping you create exceptional experiences that drive user engagement and loyalty. Partner us today for unparalleled QA experience!</p>', 'active', 3, '2024-01-07 08:39:45', '2024-03-07 21:34:04'),
(3, 'Are you in search of a trusted ally to turbocharge your IT operations? Look no further. At ShivsoftExpert Solutions, we take immense pride in our mission to empower clients with unparalleled expertise and cutting-edge solutions. We firmly believe that to maintain a competitive edge, one must be armed with strategies tailored to the industry and the latest in technological innovation.', 'IT CONSULTING', 'it_consulting', 'assets/images/banners/dbd648b28d10eaad15b8af617db93753.png', 'assets/images/banners/1e273a8727fea414c0011b1240f647f0.png', 'assets/images/service_icons/bf3f8cb8825d9abac98ecd9853f16c1a.png', '<p>Are you in search of a trusted ally to turbocharge your IT operations? Look no further. At ShivsoftExpert Solutions, we take immense pride in our mission to empower clients with unparalleled expertise and cutting-edge solutions. We firmly believe that to maintain a competitive edge, one must be armed with strategies tailored to the industry and the latest in technological innovation.</p>\r\n\r\n<p>Within the realm of ShivsoftExpert Solutions, we recognize that each client is unique. Our cadre of dedicated IT consultants boasts a wealth of knowledge about the latest industry trends and a profound understanding of technology&#39;s transformative potential. Whether you&#39;re a budding startup or a well-established enterprise, our experts work in close collaboration with you to conduct a detailed evaluation of your existing IT infrastructure, pinpoint areas ripe for enhancement, and meticulously chart a tailored roadmap that harmonizes with your objectives.</p>\r\n\r\n<p>Our experts approach each engagement with painstaking analysis, industry insights, and a customer-centric ethos, delivering holistic IT strategies that supercharge performance, elevate efficiency, and magnify your return on investment. We empower you to boldly navigate the ever-evolving digital landscape and seize newfound opportunities as they emerge.</p>\r\n\r\n<p>Don&#39;t let outdated technology shackle your progress &ndash; allow us to unlock your business&#39;s full potential. Contact us today to arrange a consultation and embark on the first stride toward a brighter, more technologically advanced future. Prepare to reshape your path forward with the finest IT consulting services in town!</p>', 'active', 2, '2024-01-07 08:41:32', '2024-03-07 21:32:40'),
(4, 'Are you overwhelmed with numbers and statistics in this data-driven world? Let us help you with the adept power of visual storytelling. We offer ground-breaking data analytics services that empower you to make informed decisions based on actionable insights.', 'AI & DATA ANALYTICS', 'ai___data_analytics', 'assets/images/banners/647658cdd6ea3ad7e40b01d4c64ff104.png', 'assets/images/banners/b3913f236b73d6d4c13434fa1ef48cf0.png', 'assets/images/service_icons/100250aa999929435b917131021104cf.png', '<p>Are you overwhelmed with numbers and statistics in this data-driven world? Let us help you with the adept power of visual storytelling. We offer ground-breaking data analytics services that empower you to make informed decisions based on actionable insights.</p>\r\n\r\n<p>We believe that data is the fuel that drives successful organizations. Our acclaimed team specializes in extracting valuable insights from your raw data, uncovering patterns, trends, and correlations that can shape your strategic decision-making. Whether you&#39;re dealing with structured or unstructured data, we have the tools.</p>\r\n\r\n<p>Predictive analytics is the future of business intelligence. We deploy advanced data mining techniques and predictive modeling to forecast trends that help you identify opportunities and mitigate risks. Through intuitive charts, graphs, and dashboards, we empower you and your stakeholders to explore data in real time, identify trends, and gain valuable insights that can shape your business strategies.</p>\r\n\r\n<p>Contact us today and let&rsquo;s join together to turn your data into your greatest asset!</p>', 'active', 4, '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(5, 'At Shiv Software Experts, we believe that building a robust and scalable IT infrastructure is pivotal in propelling your business forward. We are here to power you with our all-inclusive range of IT infrastructure services that drive productivity, innovation, and growth.', 'IT INFRASTRUCTURE', 'it_infrastructure', 'assets/images/banners/636f4bb68a55a10df0f9858e009c9ea1.png', 'assets/images/banners/af8840107b92bf2b08237a3f1fa8e0a4.png', 'assets/images/service_icons/53af270eb6820b06aabce6b32367acce.png', '<p>At Shiv Software Experts, we believe that building a robust and scalable IT infrastructure is pivotal in propelling your business forward. We are here to power you with our all-inclusive range of IT infrastructure services that drive productivity, innovation, and growth.</p>\r\n\r\n<p>We host an intriguing team that closely collaborates with you to understand your unique needs, goals, and challenges. Whether you require on-premises solutions, cloud-based infrastructure, or a hybrid approach, we leverage industry best practices to architect and deploy a scalable infrastructure that aligns perfectly with your business requirements.</p>\r\n\r\n<p>Our team is extensively experienced in designing server and storage solutions befitting your specialized needs. We offer seamless data backup and disaster recovery solutions that safeguard your data and recover it in the event of unforeseen disruptions. Our virtualization experts leverage industry-leading technologies to consolidate your server resources, reduce hardware costs, and enhance efficiency.</p>\r\n\r\n<p>Wait no further and schedule a consultation today. Get onboard and let&rsquo;s elevate your business with robust and future-proof IT infrastructure.</p>', 'active', 5, '2024-01-07 08:53:34', '2024-03-07 21:32:27'),
(6, 'In today\'s highly interconnected landscape, fortifying your digital assets and ensuring the security of sensitive data has never been more vital. At ShivsoftExpert Solutions, we specialize in providing an extensive array of cutting-edge cyber security services to shield your assets from ever-evolving cyber threats. Relax, enjoy your coffee, and rest assured, we\'ve got you covered.', 'CLOUD & CYBER SECURITY', 'cloud___cyber_security', 'assets/images/banners/112b8142fd18ee96a2cd53eb051fa9ae.png', 'assets/images/banners/3e432f50bf9680b971bb0284ff0480c5.png', 'assets/images/service_icons/9051ef3cff330d095169a822d1fb8cb4.png', '<p>In today&#39;s highly interconnected landscape, fortifying your digital assets and ensuring the security of sensitive data has never been more vital. At ShivsoftExpert Solutions, we specialize in providing an extensive array of cutting-edge cyber security services to shield your assets from ever-evolving cyber threats. Relax, enjoy your coffee, and rest assured, we&#39;ve got you covered.</p>\r\n\r\n<p>Our team of cyber security experts meticulously executes a range of strategies to evaluate your vulnerabilities, comprehend your specific needs, and craft tailor-made solutions that directly address your organization&#39;s distinctive challenges. We employ state-of-the-art tools and methodologies, encompassing in-depth analysis, vulnerability scanning, and penetration testing, ensuring there are no weak links in your defense.</p>\r\n\r\n<p>Here at ShivsoftExpert Solutions, we harness advanced threat detection technologies and employ machine learning algorithms to maintain real-time vigilance over your systems. Our 24/7 monitoring enables us to swiftly identify and respond to potential threats, thereby minimizing the risk of any potential damage. In the unlikely event of an incident, our dedicated support team remains on standby around the clock, ready to deliver rapid incident response and guide you through the recovery process.</p>\r\n\r\n<p>Don&#39;t leave your cyber security to chance. Contact us today to arrange a consultation and take the first step towards a more secure, resilient future. ShivsoftExpert Solutions is your trusted partner in cyber security, ensuring your IT security strategy is top-notch in the industry.</p>', 'active', 6, '2024-01-07 08:56:52', '2024-03-07 21:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `services_offered`
--

CREATE TABLE `services_offered` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `offered_service` varchar(1500) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_offered`
--

INSERT INTO `services_offered` (`id`, `service_id`, `offered_service`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'Innovative, Inventive, and Custom-made Apps', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(2, 1, 'Compelling User Interfaces', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(3, 1, 'Tailored Solutions for Every Business', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(4, 1, 'Robust Backend Security', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(5, 1, 'Power of Technology to Drive Innovation', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(6, 3, ' Customised IT Consulting', 'active', '2024-01-07 08:41:32', '2024-03-07 21:32:40'),
(7, 3, 'Industry-fit Strategies', 'active', '2024-01-07 08:42:30', '2024-03-07 21:32:40'),
(8, 3, 'Intricate Technology Assessment', 'active', '2024-01-07 08:42:30', '2024-03-07 21:32:40'),
(9, 3, 'Transformative Technological Innovation', 'active', '2024-01-07 08:42:30', '2024-03-07 21:32:40'),
(10, 3, 'Future-driven IT solutions', 'active', '2024-01-07 08:42:30', '2024-03-07 21:32:40'),
(11, 3, 'Unparalleled Expertise', 'active', '2024-01-07 08:42:30', '2024-03-07 21:32:40'),
(12, 2, ' Meticulous Attention to Quality', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(13, 2, 'Error-free QA services', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(14, 2, 'Multi-platform Testing for Maximum Efficiency', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(15, 2, 'Comprehensive Testing Methodologies', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(16, 2, 'Detailed Test Reports and Actionable Insights', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(17, 4, ' Ground-Breaking Data Analytics', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(18, 4, 'Specialists in Extracting Valuable Insights', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(19, 4, 'Advanced Data Mining Techniques & Predictive Modelling', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(20, 4, 'Real-Time Data Exploration', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(21, 4, 'Informed Decisions', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(22, 5, 'All-Inclusive IT Infrastructure Services', 'active', '2024-01-07 08:53:34', '2024-03-07 21:32:27'),
(23, 5, 'Customized Solutions Tailored to Your Requirements', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(24, 5, 'Industry-best Practices & Scalable Infrastructure', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(25, 5, 'Seamless Data Backup and Disaster Recovery', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(26, 5, 'Robust and Future-Proof Solutions', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(27, 6, 'Cutting-Edge Cybersecurity Services', 'active', '2024-01-07 08:56:52', '2024-03-07 21:43:48'),
(28, 6, 'State-of-the-Art Tools and Methodologies', 'active', '2024-01-07 08:57:14', '2024-03-07 21:43:48'),
(29, 6, 'Real-Time Threat Detection', 'active', '2024-01-07 08:57:14', '2024-03-07 21:43:48'),
(30, 6, 'Rapid Incident Response', 'active', '2024-01-07 08:57:14', '2024-03-07 21:43:48'),
(31, 6, 'Proactive Monitoring', 'active', '2024-01-07 08:57:14', '2024-03-07 21:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `service_technologies`
--

CREATE TABLE `service_technologies` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_technologies`
--

INSERT INTO `service_technologies` (`id`, `service_id`, `image_path`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'assets/images/service_technologies/f22f977d8806f8bb033306f68a6bd4b4.webp', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(2, 1, 'assets/images/service_technologies/9a014b4942f5b237489dbe9c8995bfe3.webp', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(3, 1, 'assets/images/service_technologies/83627ca887eb3e468d374be265594591.webp', 'active', '2024-01-07 08:33:02', '2024-03-07 21:34:08'),
(4, 2, 'assets/images/service_technologies/3c71bda0e320c76c0e1197323880ffb8.webp', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(5, 2, 'assets/images/service_technologies/72c42c6d5a7166314af32f856c6797ed.png', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(6, 2, 'assets/images/service_technologies/ec8b87986c20099f02bc6acb942bb4c6.png', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(7, 2, 'assets/images/service_technologies/87ac0646c79717a4c3ec8d0a148aac94.png', 'active', '2024-01-07 08:46:11', '2024-03-07 21:34:04'),
(8, 4, 'assets/images/service_technologies/22917044f01623bbc8e5baede867119d.jpeg', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(9, 4, 'assets/images/service_technologies/6a84a7981b2952f2eabd90909055103a.png', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(10, 4, 'assets/images/service_technologies/d73fde6d3f429630624d5ebfbceb53ca.jpg', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(11, 4, 'assets/images/service_technologies/2ec5884f9e56993ed0fc948420fe480f.png', 'active', '2024-01-07 08:52:07', '2024-03-07 21:44:15'),
(12, 5, 'assets/images/service_technologies/561d18c40cdcc6fd13010c3045dd9877.png', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(13, 5, 'assets/images/service_technologies/dcb03e3d066bbc04017d6bbbcc1ad829.png', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(14, 5, 'assets/images/service_technologies/970d7e2263b2c1f01a0e5c95f9200178.png', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(15, 5, 'assets/images/service_technologies/5402a2a4be0be7e9162ee9a631d8de4e.png', 'active', '2024-01-07 08:54:36', '2024-03-07 21:32:27'),
(16, 6, 'assets/images/service_technologies/45cb5d5175a14150e3fa1850d825764c.png', 'active', '2024-01-07 08:56:52', '2024-03-07 21:43:48'),
(17, 6, 'assets/images/service_technologies/ae73268312aecc8a2821ede1359ff7cc.png', 'active', '2024-01-07 08:56:52', '2024-03-07 21:43:48'),
(18, 6, 'assets/images/service_technologies/30541c0016eaa006c85cdc8e6bf0e6d0.png', 'active', '2024-01-07 08:56:52', '2024-03-07 21:43:48'),
(19, 6, 'assets/images/service_technologies/64eb8508b62631e05afe8034bc9d6805.png', 'active', '2024-01-07 08:56:52', '2024-03-07 21:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `full_title` varchar(500) DEFAULT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `youtube` varchar(500) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `linked_in` varchar(500) DEFAULT NULL,
  `support_mail` varchar(250) DEFAULT NULL,
  `support_number` varchar(20) DEFAULT NULL,
  `terms` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `about_us` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `privacy_policy` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sms_sender_id` varchar(50) DEFAULT NULL,
  `sms_username` varchar(50) DEFAULT NULL,
  `sms_password` varchar(50) DEFAULT NULL,
  `created_at` varchar(25) DEFAULT NULL,
  `updated_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `full_title`, `logo`, `favicon`, `facebook`, `youtube`, `twitter`, `linked_in`, `support_mail`, `support_number`, `terms`, `about_us`, `privacy_policy`, `sms_sender_id`, `sms_username`, `sms_password`, `created_at`, `updated_at`) VALUES
(1, 'SHIV', 'Shiv Software Experts', 'assets/images/logo/81fcfadac24aad0e31b429255c35c62b.png', 'assets/images/logo/dc7592dca5537f4adf43a00e3863f03e.png', 'https://www.facebook.com/', 'https://www.Instagram.com/', 'www.twitter.com', 'https://www.linkedin.com/company/shiv-software-experts/?originalSubdomain=in', 'contact@shivsoftexperts.com', '8895568688', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', '', '', NULL, '1704991905');

-- --------------------------------------------------------

--
-- Table structure for table `staff_augmentation`
--

CREATE TABLE `staff_augmentation` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `display_order` tinyint(4) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_augmentation`
--

INSERT INTO `staff_augmentation` (`id`, `title`, `description`, `image_path`, `created_date`, `updated_date`, `display_order`, `status`) VALUES
(1, 'PERMANENT STAFFING SOLUTION', '<p>Do you want a long-term and committed team who aligns with your company&#39;s vision and culture? Welcome to Shiv Software Experts! We are the leading providers of specialized permanent staffing solutions that connect you with exceptional talent, empowering your business to thrive and grow.</p>\r\n\r\n<p>Finding the right set of workforces is pivotal for long-term success. With us, you can sit back and relax as we bring to you a devoted set of employees that are committed to making a lasting impact on your organization.</p>\r\n\r\n<p>We understand that each industry has unique requirements. Our experienced recruiters possess in-depth knowledge and understanding of various sectors, enabling them to connect you with the specialized talent your business needs. Drop a message and let&#39;s build a strong and cohesive team that will drive your organization&#39;s success in the long run.</p>\r\n', 'assets/images/icons/84dfc1c05ab531d9720f8c84b92876e9.jpg', '2024-01-07 09:08:39', '2024-01-07 09:08:39', 1, 'active'),
(2, 'CONTRACT STAFFING SOLUTION', '<p>If you are looking for specialized expertise without the need for permanent hires, look no further. We provide contract staffing solutions that are designed to cater to the unique requirements of your business. From talent identification to candidate evaluation to onboarding, we have everything covered!</p>\r\n\r\n<p>At Shiv Software Experts, we dedicate time to carefully understand your requirements before crafting a customised solution for you. We leverage our extensive network and sourcing techniques to bring in a pool of top-tier professionals.</p>\r\n\r\n<p>We take immense pride in offering you the flexibility, expertise, and peace of mind to conquer new opportunities and propel your organization to greater heights. Contact us today and let us be your trusted staffing partner!</p>\r\n', 'assets/images/icons/3e08ece4db5db2eaac902663db99159f.jpg', '2024-01-07 09:08:59', '2024-01-07 09:08:59', 2, 'active'),
(3, 'TEMPORARY STAFFING SOLUTION', '<p>Are you troubled by a sudden surge in workload or seasonal demands or unexpected employee absences? At Shiv Software Experts, we offer comprehensive Temporary Staffing Solutions that drive workforce agility while meeting your dynamic business needs. We offer an extensive talent pool of skilled professionals that are intricately screened to match your requirements.</p>\r\n\r\n<p>With our temporary staffing solutions, you can seamlessly scale your workforce according to fluctuating demands without the constraints of long-term commitments. We deliver hassle-free and time-saving solutions while you can gear up for an updated workforce.</p>\r\n\r\n<p>SSE is a call away to provide the right talent when you need it most. Book your appointment today and let us diligently bridge your employee gap!</p>\r\n', 'assets/images/icons/f0b2866c6d67206976833d0029bb0a27.jpg', '2024-01-07 09:09:18', '2024-01-07 09:09:18', 3, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(500) NOT NULL,
  `unique_name` varchar(150) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `title`, `url`, `unique_name`, `main_menu_id`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Profile Settings', 'profile_settings', 'profile_settings', 2, 0, 0, '', NULL),
(2, 'Common Settings', 'settings', 'settings', 2, 1, 1, '', NULL),
(4, 'Clients', 'common/clients', 'clients', 2, 4, 1, '', NULL),
(5, 'Why Choose Us', 'common/why_choose_us', 'why_choose_us', 2, 5, 1, '', NULL),
(6, 'Website Settings', 'common/website_settings', 'website_settings', 2, 2, 1, '', NULL),
(7, 'Branches', 'common/branches', 'branches', 2, 3, 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_data`
--

CREATE TABLE `website_data` (
  `id` int(11) NOT NULL,
  `banner_video_path` varchar(1000) DEFAULT NULL,
  `small_banner` varchar(500) DEFAULT NULL,
  `text1` varchar(500) DEFAULT NULL,
  `text2` varchar(500) DEFAULT NULL,
  `text3` varchar(500) DEFAULT NULL,
  `slider_text` varchar(1000) DEFAULT NULL,
  `home_meta_data` text DEFAULT NULL,
  `staff_augmentation_banner` varchar(500) DEFAULT NULL,
  `staff_augmentation_small_banner` varchar(500) DEFAULT NULL,
  `staff_augmentation_meta_data` text DEFAULT NULL,
  `blog_list_banner` varchar(500) DEFAULT NULL,
  `blog_list_small_banner` varchar(500) DEFAULT NULL,
  `blog_list_meta_data` text DEFAULT NULL,
  `footer_about_us` text DEFAULT NULL,
  `contact_us_heading` varchar(1000) DEFAULT NULL,
  `contact_us_description` text DEFAULT NULL,
  `why_choose_us_image` varchar(250) DEFAULT NULL,
  `career_banner` varchar(250) DEFAULT NULL,
  `career_small_banner` varchar(250) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_data`
--

INSERT INTO `website_data` (`id`, `banner_video_path`, `small_banner`, `text1`, `text2`, `text3`, `slider_text`, `home_meta_data`, `staff_augmentation_banner`, `staff_augmentation_small_banner`, `staff_augmentation_meta_data`, `blog_list_banner`, `blog_list_small_banner`, `blog_list_meta_data`, `footer_about_us`, `contact_us_heading`, `contact_us_description`, `why_choose_us_image`, `career_banner`, `career_small_banner`, `created_date`, `updated_date`) VALUES
(1, 'https://d1qx3sguuyswtz.cloudfront.net/wetransfer_video_image_2-png_2023-08-28_1816/Sequence%2001_5.mp4', 'assets/images/banners/b8da3321223a70ab00c35cfc17c42945.png', 'INNOVATE', 'AUTOMATE', 'ACCELERATE', 'Innovative Staffing Solutions from the Experts', 'Discover the power of seamless solutions with our team of software experts. Unlock your full potential and take your business to new heights. From custom development to integration and support, we have the expertise you need.', 'assets/images/banners/ff89ac43772d9337469a1ce0720adcb9.png', 'assets/images/banners/e84525f2d870cea804a661d80bf6dac4.png', 'Staff Augmentation Meta Description', 'assets/images/banners/81c3e52be4b81989e165347e4b20e1a4.png', 'assets/images/banners/d34e737b273ba2ab3aad3d9acc4555e7.png', 'Blog List Meta Description', 'Welcome to Shiv Software Experts, where passion and excellence drive our team of professionals every day. With over 4 years of experience, we have become the trusted partner for groundbreaking solutions.', 'Ready To Talk<br />With An Expert?', 'Ready To Talk With An Expert? We value our partnerships above everything. Whether you’re looking to grow, innovate, or design, we’ll sit down with you to discuss your desired outcomes, creating a customized support plan that works for you. Connect with one of our dedicated consultants today to discuss how shiv software experts can help you reach your business goals.', 'assets/images/banners/ac6ca6a96522c8588c0a1737f2375b71.jpg', 'assets/images/banners/faad4505aac449ee27a6f98e7efc2166.png', 'assets/images/banners/87862b81654c2a345784a3891d08ebe5.png', '2024-01-07 05:18:45', '2024-01-15 04:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` tinytext DEFAULT NULL,
  `display_order` tinyint(4) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `image_path`, `title`, `description`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/icons/09e90e4e8c4582f92a951551bd32d473.png', 'Easy Customization', 'Our tools are user-friendly, accessible, and efficient, serving clear benefits with every deliverable.', 1, 'active', '2024-01-07 08:24:00', '2024-01-07 08:24:00'),
(2, 'assets/images/icons/d2a62f6187a9370b659606daef7786c5.png', 'Standard Of Excellence', 'Experience simplicity and efficiency with our easy-to-use customization tools, designed to meet your needs.', 2, 'active', '2024-01-07 08:24:31', '2024-01-07 08:24:31'),
(3, 'assets/images/icons/67e1dd2a34fcc998628ab9b57340a3c1.png', 'Cost Effective', 'Our user-friendly customization tools offer clear benefits at affordable prices.', 3, 'active', '2024-01-07 08:24:58', '2024-01-07 08:24:58'),
(4, 'assets/images/icons/b3baf2704c048a6ef49c6816c7304854.png', 'Solid Teamwork', 'Collaborate effortlessly with our efficient and accessible customization tools, driving clear results for your team.', 4, 'active', '2024-01-07 08:25:29', '2024-01-07 08:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `why_shivsoft_points`
--

CREATE TABLE `why_shivsoft_points` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `small_description` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_shivsoft_points`
--

INSERT INTO `why_shivsoft_points` (`id`, `title`, `small_description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Passion', 'We are passionate about all things digital.', '2024-01-07 09:03:40', '2024-01-21 18:37:19', 'active'),
(2, 'Perseverance', 'We persevere to be better every day.', '2024-01-07 09:04:37', '2024-01-21 18:37:19', 'active'),
(3, 'Determination', 'We are determined to surpass expectations.', '2024-01-07 09:04:37', '2024-01-21 18:37:19', 'active'),
(4, 'Creativity', 'We inspire creativity in everything we do.', '2024-01-07 09:04:37', '2024-01-21 18:37:19', 'active'),
(5, 'Belongingness', 'We are united by the sense of belongingness.', '2024-01-07 09:04:37', '2024-01-21 18:37:19', 'active'),
(6, 'Extraordinary', 'We defile traditions to push the boundaries.', '2024-01-07 09:04:37', '2024-01-21 18:37:19', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `ip_address` (`ip_address`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_ibfk_1` (`blog_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discover`
--
ALTER TABLE `discover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_process_points`
--
ALTER TABLE `our_process_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_offered`
--
ALTER TABLE `services_offered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_technologies`
--
ALTER TABLE `service_technologies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_augmentation`
--
ALTER TABLE `staff_augmentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_menu_id` (`main_menu_id`);

--
-- Indexes for table `website_data`
--
ALTER TABLE `website_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_shivsoft_points`
--
ALTER TABLE `why_shivsoft_points`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discover`
--
ALTER TABLE `discover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `our_process_points`
--
ALTER TABLE `our_process_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services_offered`
--
ALTER TABLE `services_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `service_technologies`
--
ALTER TABLE `service_technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_augmentation`
--
ALTER TABLE `staff_augmentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `website_data`
--
ALTER TABLE `website_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `why_shivsoft_points`
--
ALTER TABLE `why_shivsoft_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD CONSTRAINT `blog_tags_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `services_offered`
--
ALTER TABLE `services_offered`
  ADD CONSTRAINT `services_offered_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `service_technologies`
--
ALTER TABLE `service_technologies`
  ADD CONSTRAINT `service_technologies_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
