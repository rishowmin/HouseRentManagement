-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 08:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `houserent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbills`
--

CREATE TABLE `tblbills` (
  `id` int(11) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `renter_id` varchar(255) NOT NULL,
  `b_invoice_no` varchar(255) NOT NULL,
  `bill_month` varchar(255) NOT NULL,
  `bill_date` varchar(255) NOT NULL,
  `bill_electricity` varchar(255) NOT NULL,
  `bill_gas` varchar(255) NOT NULL,
  `bill_water` varchar(255) NOT NULL,
  `bill_internet` varchar(255) NOT NULL,
  `bill_total` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `b_type` varchar(255) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbills`
--

INSERT INTO `tblbills` (`id`, `bill_id`, `renter_id`, `b_invoice_no`, `bill_month`, `bill_date`, `bill_electricity`, `bill_gas`, `bill_water`, `bill_internet`, `bill_total`, `received_by`, `b_type`, `ysnactive`) VALUES
(1, 'BILL1', 'RENTER1', 'VOUCHER#1', 'January 2022', '2022-01-07', '1000', '900', '600', '1000', '3500', 'Showmin', 'Utility Bill', b'1'),
(2, 'BILL2', 'RENTER2', 'VOUCHER#2', 'January 2022', '2022-01-04', '500', '500', '500', '500', '2000', 'R Showmin', 'Utility Bill', b'1'),
(3, 'BILL3', 'RENTER3', 'VOUCHER#3', 'January 2022', '2022-01-10', '500', '500', '500', '1000', '2500', 'Raisul', 'Utility Bill', b'1'),
(4, 'BILL4', 'RENTER1', 'VOUCHER#4', 'December 2022', '2022-03-12', '500', '500', '500', '500', '2000', '', 'Utility Bill', b'1'),
(5, 'BILL5', 'RENTER1', 'VOUCHER#5', 'November 2022', '2022-05-09', '500', '500', '500', '500', '2000', 'Raisul', 'Utility Bill', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinesssettings`
--

CREATE TABLE `tblbusinesssettings` (
  `id` int(11) NOT NULL,
  `business_title_en` varchar(255) NOT NULL,
  `business_title_bn` varchar(255) NOT NULL,
  `business_slogan_en` varchar(255) NOT NULL,
  `business_slogan_bn` varchar(255) NOT NULL,
  `business_type_long` varchar(255) NOT NULL,
  `business_type_short` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_city` varchar(255) NOT NULL,
  `business_state` varchar(255) NOT NULL,
  `business_country` varchar(255) NOT NULL,
  `business_zipCode` varchar(255) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `business_phone` varchar(255) NOT NULL,
  `business_logo` varchar(255) NOT NULL,
  `business_icon` varchar(255) NOT NULL,
  `business_social_facebook` varchar(255) NOT NULL,
  `business_social_instagram` varchar(255) NOT NULL,
  `business_social_whatsapp` varchar(255) NOT NULL,
  `business_social_youtube` varchar(255) NOT NULL,
  `make_by` varchar(255) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbusinesssettings`
--

INSERT INTO `tblbusinesssettings` (`id`, `business_title_en`, `business_title_bn`, `business_slogan_en`, `business_slogan_bn`, `business_type_long`, `business_type_short`, `business_address`, `business_city`, `business_state`, `business_country`, `business_zipCode`, `business_email`, `business_phone`, `business_logo`, `business_icon`, `business_social_facebook`, `business_social_instagram`, `business_social_whatsapp`, `business_social_youtube`, `make_by`, `ysnactive`) VALUES
(1, 'Fulessharee', 'ফুলেশ্বরী', 'There is no place like home', 'নিজের ঘরের মত আর কিছুই নেই', 'House Rental Management System', 'HRMS', 'House#2445/1, Uttarkhan Mazar Para, Uttarkhan', 'Dhaka', '', 'Bangladesh', '1230', 'fulessharee.hrms@gmail.com', '+8801819868985', 'logo-admin.png', 'icon-admin.png', '#', '#', '#', '#', 'Admin', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `id` int(11) NOT NULL,
  `expense_id` varchar(255) NOT NULL,
  `e_invoice_no` varchar(255) NOT NULL,
  `expense_head` varchar(255) NOT NULL,
  `expense_amount` varchar(255) NOT NULL,
  `expense_month` varchar(255) NOT NULL,
  `expense_date` varchar(255) NOT NULL,
  `expense_by` varchar(255) NOT NULL,
  `expense_description` longtext NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`id`, `expense_id`, `e_invoice_no`, `expense_head`, `expense_amount`, `expense_month`, `expense_date`, `expense_by`, `expense_description`, `ysnactive`) VALUES
(1, 'EXPENSE1', 'VOUCHER#1', 'Electric', '1200', 'January 2022', '2022-01-05', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>Parts</td>\r\n			<td>700</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>Electrician</td>\r\n			<td>300</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>Service Charge</td>\r\n			<td>200</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(2, 'EXPENSE2', 'VOUCHER#2', 'Water', '1700', 'January 2022', '2022-01-12', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>Parts</td>\r\n			<td>1000</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>Electrician</td>\r\n			<td>500</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>Service Charge</td>\r\n			<td>200</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(3, 'EXPENSE3', 'VOUCHER#3', 'Gas', '1500', 'August 2022', '2022-01-29', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>Parts</td>\r\n			<td>900</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>Electrician</td>\r\n			<td>400</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>Service Charge</td>\r\n			<td>200</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(4, 'EXPENSE4', 'VOUCHER#4', 'Internet', '500', 'February 2022', '2022-01-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>Parts</td>\r\n			<td>200</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>Electrician</td>\r\n			<td>100</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>Service Charge</td>\r\n			<td>200</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(5, 'EXPENSE5', 'VOUCHER#5', 'Lift', '2500', 'January 2022', '2022-01-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>Parts</td>\r\n			<td>1500</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>Electrician</td>\r\n			<td>800</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>Service Charge</td>\r\n			<td>200</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(6, 'EXPENSE6', 'VOUCHER#6', 'sdas', '500', 'January 2022', '2022-01-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>asdsa</td>\r\n			<td>200</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>asdsa</td>\r\n			<td>100</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>asda</td>\r\n			<td>200</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(7, 'EXPENSE7', 'VOUCHER#7', 'Motor', '500', 'January 2022', '2022-01-08', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>Parts</td>\r\n			<td>200</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>Electrician</td>\r\n			<td>200</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>Service Charge</td>\r\n			<td>100</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(8, 'EXPENSE8', 'VOUCHER#8', 'sadsad', '500', 'January 2022', '2022-01-14', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(9, 'EXPENSE9', 'VOUCHER#9', 'sadasd', '500', 'January 2022', '2022-01-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(10, 'EXPENSE10', 'VOUCHER#10', 'sdas', '500', 'February 2022', '2022-01-09', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(11, 'EXPENSE11', 'VOUCHER#11', 'asdsad', '500', 'February 2022', '2022-02-03', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(12, 'EXPENSE12', 'VOUCHER#12', 'asdas', '500', 'January 2022', '2022-01-01', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(13, 'EXPENSE13', 'VOUCHER#13', 'zzdfsdfdsf', '1000', 'January 2022', '2022-01-05', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(14, 'EXPENSE14', 'VOUCHER#14', 'ssdf', '500', 'April 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(15, 'EXPENSE15', 'VOUCHER#15', 'Information Technology', '500', 'January 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(16, 'EXPENSE16', 'VOUCHER#16', 'Human Resource', '500', 'February 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(17, 'EXPENSE17', 'VOUCHER#17', 'Information Technology', '500', 'March 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(18, 'EXPENSE18', 'VOUCHER#18', 'Information Technology', '500', 'April 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(19, 'EXPENSE19', 'VOUCHER#19', 'Information Technology', '500', 'May 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(20, 'EXPENSE20', 'VOUCHER#20', 'Information Technology', '500', 'June 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(21, 'EXPENSE21', 'VOUCHER#21', 'Information Technology', '500', 'July 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(22, 'EXPENSE22', 'VOUCHER#22', 'Information Technology', '500', 'August 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(23, 'EXPENSE23', 'VOUCHER#23', 'Production', '500', 'September 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(24, 'EXPENSE24', 'VOUCHER#24', 'Finance', '500', 'October 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(25, 'EXPENSE25', 'VOUCHER#25', 'Finance', '1000', 'November 2022', '2022-04-06', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\"> 	<thead> 		<tr> 			<th scope=\"row\"> 			<p><strong>SL NO</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Description</strong></p> 			</th> 			<th scope=\"col\"> 			<p><strong>Amount</strong></p> 			</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th scope=\"row\"><strong>1</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>2</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 		<tr> 			<th scope=\"row\"><strong>3</strong></th> 			<td>&nbsp;</td> 			<td>&nbsp;</td> 		</tr> 	</tbody> </table>', b'1'),
(26, 'EXPENSE26', 'VOUCHER#26', 'Others', '500', 'April 2022', '2022-01-30', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(27, 'EXPENSE27', 'VOUCHER#27', 'Others', '1000', 'February 2022', '2022-02-07', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(28, 'EXPENSE28', 'VOUCHER#28', 'Others', '1500', 'May 2023', '2022-05-04', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(29, 'EXPENSE29', 'VOUCHER#29', 'Others', '500', 'December 2022', '2022-01-31', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(30, 'EXPENSE30', 'VOUCHER#30', 'Others', '500', 'August 2022', '2022-01-22', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(31, 'EXPENSE31', 'VOUCHER#31', 'Others', '100', 'April 2022', '2022-01-15', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1'),
(32, 'EXPENSE32', 'VOUCHER#32', 'Others', '500', 'April 2022', '10-07-15', 'Showmin', '<table border=\"2\" cellpadding=\"2\" cellspacing=\"2\" style=\"width:400px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"row\">\r\n			<p><strong>SL NO</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Description</strong></p>\r\n			</th>\r\n			<th scope=\"col\">\r\n			<p><strong>Amount</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\"><strong>1</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>2</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\"><strong>3</strong></th>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblflat`
--

CREATE TABLE `tblflat` (
  `id` int(11) NOT NULL,
  `flat_id` varchar(255) NOT NULL,
  `flat_floor` varchar(255) NOT NULL,
  `flat_name_en` varchar(255) NOT NULL,
  `flat_name_bn` varchar(255) NOT NULL,
  `flat_no` varchar(255) NOT NULL,
  `flat_description` varchar(255) NOT NULL,
  `flat_status` bit(1) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblflat`
--

INSERT INTO `tblflat` (`id`, `flat_id`, `flat_floor`, `flat_name_en`, `flat_name_bn`, `flat_no`, `flat_description`, `flat_status`, `created_by`, `ysnactive`) VALUES
(1, 'FLAT1', 'Ground Floor', 'Ghasful', 'ঘাসফুল', '001', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', b'1', 'Admin', b'1'),
(2, 'FLAT2', '1st Floor', 'Nayantara', 'নয়নতারা', '101', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', b'1', 'Admin', b'1'),
(3, 'FLAT3', '2nd Floor', 'Kamini', 'কামিনী', '201', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', b'1', 'Admin', b'1'),
(4, 'FLAT4', '3rd Floor', 'Oporajita', 'অপরাজিতা', '301', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', b'0', 'Admin', b'1'),
(5, 'FLAT5', '4th Floor', 'Moushondha', 'মৌসন্ধ্যা', '401', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', b'0', 'Admin', b'1'),
(6, 'FLAT6', '5th Floor', 'Krishnochura', 'কৃষ্ণচূড়া', '501', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', b'0', 'Admin', b'1'),
(7, 'FLAT7', '6th Floor', 'Korobi', 'করবী', '601', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', b'0', 'Admin', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblforms`
--

CREATE TABLE `tblforms` (
  `id` int(11) NOT NULL,
  `form_title` text NOT NULL,
  `form_content` longtext NOT NULL,
  `form_type` varchar(255) NOT NULL,
  `form_language` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblforms`
--

INSERT INTO `tblforms` (`id`, `form_title`, `form_content`, `form_type`, `form_language`, `created_by`, `ysnactive`) VALUES
(1, 'Renters Agreement', '<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">&ldquo;</span></strong><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">বিসমিল্লাহির রাহমানির রাহিম&rdquo;</span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:16.0pt\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">&ldquo;ফুলেশ্বরী&rdquo;</span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><u><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">বাড়ি ভাড়ার ০১ (এক) বৎসর মেয়াদী চুক্তিপত্র</span></span></u></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><u><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১ম পক্ষ (মালিক):</span></u></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">রোকেয়া বেগম মালিক পক্ষে মোঃ রফিক উল্লাহ, পিতা -আব্দুল আজিজ, ফুলেশ্বরী, বাড়ি নং &ndash; ২৪৪৫/১, উত্তরখান মাজার পাড়া, পোস্ট ও থানা: উত্তরখান, জেলা: ঢাকা, পোস্ট কোড &ndash; ১২৩০, জাতীয়তা &ndash; বাংলাদেশি, ধর্ম &ndash; ইসলাম, পেশা: সরকারী চাকুরি (অবঃ)। ফোন &ndash; ০১৮১৯৮৬৮৯৮৫, ০১৯১৩৯৮২২৬৮।</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><u><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">২য় পক্ষ (ভাড়াটিয়া):</span></u></strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">জনাব/জনাবা &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;&hellip;...&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..&hellip;...&hellip;&hellip;.&hellip;., পিতা - &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;...&hellip;&hellip;&hellip;.&hellip;&hellip;..&hellip;.&hellip;.&hellip;&hellip;,</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">ন্যাশনাল আইডি নং - &hellip;.&hellip;&hellip;.&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...&hellip;.&hellip;.....&hellip;&hellip;&hellip;&hellip;&hellip;., ফোন নম্বর - &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;...&hellip;&hellip;.&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;,</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">স্থায়ী ঠিকানা - &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...&hellip;&hellip;&hellip;&hellip;...&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...&hellip;</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.....&hellip;&hellip;&hellip;।</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; জেলা: ঢাকা, পোস্ট ও থানা: উত্তরখান, উত্তরখান মৌজা, দাগ নং ৭৩০ এর ৫ (পাঁচ) তলা বাড়ির (প্রস্তাবিত ৭ তলা) ৩য় তলায় <strong>&lsquo;</strong>কামিনী<strong>&rsquo;</strong> (ফ্ল্যাট নং ২০১) ফ্ল্যাটের তিনটি বেড রুম, একটি ড্রয়িং কাম ডাইনিং রুম, দুইটি বাথ রুম, দুইটি বারান্দা ও একটি রান্না ঘরসহ মাসিক ভাড়া বাবদ ১১,০০০ (এগারো হাজার) টাকা ধার্য করা হইল। মাসিক ভাড়া প্রতি মাসের ১০ (দশ) তারিখের মধ্যে পরিশোধ করিতে হইবে।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">২.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ২য় পক্ষকে ২য় পক্ষের ব্যবহারকৃত বিদ্যুৎ ও পানির বিল পরিশোধ করিতে হইবে। যদি বিলের টাকা অপরিশোধিত থাকে তাহলে ১ম পক্ষ সংযোগ বিচ্ছিন্ন করার ক্ষমতা রাখে। উল্লেখ্য যে, মাসিক ভাড়ার সাথে নির্ধারিত হারে পানির বিল ২য় পক্ষকে পরিশোধ করিতে হইবে। তাছাড়া প্রয়োজন অনুযায়ী পরবর্তীতে কোনো সার্ভিস চার্জ ধার্য হইলে তাহা ২য় পক্ষকে পরিশোধ করিতে হইবে।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৩.&nbsp;&nbsp;&nbsp; বৈদ্যুতিক পাখা ২য় পক্ষ নিজ খরচে লাগাইয়া নিবেন। চুক্তির মেয়াদ শেষে ২য় পক্ষ তাহা খুলিয়া নিবেন। উল্লেখ্য যে, ১ম পক্ষ হইতে বৈদ্যুতিক বাতিসমূহ (সিলিং বাতি &ndash; ২১টি, বাথরুম ও বেসিন বাতি &ndash; ৩টি) মোট ২৪টি (চব্বিশটি) সরবারহ করা হইয়াছে। ফ্ল্যাটে ভাড়ারত অবস্থায় বৈদ্যুতিক বাতিসমূহের কোন প্রকার সমস্যা হইলে ২য় পক্ষ নিজ দায়িত্বে তা ঠিক করিয়া লইবেন এবং বাসা ছাড়ার পূর্বে ১ম পক্ষকে অবশ্যই ২য় পক্ষ প্রতিটি বাতিসমূহ বুঝাইয়া দিতে বাধ্য থাকিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৪.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ২য় পক্ষকে সিলিন্ডার গ্যাস ব্যবহার করিতে হইবে। কোনো অবস্থায় ২য় পক্ষ সিলিন্ডার গ্যাস ব্যতিত অন্য কোনো চুলা যেমন কেরোসিনের চুলা ও বৈদ্যুতিক চুলা ব্যবহার করিতে পারিবেন না।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৫.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; পর পর দুই মাসের ভাড়া যদি বকেয়া থাকে তাহলে ১ম পক্ষ, ২য় পক্ষকে নোটিশের মাধ্যমে বাড়ি ছেড়ে দেওয়ার জন্য অনুরোধ/আদেশ করিতে পারিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৬.&nbsp;&nbsp;&nbsp;&nbsp; ২য় পক্ষ ভদ্রোচিতভাবে বসবাস করিবেন। কোনো প্রকার অসৎ/খারাপ উদ্দেশ্য, অবৈধ মালামাল সংরক্ষণ ও ব্যবহার বা অসামাজিক কাজ করিতে পারিবেন না। বাড়িতে অবস্থানকালীন কোনো ধরনের ক্ষয়ক্ষতি সাধন করিতে পারিবেন না।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৭.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ২য় পক্ষ ফ্ল্যাটে ওঠার পূর্বে অগ্রিম এক মাসের ভাড়া ১ম পক্ষকে জামানত হিসেবে প্রদান করিবেন। মেয়াদ শেষে ২য় পক্ষের দ্বারা ১ম পক্ষের ফ্ল্যাটের যদি কোনো প্রকার ক্ষতি সাধিত হয় তাহা হইলে ২য় পক্ষ নিজ খরচে মেরামত করিয়া দিবেন অথবা জামানতকৃত টাকা হইতে ঐ টাকা কর্তন করা হইবে।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">চলমান পাতা - ২</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৮.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ২য় পক্ষ বাড়ি ত্যাগ করার জন্য মনস্থ করিলে ১ম পক্ষকে ২ মাস পূর্বে নোটিশের মাধ্যমে অবগত করিতে হইবে যাহাতে কোনো পক্ষের মধ্যে অসুবিধা বা অকারণ ভুল বোঝাবুঝির সৃষ্টি না হয়।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৯.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ব্যবহারকৃত পানি যাহাতে নষ্ট বা অপচয় না হয় তাহার প্রতি ২য় পক্ষকে সদয় দৃষ্টি রাখিতে হইবে। অনিবার্য কারণে পানি সরবরাহ বন্ধ হইলে ২য় পক্ষ নিজ খরচে অন্যত্র হইতে পানি সংগ্রহ করিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১০.&nbsp;&nbsp;&nbsp; ২য় পক্ষ ১ম পক্ষের অনুমতি ব্যতিত অন্য কাহারো নিকট ফ্ল্যাট ভাড়া দিতে পারিবেন না বা কোনো প্রকার গোপন চুক্তি করিতে পারিবেন না, করিলে তাহা অবৈধ বলিয়া গণ্য হইবে।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১১.&nbsp;&nbsp;&nbsp; ২য় পক্ষকে রান্না ঘরের ব্যবহৃত বিভিন্ন প্রকার ময়লা-আবর্জনা নির্দিষ্ট স্থানে ফেলিতে হইবে অথবা অপসারণের ব্যবস্থা করিতে হইবে যাহাতে পরিবেশ, বায়ু ও পানি দূষণ না হয়। ২য় পক্ষের যদি কোনো পোষ্য প্রাণী (কুকুর/বিড়াল/পাখি) থেকে থাকে তাহলে তাহা নিজ দায়িত্বে রাখিবেন যাতে তাহা দ্বারা বাড়ির কোনো/কারো ক্ষয়ক্ষতি না হয় এবং তাহার মলমূত্র/আবর্জনা নির্দিষ্ট স্থানে ফেলিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১২.&nbsp;&nbsp;&nbsp; ফ্ল্যাটে যদি কোনো প্রকার পরিবর্তন, পরিবর্ধন বা বিদ্যুৎ সংযোগের প্রয়োজন হয় তাহা হইলে ১ম পক্ষকে অবগত করাইয়া ২য় পক্ষ নিজ খরচে তা করাইয়া নিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১৩.&nbsp;&nbsp;&nbsp; ২য় পক্ষের গাড়ি যদি ১ম পক্ষের গ্যারাজে রাখিতে হয় তাহলে গ্যারাজ ভাড়া পরিশোধ করিতে হইবে।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১৪.&nbsp;&nbsp;&nbsp; ২য় পক্ষ ফ্ল্যাট ভাড়া যে অবস্থায় বুঝিয়া নিবেন, ছেড়ে দেওয়ার সময় সে অবস্থায় ১ম পক্ষকে বুঝাইয়া দিতে বাধ্য থাকিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১৫.&nbsp;&nbsp;&nbsp; ২য় পক্ষ ১ম পক্ষের অনুমতি সাপেক্ষে ছাদ ব্যবহার করিতে পারিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১৬.&nbsp;&nbsp; ২য় পক্ষ ১ম পক্ষের ফ্ল্যাট বসবাসের জন্য ভাড়া নিবেন। কোনো প্রকার অফিসিয়াল কাজকর্ম বা মিটিং করা যাইবে না।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১৭.&nbsp;&nbsp;&nbsp; ২য় পক্ষের কোনো কাজকর্ম যদি ১ম পক্ষের নিকট অগ্রহণযোগ্য মনে হয় তাহা হইলে ১ম পক্ষ ২য় পক্ষকে এক মাস পূর্বে ফ্ল্যাট ছাড়িয়া দেওয়ার জন্য নোটিশ প্রদান করিতে পারিবেন।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১৮.&nbsp;&nbsp;&nbsp; রাত এগারোটার সময় বাড়ির প্রধান গেইট বন্ধ হইবে। এগারোটার পর বিশেষ প্রয়োজন ছাড়া প্রবেশ কিংবা বাহির হইতে পারিবেন না।</span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১৯.&nbsp;&nbsp;&nbsp; এই চুক্তি উভয় পক্ষের মধ্যে এক বৎসর স্থায়ী থাকিবে। এক বৎসর পর উভয় পক্ষের মধ্যে নতুন চুক্তি সম্পাদিত হইবে। চুক্তি পত্রের মূল কপি ১ম পক্ষ পাইবে এবং অনুলিপি ২য় পক্ষ পাইবে।</span></span></span></p>\r\n\r\n<p style=\"margin-left:24px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">এতদ্বার্থে স্বেচ্ছায়, স্বজ্ঞানে, সুস্থ শরীরে সরল মনে, অন্যের বিনা প্ররোচনায় অত্র ভাড়ার চুক্তিনামা দলিল পাঠ করিয়া উহার মর্ম সম্যক ভালোভাবে অবগত হইয়া আমরা উভয় পক্ষদ্বয় উপস্থিত স্বাক্ষীগণের সম্মুখে অত্র চুক্তিনামা দলিল সহি সম্পাদন করিলাম।</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" class=\"MsoTableGrid\" style=\"border-collapse:collapse; border:none\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:340px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><u><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">স্বাক্ষীগণের নাম</span></u></strong><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">:</span></strong></span></span></p>\r\n\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">১.</span></strong></span></span></p>\r\n\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">২.</span></strong></span></span></p>\r\n\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">৩.</span></strong></span></span></p>\r\n\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:340px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">____________________________________</span></strong></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">প্রথম পক্ষের স্বাক্ষর</span></strong></span></span></p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">____________________________________</span></strong></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-family:&quot;Nirmala UI&quot;,sans-serif\">দ্বিতীয় পক্ষের স্বাক্ষর</span></strong></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n', 'Renter', 'Bangla', 'Admin', b'1'),
(2, 'dfdsfds', '<p>Add forms content</p>\r\n', 'Renter', 'English', 'Admin', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblmodule`
--

CREATE TABLE `tblmodule` (
  `id` int(11) NOT NULL,
  `module_title` varchar(255) NOT NULL,
  `module_url` varchar(255) NOT NULL,
  `module_icon` varchar(255) NOT NULL,
  `module_type` varchar(255) NOT NULL,
  `module_order` decimal(10,0) NOT NULL,
  `is_display` bit(1) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmodule`
--

INSERT INTO `tblmodule` (`id`, `module_title`, `module_url`, `module_icon`, `module_type`, `module_order`, `is_display`, `ysnactive`) VALUES
(1, 'Dashboard', 'Dashboard.php', 'ti ti-home', 'Parent', '1', b'1', b'1'),
(2, 'Role', 'javascript:void(0)', 'ti ti-medall-alt', 'Parent', '2', b'1', b'1'),
(3, 'User', 'javascript:void(0)', 'ti ti-user', 'Parent', '3', b'1', b'1'),
(4, 'Renter', 'javascript:void(0)', 'ti ti-briefcase', 'Parent', '4', b'1', b'1'),
(5, 'Flat', 'javascript:void(0)', 'ti ti-layout', 'Parent', '5', b'1', b'1'),
(6, 'User', 'javascript:void(0)', 'ti ti-use', '', '0', b'1', b'1'),
(7, 'Utility Bills', 'javascript:void(0)', 'ti ti-direction-alt', 'Parent', '7', b'1', b'1'),
(8, 'Expense', 'javascript:void(0)', 'ti ti-server', 'Parent', '8', b'1', b'1'),
(9, 'Report', 'javascript:void(0)', 'ti ti-clip', 'Parent', '9', b'1', b'1'),
(10, 'Manage Website', 'javascript:void(0)', 'ti ti-world', 'Parent', '10', b'1', b'1'),
(11, 'Settings', 'javascript:void(0)', 'ti ti-settings', 'Parent', '11', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblpagetemp`
--

CREATE TABLE `tblpagetemp` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_icon` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `admin_access` bit(1) NOT NULL,
  `manager_access` bit(1) NOT NULL,
  `renter_access` bit(1) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `is_display` bit(1) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpagetemp`
--

INSERT INTO `tblpagetemp` (`id`, `page_title`, `page_url`, `page_icon`, `parent_id`, `admin_access`, `manager_access`, `renter_access`, `created_by`, `is_display`, `ysnactive`) VALUES
(1, 'Dashboard', 'Dashboard.php', 'ti ti-home', 0, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(2, 'Role', 'javascript:void(0)', 'ti ti-medall-alt', 0, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(3, 'Role List', 'RoleList.php', '', 2, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(4, 'Role Setup', 'AddRole.php', '', 2, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(5, 'Update Role', 'EditRole.php', '', 2, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(6, 'User', 'javascript:void(0)', 'ti ti-user', 0, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(7, 'User List', 'UserList.php', '', 6, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(8, 'User Setup', 'AddUser.php', '', 6, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(9, 'Update User', 'EditUser.php', '', 6, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(10, 'User Info', 'UserInfo.php', '', 6, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(11, 'Renter', 'javascript:void(0)', 'ti ti-briefcase', 0, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(12, 'Renter List', 'RenterList.php', '', 11, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(13, 'Renter Deactive List', 'RenterDeactiveList.php', '', 11, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(14, 'Renter Setup', 'AddRenter.php', '', 11, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(15, 'Update Renter', 'EditRenter.php', '', 11, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(16, 'Renter Info', 'RenterInfo.php', '', 11, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(17, 'Flat', 'javascript:void(0)', 'ti ti-layout', 0, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(18, 'Flat List', 'FlatList.php', '', 17, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(19, 'Flat Setup', 'AddFlat.php', '', 17, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(20, 'Update Flat', 'EditFlat.php', '', 17, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(21, 'Rent', 'javascript:void(0)', 'ti ti-direction', 0, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(22, 'Rent List', 'RentList.php', '', 21, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(23, 'Rent Setup', 'AddRent.php', '', 21, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(24, 'Update Rent', 'EditRent.php', '', 21, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(25, 'Rent Voucher', 'RentInfo.php', '', 21, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(26, 'Utility Bills', 'javascript:void(0)', 'ti ti-direction-alt', 0, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(27, 'Utility Bills List', 'BillList.php', '', 26, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(28, 'Utility Bills Setup', 'AddBill.php', '', 26, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(29, 'Update Utility Bills', 'EditBill.php', '', 26, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(30, 'Utility Bills Voucher', 'BillInfo.php', '', 26, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(31, 'Expense', 'javascript:void(0)', 'ti ti-server', 0, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(32, 'Expense List', 'ExpenseList.php', '', 31, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(33, 'Expense Setup', 'AddExpense.php', '', 31, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(34, 'Update Expense', 'EditExpense.php', '', 31, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(35, 'Expense Voucher', 'ExpenseInfo.php', '', 31, b'0', b'0', b'0', 'Admin', b'0', b'1'),
(36, 'Report', 'javascript:void(0)', 'ti ti-clip', 0, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(37, 'Rent Report', 'RentReport.php', '', 36, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(38, 'Utility Bills Report', 'BillReport.php', '', 36, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(39, 'Rent & Utility Bills Report', 'RentBillReport.php', '', 36, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(40, 'Expense Report', 'ExpenseReport.php', '', 36, b'1', b'1', b'0', 'Admin', b'1', b'1'),
(41, 'Manage Website', 'javascript:void(0)', 'ti ti-world', 0, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(42, 'Menu List', 'Website/MenuList.php', '', 41, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(43, 'Menu Setup', 'Website/AddMenu.php', '', 41, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(44, 'Settings', 'javascript:void(0)', 'ti ti-settings', 0, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(45, 'Business Settings', 'BusinessSettings.php', '', 44, b'1', b'0', b'0', 'Admin', b'1', b'1'),
(46, 'Manage Profile', 'ManageProfile.php', '', 44, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(47, 'Change Password', 'ChangePassword.php', '', 44, b'1', b'1', b'1', 'Admin', b'1', b'1'),
(48, 'Module Settings', 'ModuleSettings.php', '', 44, b'1', b'0', b'0', 'Admin', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblrent`
--

CREATE TABLE `tblrent` (
  `id` int(11) NOT NULL,
  `rent_id` varchar(255) NOT NULL,
  `renter_id` varchar(255) NOT NULL,
  `r_invoice_no` varchar(255) NOT NULL,
  `rent_month` varchar(255) NOT NULL,
  `rent_date` varchar(255) NOT NULL,
  `rent_actual` varchar(255) NOT NULL,
  `rent_service_charge` varchar(255) NOT NULL,
  `rent_total` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `r_type` varchar(255) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrent`
--

INSERT INTO `tblrent` (`id`, `rent_id`, `renter_id`, `r_invoice_no`, `rent_month`, `rent_date`, `rent_actual`, `rent_service_charge`, `rent_total`, `received_by`, `r_type`, `ysnactive`) VALUES
(1, 'RENT1', 'RENTER1', 'VOUCHER#1', 'January 2022', '2022-01-05', '13000', '500', '13500', 'Showmin', 'Rent', b'1'),
(2, 'RENT2', 'RENTER2', 'VOUCHER#2', 'January 2022', '2022-01-01', '13000', '500', '13500', 'R Showmin', 'Rent', b'1'),
(3, 'RENT3', 'RENTER3', 'VOUCHER#3', 'January 2022', '2022-01-10', '13000', '500', '13500', 'Raisul', 'Rent', b'1'),
(4, 'RENT4', 'RENTER1', 'VOUCHER#4', 'December 2022', '2022-03-04', '4000', '500', '4500', '', 'Rent', b'1'),
(5, 'RENT5', 'RENTER1', 'VOUCHER#5', 'November 2022', '2022-05-09', '10000', '5000', '15000', 'Raisul', 'Rent', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblrentbills`
--

CREATE TABLE `tblrentbills` (
  `id` int(11) NOT NULL,
  `rentbill_id` varchar(255) NOT NULL,
  `renter_id` varchar(255) NOT NULL,
  `rentbill_month` varchar(255) NOT NULL,
  `rb_invoice_no` varchar(255) NOT NULL,
  `rent_id` varchar(255) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrentbills`
--

INSERT INTO `tblrentbills` (`id`, `rentbill_id`, `renter_id`, `rentbill_month`, `rb_invoice_no`, `rent_id`, `bill_id`, `ysnactive`) VALUES
(1, 'RENTBILL1', 'RENTER1', 'January 2022', 'INVOICE#1', 'RENT1', 'BILL1', b'1'),
(2, 'RENTBILL2', 'RENTER2', 'January 2022', 'INVOICE#2', 'RENT2', 'BILL2', b'1'),
(3, 'RENTBILL3', 'RENTER3', 'January 2022', 'INVOICE#3', 'RENT3', 'BILL3', b'1'),
(4, 'RENTBILL4', 'RENTER1', 'December 2022', 'INVOICE#4', 'RENT4', 'BILL4', b'1'),
(5, 'RENTBILL5', 'RENTER1', 'November 2022', 'INVOICE#5', 'RENT5', 'BILL5', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblrenter`
--

CREATE TABLE `tblrenter` (
  `id` int(11) NOT NULL,
  `renter_id` varchar(255) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `flat_no` varchar(255) NOT NULL,
  `family_members` varchar(255) NOT NULL,
  `renter_phone` varchar(255) NOT NULL,
  `renter_email` varchar(255) NOT NULL,
  `renter_address` varchar(255) NOT NULL,
  `renter_img` varchar(255) NOT NULL,
  `renter_nid` varchar(255) NOT NULL,
  `renter_doc` varchar(255) NOT NULL,
  `entry_date` varchar(255) NOT NULL,
  `leave_date` varchar(255) NOT NULL,
  `renter_social_facebook` varchar(255) NOT NULL,
  `renter_social_twitter` varchar(255) NOT NULL,
  `renter_social_instagram` varchar(255) NOT NULL,
  `renter_social_whatsapp` varchar(255) NOT NULL,
  `renter_status` bit(1) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrenter`
--

INSERT INTO `tblrenter` (`id`, `renter_id`, `renter_name`, `flat_no`, `family_members`, `renter_phone`, `renter_email`, `renter_address`, `renter_img`, `renter_nid`, `renter_doc`, `entry_date`, `leave_date`, `renter_social_facebook`, `renter_social_twitter`, `renter_social_instagram`, `renter_social_whatsapp`, `renter_status`, `ysnactive`) VALUES
(1, 'RENTER1', 'Raisul Showmin', '001', '6', '(+880) 168 007 8100', 'rishowmin@hotmail.com', 'Uttarkhan Mazar', 'Raisul_Showmin.png', '5454565465654', '2021_11_11_03-57-07_am.pdf', '2021-10-01', '2021-12-31', '', '', '', '', b'1', b'1'),
(2, 'RENTER2', 'Akramul Shohagh', '101', '6', '(+880) 191 398 2268', 'shohagh@gmail.com', 'Uttarkhan Mazar', 'Akramul_Shohagh.png', '5675675675675', '', '2021-11-01', '2021-12-31', '', '', '', '', b'1', b'1'),
(3, 'RENTER3', 'Rocksana Racy', '201', '6', '(+880) 171 456 9325', 'racy@gmail.com', 'Uttarkhan Mazar', '', '435345345345', '', '2021-11-01', '2021-12-31', '', '', '', '', b'1', b'1'),
(4, 'RENTER4', 'Rafiq Ullah', '', '6', '(+880) 181 986 8985', 'rafiq@gmail.com', 'Uttarkhan Mazar', '', '456346456546', '', '2022-01-01', '', '', '', '', '', b'1', b'1'),
(5, 'RENTER5', 'Rokeya Begum', '', '6', '(+880) 171 135 5411', 'rokeya@yahoo.coma', 'Uttarkhan Mazar', '', '657567567', '', '2022-03-01', '', '', '', '', '', b'0', b'1'),
(6, 'RENTER6', 'Muhtahsin Raiyan', '', '6', '(+880) 171 456 9325', 'rokeya@yahoo.com', 'Uttarkhan Mazar', '', '546456456456', '', '2022-03-01', '', '', '', '', '', b'1', b'0'),
(7, 'RENTER7', 'Tahmina Priti', '', '4', '01819868985', 'racy@gmail.com', 'Uttarkhan Mazar', '', '657676578678', '', '2022-03-01', '', '', '', '', '', b'1', b'0'),
(8, 'RENTER8', 'Demo', '', '5', '(+880) 124 556 5445', 'asdasdrokeya@yahoo.coma', 'asdasd', '', '323423234234', '', '2022-01-01', '2022-01-15', '', '', '', '', b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_description` varchar(255) NOT NULL,
  `page_access` varchar(255) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`id`, `role_name`, `role_description`, `page_access`, `ysnactive`) VALUES
(1, 'Admin', 'The Admin can access all the pages.                                                                                                        ', '1,2,3,4,6,7,8,11,12,13,14,17,18,19,21,22,23,26,27,28,31,32,33,36,37,38,39,40,41,42,43,44,45,46,47,48', b'1'),
(2, 'Manager', 'The manager can access some selected pages.', '2,3,11,12,13,14,17,18,19,21,22,23,26,27,28,31,32,33,36,37,38,39,40,44,46,47', b'1'),
(3, 'Renter', 'The renter can access some selected pages.', '17,18,21,22,26,27,36,37,38,39,44,46,47', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubmodule`
--

CREATE TABLE `tblsubmodule` (
  `id` int(11) NOT NULL,
  `submodule_title` varchar(255) NOT NULL,
  `submodule_url` varchar(255) NOT NULL,
  `submodule_parent` varchar(255) NOT NULL,
  `submodule_type` varchar(255) NOT NULL,
  `submodule_order` decimal(10,0) NOT NULL,
  `is_display` bit(1) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubmodule`
--

INSERT INTO `tblsubmodule` (`id`, `submodule_title`, `submodule_url`, `submodule_parent`, `submodule_type`, `submodule_order`, `is_display`, `ysnactive`) VALUES
(1, 'Role List', 'RoleList.php', '2', 'Child', '1', b'1', b'1'),
(2, 'Role Setup', 'AddRole.php', '2', 'Child', '2', b'1', b'1'),
(3, 'Role Update', 'EditRole.php', '2', 'Child', '3', b'0', b'1'),
(4, 'User List', 'UserList.php', '3', 'Child', '1', b'1', b'1'),
(5, 'User Setup', 'AddUser.php', '3', 'Child', '2', b'1', b'1'),
(6, 'Update User', 'EditUser.php', '3', 'Child', '3', b'0', b'1'),
(7, 'User Info', 'UserInfo.php', '3', 'Child', '4', b'0', b'1'),
(8, 'Renter List', 'RenterList.php', '4', 'Child', '1', b'1', b'1'),
(9, 'Renter Deactive List', 'RenterDeactiveList.php', '4', 'Child', '2', b'1', b'1'),
(10, 'Renter Setup', 'AddRenter.php', '4', 'Child', '3', b'1', b'1'),
(11, 'Update Renter', 'EditRenter.php', '4', 'Child', '4', b'0', b'1'),
(12, 'Renter Info', 'RenterInfo.php', '4', 'Child', '5', b'0', b'1'),
(13, 'Flat List', 'FlatList.php', '5', 'Child', '1', b'1', b'1'),
(14, 'Flat Setup', 'AddFlat.php', '5', 'Child', '2', b'1', b'1'),
(15, 'Update Flat', 'EditFlat.php', '5', 'Child', '3', b'0', b'1'),
(16, 'Rent List', 'RentList.php', '6', 'Child', '1', b'1', b'1'),
(17, 'Rent Setup', 'AddRent.php', '6', 'Child', '2', b'1', b'1'),
(18, 'Update Rent', 'EditRent.php', '6', 'Child', '3', b'0', b'1'),
(19, 'Rent Voucher', 'RentInfo.php', '6', 'Child', '4', b'0', b'1'),
(20, 'Utility Bills List', 'BillList.php', '7', 'Child', '1', b'1', b'1'),
(21, 'Utility Bills Setup', 'AddBill.php', '7', 'Child', '2', b'1', b'1'),
(22, 'Update Utility Bills', 'EditBill.php', '7', 'Child', '3', b'0', b'1'),
(23, 'Utility Bills Voucher', 'BillInfo.php', '7', 'Child', '4', b'0', b'1'),
(24, 'Expense List', 'ExpenseList.php', '8', 'Child', '1', b'1', b'1'),
(25, 'Expense Setup', 'AddExpense.php', '8', 'Child', '2', b'1', b'1'),
(26, 'Update Expense', 'EditExpense.php', '8', 'Child', '3', b'0', b'1'),
(27, 'Expense Voucher', 'ExpenseInfo.php', '8', 'Child', '4', b'0', b'1'),
(28, 'Rent Report', 'RentReport.php', '9', 'Child', '1', b'1', b'1'),
(29, 'Utility Bills Report', 'BillReport.php', '9', 'Child', '2', b'1', b'1'),
(30, 'Rent & Utility Bills Report', 'RentBillReport.php', '9', 'Child', '3', b'1', b'1'),
(31, 'Expense Report', 'ExpenseReport.php', '9', 'Child', '4', b'1', b'1'),
(32, 'Menu List', 'Website/MenuList.php', '10', 'Child', '1', b'1', b'1'),
(33, 'Menu Setup', 'Website/AddMenu.php', '10', 'Child', '2', b'1', b'1'),
(34, 'Business Settings', 'BusinessSettings.php', '11', 'Child', '1', b'1', b'1'),
(35, 'Manage Profile', 'ManageProfile.php?info_id=', '11', 'Child', '2', b'1', b'1'),
(36, 'Change Password', 'ChangePassword.php', '11', 'Child', '3', b'1', b'1'),
(37, 'Module', 'Module.php', '11', 'Child', '4', b'1', b'1'),
(38, 'Sub-Module', 'SubModule.php', '11', 'Child', '5', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_dob` varchar(255) NOT NULL,
  `user_blood_group` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_social_facebook` varchar(255) NOT NULL,
  `user_social_twitter` varchar(255) NOT NULL,
  `user_social_instagram` varchar(255) NOT NULL,
  `user_social_linkedin` varchar(255) NOT NULL,
  `user_social_whatsapp` varchar(255) NOT NULL,
  `user_status` bit(1) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `user_id`, `user_first_name`, `user_last_name`, `user_address`, `user_gender`, `user_dob`, `user_blood_group`, `user_phone`, `user_email`, `user_img`, `user_role`, `user_username`, `user_password`, `user_social_facebook`, `user_social_twitter`, `user_social_instagram`, `user_social_linkedin`, `user_social_whatsapp`, `user_status`, `ysnactive`) VALUES
(1, 'USER1', 'Raisul', 'Showmin', 'Uttarkhan', 'Male', '1995-10-03', 'B+', '(+880) 168 007 8100', 'rishowmin.seu38@gmail.com', 'Raisul_Showmin.png', 'Admin', 'rishowmin', '1eaaf8bbc63241751a0fd26ca414af00', 'https://www.facebook.com/rishowmin/', 'https://twitter.com/RaisulShowmin', 'https://www.instagram.com/raisul.showmin_8/', 'https://www.linkedin.com/in/muhammad-raisul-showmin-b2903517a/', 'https://wa.me/01680078100', b'1', b'1'),
(2, 'USER2', 'Akramul', 'Shohagh', 'Uttarkhan                                                                                                        ', 'Male', '1983-02-27', 'B+', '(+880) 191 398 2268', 'akramul.hossan@outlook.com', 'Akramul_Shohagh.png', 'Manager', 'shohagh', '4803ac37142737d4bfc7557bf6500dac', '', '', '', '', '', b'1', b'1'),
(3, 'USER3', 'Rocksana', 'Racy', '', 'Female', '1986-12-31', 'O+', '(+880) 199 956 5549', 'racy31@gmail.com', '', 'Renter', 'raracy31', '38c79c7f89ba075523367f11faa3b439', '', '', '', '', 'https://wa.me/01759868749', b'1', b'1'),
(5, 'USER4', 'sadaewd', 'asdasdasd', 'asdasdad', 'Male', '2022-03-01', 'AB+', '(+880) 151 415 1515', 'asdas@asds.com', '', 'Manager', 'asdasdas', '3dea41cb329cf67a11c49786a4958c76', '', '', '', '', '', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblwebmenu`
--

CREATE TABLE `tblwebmenu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_description` varchar(255) NOT NULL,
  `menu_slug_url` varchar(255) NOT NULL,
  `display_position` varchar(255) NOT NULL,
  `visible_status` bit(1) NOT NULL,
  `menu_status` bit(1) NOT NULL,
  `ysnactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwebmenu`
--

INSERT INTO `tblwebmenu` (`id`, `menu_id`, `menu_title`, `menu_description`, `menu_slug_url`, `display_position`, `visible_status`, `menu_status`, `ysnactive`) VALUES
(1, 'MENU1', 'Home', 'This is home page.', '#hero', '1', b'1', b'1', b'1'),
(2, 'MENU2', 'About', 'This is about us page.', '#about', '2', b'1', b'1', b'1'),
(3, 'MENU3', 'Service', 'This is the service page.', '#services', '3', b'1', b'1', b'1'),
(4, 'MENU4', 'Portfolio', 'This is the portfolio page.', '#portfolio', '4', b'1', b'1', b'1'),
(5, 'MENU5', 'Team', 'This is the team page.', '#team', '5', b'1', b'1', b'1'),
(6, 'MENU6', 'Contact', 'This is the contact us page.', '#contact', '6', b'1', b'1', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbills`
--
ALTER TABLE `tblbills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbusinesssettings`
--
ALTER TABLE `tblbusinesssettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblflat`
--
ALTER TABLE `tblflat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblforms`
--
ALTER TABLE `tblforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmodule`
--
ALTER TABLE `tblmodule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpagetemp`
--
ALTER TABLE `tblpagetemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrent`
--
ALTER TABLE `tblrent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrentbills`
--
ALTER TABLE `tblrentbills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrenter`
--
ALTER TABLE `tblrenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubmodule`
--
ALTER TABLE `tblsubmodule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblwebmenu`
--
ALTER TABLE `tblwebmenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbills`
--
ALTER TABLE `tblbills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblbusinesssettings`
--
ALTER TABLE `tblbusinesssettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblflat`
--
ALTER TABLE `tblflat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblforms`
--
ALTER TABLE `tblforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmodule`
--
ALTER TABLE `tblmodule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpagetemp`
--
ALTER TABLE `tblpagetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tblrent`
--
ALTER TABLE `tblrent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblrentbills`
--
ALTER TABLE `tblrentbills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblrenter`
--
ALTER TABLE `tblrenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblrole`
--
ALTER TABLE `tblrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubmodule`
--
ALTER TABLE `tblsubmodule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblwebmenu`
--
ALTER TABLE `tblwebmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
