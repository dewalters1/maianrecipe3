<?php

/*---------------------------------------------
  MAIAN RECIPE v2.0
  Written by David Ian Bennett
  Updated for PHP 7 by: Dennis Walters
  E-Mail: N/A
  Website: www.maianscriptworld.co.uk
  This File: Installer
----------------------------------------------*/

error_reporting(E_ALL ^ E_NOTICE);
define ('PATH', dirname(__FILE__).'/');
define ('REL_PATH', '../');

include(PATH.'lang.php');
include(REL_PATH.'control/connect.inc.php');

$stage1  = true;
$stage2  = false;
$stage3  = false;
$report  = array();
$table   = array();
$count   = 0;

// Install tables..
if (isset($_POST['one'])) {
 $stage1 = false;
 
 // Install table...categories..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."categories (
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
 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."categories";
 
 // Install table...cloudtags..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."cloudtags (
  `id` int(11) NOT NULL auto_increment,
  `cloud_word` varchar(100) NOT NULL default '',
  `cloud_count` int(7) NOT NULL default '0',
  `recipe` int(8) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  INDEX `word_index` (`cloud_word`),
  INDEX `count_index` (`cloud_count`)
 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."cloudtags";
 
 // Install table...comments..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."comments (
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
 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."comments";
 
 // Install table...pictures..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."pictures (
  `id` int(10) unsigned NOT NULL auto_increment,
  `recipe` int(8) NOT NULL default '0',
  `picPath` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."pictures";
 
 // Install table...ratings..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."ratings (
  `id` int(11) NOT NULL auto_increment,
  `total_votes` int(11) NOT NULL default '0',
  `total_value` int(11) NOT NULL default '0',
  `recipe` int(8) NOT NULL default '0',
  `used_ips` longtext,
  PRIMARY KEY  (`id`)
 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."ratings";
 
 // Install table...recipes..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."recipes (
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
 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."recipes";
 
 // Install table...settings..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."settings (
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
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."settings";
 
 $stage2 = true;
 
}

// Install data..
if (isset($_POST['two'])) {
  // Install cats..
  if (isset($_POST['cats'])) {
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(9, 'Poultry', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(10, 'Chicken', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(11, 'Turkey', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(12, 'Duck', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(13, 'Goose', '', 'no', 9, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(14, 'Lamb', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(15, 'Chops', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(16, 'Shank', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(17, 'Leg', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(18, 'Roast', '', 'no', 14, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(19, 'Fish', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(20, 'Salmon', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(21, 'Trout', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(22, 'Tuna', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(23, 'Smoked', '', 'no', 19, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(24, 'Bread and Cakes', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(25, 'Biscuits', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(26, 'Pancakes', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(27, 'Muffins', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(28, 'Scones', '', 'no', 24, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(29, 'Rice and Grains', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(30, 'Risotto', '', 'no', 29, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(31, 'Polenta', '', 'no', 29, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(32, 'Couscous', '', 'no', 29, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(33, 'Eggs and Dairy', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(34, 'Quiche', '', 'no', 33, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(35, 'Soufflé', '', 'no', 33, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(36, 'Ice cream', '', 'no', 33, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(37, 'Nuts and seeds', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(38, 'Almonds', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(39, 'Peanuts', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(40, 'Pine Nuts', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(41, 'Poppy', '', 'no', 37, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(42, 'Game', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(43, 'Pheasant', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(44, 'Venison', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(45, 'Quail', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(46, 'Wild Boar', '', 'no', 42, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(47, 'Fruit', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(48, 'Apple', '', 'no', 47, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(49, 'Lemon', '', 'no', 47, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(50, 'Bananas', '', 'no', 47, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(51, 'Beef', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(52, 'Mince', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(53, 'Steak', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(54, 'Roast', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(55, 'Veal', '', 'no', 51, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(56, 'Pork', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(57, 'Fillet', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(58, 'Belly', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(59, 'Chops', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(60, 'Roast', '', 'no', 56, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(61, 'Shellfish', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(62, 'Prawns', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(63, 'Lobster', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(64, 'Mussels', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(65, 'Squid', '', 'no', 61, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(66, 'Pasta & Noodles', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(67, 'Spaghetti', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(68, 'Lasagne', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(69, 'Noodles', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(70, 'Ravioli', '', 'no', 66, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(71, 'Pulses and Soya', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(72, 'Chickpeas', '', 'no', 71, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(73, 'Lentils', '', 'no', 71, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(74, 'Tofu', '', 'no', 71, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(75, 'Cheese', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(76, 'Parmesan', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(77, 'Stilton', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(78, 'Cheddar', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(79, 'Ricotta', '', 'no', 75, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(80, 'Vegetables', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(81, 'Tomatoes', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(82, 'Leeks', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(83, 'Potatoes', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(84, 'Squash', '', 'no', 80, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(85, 'Offal', '', 'yes', 0, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(86, 'Liver', '', 'no', 85, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(87, 'Kidney', '', 'no', 85, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
    mysqli_query($connect,"INSERT INTO ".$database['prefix']."categories VALUES(88, 'Sweetbreads', '', 'no', 85, '', '', 'yes', 'yes', 'yes', 'yes')") or die(mysqli_error());
  }
  
  // Settings..
  mysqli_query($connect,"INSERT INTO ".$database['prefix']."settings (
  `website`, `email`, `language`, `install_path`, `total`, `smtp`, `smtp_host`, `smtp_user`, 
  `smtp_pass`, `smtp_port`, `modr`, `server_path`, `metaDesc`, `metaKeys`, `enCommApp`, `enRecApp`, 
  `enSpam`, `maxImages`, `validImages`, `autoResize`, `maxFileSize`, `enRSS`, `enCloudTags`
  ) VALUES(
  'My Free Recipes', 'you@yoursite.com', 'english.php', 'http://www.yoursite.com/recipes/', '20', 'no', 
  'localhost', '', '', '25', 'no', '/home/server/public_html/recipes/', 'Meta description here..', 'Meta keywords here', 
  'yes', 'yes', 'yes', '3', 'jpg|gif|bmp|jpeg|png', '640,480', '256000', 'yes', 'yes'
  )") or die(mysqli_error());

  
  $stage1 = false;
  $stage2 = false;
  $stage3 = true;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $charset; ?>">
<title><?php echo $setup; ?></title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" action="index.php">
<div align="center">
<table width="600" cellspacing="0" cellpadding="0" class="mainTable">
<tr>
  <td align="center" class="headCell">- <?php echo $setup; ?> -</td>
</tr>
<?php
if ($stage1)
{
if (function_exists('gd_info')) { 
  $GDArray = gd_info();
//  $Version = @preg_replace('[[:alpha:][:space:]()]+', '', $GDArray['GD Version']);
  $Version = @preg_replace('(?<=^| )\d+(\.\d+)?(?=$| )', '', $GDArray['GD Version']);
}
?>
<tr>
  <td align="center" class="pad"><br><?php echo $setup2; ?><br><br>
  <table width="100%" cellspacing="0" cellpadding="0" class="areaTable">
  <tr>
    <td class="pad" width="60%"><b><?php echo $setup3; ?></b></td>
    <td class="pad" width="40%"><span class="info"><?php echo $database['host']; ?></span></td>
  </tr>
  <tr>  
    <td class="pad"><b><?php echo $setup4; ?></b></td>
    <td class="pad"><span class="info"><?php echo $database['database']; ?></span></td>
  </tr>
  <tr>  
    <td class="pad"><b><?php echo $setup5; ?></b></td>
    <td class="pad"><span class="info"><?php echo $database['username']; ?></span></td>
  </tr>
  <tr>  
    <td class="pad"><b><?php echo $setup6; ?></b></td>
    <td class="pad"><span class="info"><?php echo $database['password']; ?></span></td>
  </tr>
  <tr>  
    <td class="pad"><b><?php echo $setup7; ?></b></td>
    <td class="pad"><span class="info"><?php echo $database['prefix']; ?></span></td>
  </tr>
  </table>
  </td>
</tr>
<tr>
  <td align="center" class="pad"><?php echo $setup17; ?>:<br><br>
  <table width="100%" cellspacing="0" cellpadding="0" class="areaTable">
  <tr>
    <td class="pad" width="60%"><b><?php echo $setup16; ?></b></td>
    <td class="pad" width="40%"><span class="info">v<?php echo phpversion(); ?> - <b><?php echo (phpversion()>'4.3.0' ? $setup19 : $setup22); ?></b></span></td>
  </tr>
  <tr>
    <td class="pad"><b><?php echo $setup15; ?></b></td>
    <td class="pad"><span class="info"><?php echo (isset($Version) ? 'v'.$Version.' - <b>'.$setup19.'</b>' : $setup22); echo ($Version);?></span></td>
  </tr>
  </table>
  <?php
  if (phpversion()>'4.3.0')
  {
  ?>
  <p class="button"><br /><input class="formButton" name="one" type="submit" value="<?php echo $setup8; ?> &raquo;" title="<?php echo $setup8; ?>" /></p>
  <?php
  } else {
  ?>
  <p class="button" style="color:red;font-size:16px;margin-top:5px"><b><?php echo $setup23; ?></b></p>
  <?php
  }
  ?>
  </td>
</tr>
<?php
}
if ($stage2 && !$stage1)
{
?>
<tr>
  <td align="center" class="pad"><br><?php echo $setup14; ?><br><br>
  <table width="100%" cellspacing="0" cellpadding="0" class="areaTable">
  <?php
  
  // Show results..
  for ($i=0; $i<count($report); $i++)
  {
  ?>
  <tr>  
    <td class="pad" width="60%"><b><?php echo $table[$i]; ?></b></td>
    <td class="pad" width="40%"><span class="info"><?php echo $report[$i]; ?></span></td>
  </tr>
  <?php
  }
  
  ?>
  </table>   
  <?php
  if (array_search($setup10,$report)===FALSE)
  {
  ?>
</td>
</tr>
<tr>
  <td align="center" class="pad"><?php echo $setup18; ?>:<br><br>
  <table width="100%" cellspacing="0" cellpadding="0" class="areaTable">
  <tr>
    <td class="pad" width="60%"><input type="checkbox" name="cats" value="1" /></td>
    <td class="pad" width="40%"><span class="info"><?php echo $setup25; ?></span></td>
  </tr>
  </table>  
  <p class="button"><br /><input class="formButton" name="two" type="submit" value="<?php echo $setup12; ?> &raquo;" title="<?php echo $setup12; ?>" /></p>
  <?php
  }
  else
  {
    echo '<span class="error_info"><br>'.$setup11.'</span>';
  }
  ?>
  </td>
</tr>
<?php
}
if ($stage3 && (!$stage1 && !$stage2))
{
?>
<tr>
  <td align="center" class="pad2"><?php echo $setup13; ?><br><br>
  </td>
</tr>  
<?php
}
?>
</table>
</div>
</form>
</body>
</html>
