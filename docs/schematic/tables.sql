--
-- Table structure for table ``mr_categories``
--

CREATE TABLE `mr_categories` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `catname` varchar(200) NOT NULL,
  `comments` text NOT NULL,
  `isParent` enum('yes','no') NOT NULL default 'yes',
  `childOf` int(6) NOT NULL default '0',
  `metaDesc` text NOT NULL,
  `metaKeys` text NOT NULL,
  `enComments` enum('yes','no') NOT NULL default 'yes',
  `enRecipes` enum('yes','no') NOT NULL default 'yes',
  `enRating` enum('yes','no') NOT NULL default 'yes',
  `enCat` enum('yes','no') NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


INSERT INTO `mr_categories` VALUES (9, 'Poultry', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (10, 'Chicken', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (11, 'Turkey', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (12, 'Duck', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (13, 'Goose', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (14, 'Lamb', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (15, 'Chops', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (16, 'Shank', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (17, 'Leg', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (18, 'Roast', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (19, 'Fish', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (20, 'Salmon', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (21, 'Trout', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (22, 'Tuna', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (23, 'Smoked', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (24, 'Bread and Cakes', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (25, 'Biscuits', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (26, 'Pancakes', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (27, 'Muffins', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (28, 'Scones', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (29, 'Rice and Grains', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (30, 'Risotto', '', 'no', 29, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (31, 'Polenta', '', 'no', 29, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (32, 'Couscous', '', 'no', 29, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (33, 'Eggs and Dairy', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (34, 'Quiche', '', 'no', 33, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (35, 'Soufflé', '', 'no', 33, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (36, 'Ice cream', '', 'no', 33, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (37, 'Nuts and seeds', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (38, 'Almonds', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (39, 'Peanuts', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (40, 'Pine Nuts', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (41, 'Poppy', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (42, 'Game', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (43, 'Pheasant', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (44, 'Venison', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (45, 'Quail', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (46, 'Wild Boar', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (47, 'Fruit', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (48, 'Apple', '', 'no', 47, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (49, 'Lemon', '', 'no', 47, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (50, 'Bananas', '', 'no', 47, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (51, 'Beef', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (52, 'Mince', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (53, 'Steak', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (54, 'Roast', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (55, 'Veal', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (56, 'Pork', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (57, 'Fillet', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (58, 'Belly', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (59, 'Chops', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (60, 'Roast', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (61, 'Shellfish', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (62, 'Prawns', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (63, 'Lobster', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (64, 'Mussels', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (65, 'Squid', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (66, 'Pasta & Noodles', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (67, 'Spaghetti', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (68, 'Lasagne', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (69, 'Noodles', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (70, 'Ravioli', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (71, 'Pulses and Soya', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (72, 'Chickpeas', '', 'no', 71, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (73, 'Lentils', '', 'no', 71, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (74, 'Tofu', '', 'no', 71, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (75, 'Cheese', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (76, 'Parmesan', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (77, 'Stilton', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (78, 'Cheddar', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (79, 'Ricotta', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (80, 'Vegetables', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (81, 'Tomatoes', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (82, 'Leeks', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (83, 'Potatoes', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (84, 'Squash', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (85, 'Offal', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (86, 'Liver', '', 'no', 85, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (87, 'Kidney', '', 'no', 85, '', '', 'yes', 'yes', 'yes', 'yes');
INSERT INTO `mr_categories` VALUES (88, 'Sweetbreads', '', 'no', 85, '', '', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `mr_cloudtags`
--

CREATE TABLE `mr_cloudtags` (
  `id` int(11) NOT NULL auto_increment,
  `cloud_word` varchar(100) NOT NULL default '',
  `cloud_count` int(7) NOT NULL default '0',
  `recipe` int(8) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  INDEX `word_index` (`cloud_word`),
  INDEX `count_index` (`cloud_count`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mr_comments`
--

CREATE TABLE `mr_comments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `recipe` int(8) NOT NULL default '0',
  `comment` text NOT NULL,
  `leftBy` varchar(250) NOT NULL default '',
  `email` varchar(250) NOT NULL default '',
  `addDate` date NOT NULL default '0000-00-00',
  `isApproved` enum('yes','no') NOT NULL default 'no',
  `ipAddresses` text NOT NULL,
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `comment` (`comment`,`leftBy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mr_pictures`
--

CREATE TABLE `mr_pictures` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `recipe` int(8) NOT NULL default '0',
  `picPath` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mr_ratings`
--

CREATE TABLE `mr_ratings` (
  `id` int(11) NOT NULL auto_increment,
  `total_votes` int(11) NOT NULL default '0',
  `total_value` int(11) NOT NULL default '0',
  `recipe` int(8) NOT NULL default '0',
  `used_ips` longtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mr_recipes`
--

CREATE TABLE `mr_recipes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(250) NOT NULL default '',
  `cat` int(5) NOT NULL default '0',
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `submitted_by` varchar(100) NOT NULL default '',
  `addDate` date NOT NULL default '0000-00-00',
  `hits` int(7) NOT NULL default '0',
  `metaDesc` text NOT NULL,
  `metaKeys` text NOT NULL,
  `enComments` enum('yes','no') NOT NULL default 'yes',
  `enRating` enum('yes','no') NOT NULL default 'yes',
  `enRecipe` enum('yes','no') NOT NULL default 'yes',
  `isApproved` enum('yes','no') NOT NULL default 'no',
  `comCount` int(7) NOT NULL default '0',
  `ratingCount` int(8) NOT NULL default '0',
  `ipAddresses` text NOT NULL,
  `email` varchar(250) NOT NULL default '',
  `rss_date` varchar(35) NOT NULL default '',
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `name` (`name`,`ingredients`,`instructions`,`metaDesc`,`metaKeys`),
  FULLTEXT KEY `submitted_by` (`submitted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mr_settings`
--

CREATE TABLE `mr_settings` (
  `website` varchar(100) NOT NULL default '',
  `email` varchar(250) NOT NULL default '',
  `language` varchar(30) NOT NULL default '',
  `install_path` varchar(250) NOT NULL default '',
  `total` int(3) NOT NULL default '0',
  `smtp` enum('yes','no') NOT NULL default 'no',
  `smtp_host` varchar(100) NOT NULL default 'localhost',
  `smtp_user` varchar(100) NOT NULL default '',
  `smtp_pass` varchar(100) NOT NULL default '',
  `smtp_port` varchar(100) NOT NULL default '25',
  `modr` enum('yes','no') NOT NULL default 'no',
  `server_path` varchar(250) NOT NULL default '',
  `metaDesc` text NOT NULL,
  `metaKeys` text NOT NULL,
  `enCommApp` enum('yes','no') NOT NULL default 'yes',
  `enRecApp` enum('yes','no') NOT NULL default 'yes',
  `enSpam` enum('yes','no') NOT NULL default 'yes',
  `maxImages` int(3) NOT NULL default '0',
  `validImages` varchar(200) NOT NULL default 'jpg|gif|bmp|jpeg|png',
  `autoResize` varchar(50) NOT NULL default '640,480',
  `maxFileSize` varchar(100) NOT NULL default '256000',
  `enRSS` enum('yes','no') NOT NULL default 'yes',
  `enCloudTags` enum('yes','no') NOT NULL default 'yes',
  PRIMARY KEY  (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table data for table `mr_settings`
--

INSERT INTO `mr_settings` (
`website`, `email`, `language`, `install_path`, `total`, `smtp`, `smtp_host`, `smtp_user`, 
`smtp_pass`, `smtp_port`, `modr`, `server_path`, `metaDesc`, `metaKeys`, `enCommApp`, `enRecApp`, 
`enSpam`, `maxImages`, `validImages`, `autoResize`, `maxFileSize`, `enRSS`, `enCloudTags`
) VALUES(
'My Free Recipes', 'you@yoursite.com', 'english.php', 'http://www.yoursite.com/recipes/', '20', 'no', 
'localhost', '', '', '25', 'no', '/home/server/public_html/recipes/', 'Meta description here..', 'Meta keywords here', 
'yes', 'yes', 'yes', '3', 'jpg|gif|bmp|jpeg|png', '640,480', '256000', 'yes', 'yes'
);
