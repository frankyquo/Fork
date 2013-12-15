CREATE TABLE IF NOT EXISTS `application` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `application_name` varchar(100) NOT NULL,
  `application_link` varchar(200) NOT NULL,
  `copyright` varchar(200) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `foodcategory` (
  `food_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_category_name` varchar(50) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`food_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `application_id` int(11) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `groupuser` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_link` varchar(100) NOT NULL,
  `menu_parent_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `menugroupaccess` (
  `group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`menu_id`,`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `provider` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(50) NOT NULL,
  `provider_image` varchar(50) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(255) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `restaurantfood` (
  `restaurant_food_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `food_category_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`restaurant_food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `restaurantfoodcategory` (
  `food_category_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `stsrc` char(11) NOT NULL,
  `userchange` int(11) NOT NULL,
  `datechange` int(11) NOT NULL,
  PRIMARY KEY (`food_category_id`,`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `restaurantlocation` (
  `restaurant_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `longitude` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `phones` varchar(20) NOT NULL,
  `minprice` int(11) NOT NULL,
  `maxprice` int(11) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`restaurant_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `restaurantpromo` (
  `restaurant_promo_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_location_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `start_promo_date` date NOT NULL,
  `end_promo_date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`restaurant_promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `restaurantreview` (
  `restaurant_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `review` text NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`restaurant_review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `hash` char(5) COLLATE utf8_bin NOT NULL,
  `gender` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `stsrc` char(1) NOT NULL,
  `userchange` varchar(50) COLLATE utf8_bin NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`,`email`,`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

INSERT INTO `application` (`application_id`, `application_name`, `application_link`, `copyright`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 'Fork', 'localhost/Fork/Fork', 'Copyright &copy; 2013 by Franky Jacky', 'a', 'hackedhacker', '2013-12-11 09:58:46');

INSERT INTO `foodcategory` (`food_category_id`, `food_category_name`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 'Makanan', 'a', 'hackedhacker', '2013-12-12 15:02:14');

INSERT INTO `groups` (`group_id`, `group_name`, `application_id`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 'Admin', 1, 'a', 'hackedhacker', '2013-12-11 23:38:48');

INSERT INTO `groupuser` (`user_id`, `group_id`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 1, 'a', 'hackedhacker', '2013-12-15 22:49:54'),
(2, 1, 'a', 'hackedhacker', '2013-12-15 22:49:54'),
(3, 1, 'a', 'hackedhacker', '2013-12-15 22:50:09');

INSERT INTO `location` (`location_id`, `location_name`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 'Jakarta', 'a', 'hackedhacker', '2013-12-11 21:37:13');

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 'Abuba', 'a', 'hackedhacker', '2013-12-12 15:02:30');

INSERT INTO `restaurantfood` (`restaurant_food_id`, `restaurant_id`, `food_category_id`, `food_name`, `description`, `image`, `price`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 1, 1, 'Daging Abuba', 'Daging Panggang Special Dengan Saos Racikan Special dari Abuba', 'images/food/abuba/1.jpg', 50000, 'a', 'hackedhacker', '2013-12-12 15:01:48');

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `hash`, `gender`, `age`, `location_id`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 'hackedhacker', 'hacked@hacker.com', '463487fd707ac502d5ee2451435c856c', 'sl834', 1, 99, 1, 'a', 'hackedhacker', '2013-12-08 17:40:51'),
(2, 'frankyquo', 'frankyquo@gmail.com', 'c2706a93f0afedb7e1722848c63f8cb9', 'pCjQb', 1, 20, 1, 'a', 'hackedhacker', '2013-12-15 22:48:07'),
(3, 'jacky lim', 'jacky.lim@gmail.com', '9aeadd8345e532f539486f2b4c92c182', 'Ylw3K', 1, 18, 1, 'a', 'hackedhacker', '2013-12-15 22:48:40');

INSERT INTO `provider` (`provider_id`, `provider_name`, `provider_image`, `stsrc`, `userchange`, `datechange`) VALUES (1, 'Bank Central Asia', 'images/provider/bca.jpg', 'a', 'hackedhacker', NOW());

INSERT INTO `restaurantlocation` (`restaurant_location_id`, `restaurant_id`, `location_id`, `branch`, `address`, `longitude`, `latitude`, `phones`, `minprice`, `maxprice`, `stsrc`, `userchange`, `datechange`) VALUES (1, '1', '1', 'Abuba Jakarta', 'Green Ville Blok Z no 999', '102.10202', '102.10303', '02122123456', '50000', '300000', 'a', 'hackedhacker', NOW());