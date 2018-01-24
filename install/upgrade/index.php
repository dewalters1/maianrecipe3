<?php

/*---------------------------------------------
  MAIAN RECIPE v2.0
  Written by David Ian Bennett
  E-Mail: N/A
  Website: www.maianscriptworld.co.uk
  This File: v2.0 Upgrade System
----------------------------------------------*/

error_reporting(E_ALL ^ E_NOTICE);
define ('PATH', dirname(__FILE__).'/');
define ('REL_PATH', '../../');
define ('CTAG_LOOP', 2);

include(PATH.'lang.php');
include(PATH.'inc/functions.php');
include(REL_PATH.'control/connect.inc.php');

$SETTINGS = @mysqli_fetch_object(
             mysqli_query($connect,"SELECT * FROM ".$database['prefix']."settings LIMIT 1")
             );

$stage1  = true;
$stage2  = false;
$stage3  = false;
$stage4  = false;
$report  = array();
$table   = array();
$count   = 0;
$page    = (isset($_GET['next']) ? strip_tags($_GET['next']) : '1');
$limit   = $page * CTAG_LOOP - (CTAG_LOOP);

// Detect current version..
$curVersion      = '1.2';
// If smtp var isn`t available, its v1.0..
if (!isset($SETTINGS->smtp)) {
  $curVersion      = '1.0';
}
// If smtp var is available and modr var isn`t, its v1.1..
if (isset($SETTINGS->smtp) && !isset($SETTINGS->modr)) {
  $curVersion      = '1.1';
}
$upgradeVersion  = '2.0';
//$report[] = $setup9;
//$table[]  = $database['prefix']."pictures";
// Install tables..
if (isset($_POST['one'])) {
 $stage1 = false;
 
 // Install table...pictures..
 $query = mysqli_query($connect,"
 CREATE TABLE ".$database['prefix']."pictures (
  `id` int(10) unsigned NOT NULL auto_increment,
  `recipe` int(8) NOT NULL default '0',
  `picPath` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
 ) ENGINE=MyISAM  DEFAULT CHARSET=latin1
 ");
 
 $report[] = ($query ? $setup9 : $setup10);
 $table[]  = $database['prefix']."pictures";
 
 // Port old picture data to new table..
 $picCount = 0;
 $query = mysqli_query($connect,"SELECT * FROM ".$database['prefix']."recipes") or die(mysqli_error($connect));
 while ($row = mysqli_fetch_object($query)) {
   if ($row->pic1) {
     mysqli_query($connect,"INSERT INTO ".$database['prefix']."pictures (
     recipe,picPath
     ) VALUES (
     '$row->id','".(strrpos($row->pic1,'/')===FALSE ? $row->pic1 : substr($row->pic1,strrpos($row->pic1,'/')+1,strlen($row->pic1)))."'
     )") or die(mysqli_error($connect));
     ++$picCount;
   }
   if ($row->pic2) {
     mysqli_query($connect,"INSERT INTO ".$database['prefix']."pictures (
     recipe,picPath
     ) VALUES (
     '$row->id','".(strrpos($row->pic2,'/')===FALSE ? $row->pic2 : substr($row->pic2,strrpos($row->pic2,'/')+1,strlen($row->pic2)))."'
     )") or die(mysqli_error($connect));
     ++$picCount;
   }
   if ($row->pic3) {
     mysqli_query($connect,"INSERT INTO ".$database['prefix']."pictures (
     recipe,picPath
     ) VALUES (
     '$row->id','".(strrpos($row->pic3,'/')===FALSE ? $row->pic3 : substr($row->pic3,strrpos($row->pic3,'/')+1,strlen($row->pic3)))."'
     )") or die(mysqli_error($connect));
     ++$picCount;
   }
 }
 
 $report[] = number_format($picCount);
 $table[]  = $setup12;
 
 $stage2 = true;
 
}

// Modify database structure..
if (isset($_POST['two'])) {
  
  // Update categories..
  $q1c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN isParent enum('yes','no') not null default 'yes'");
  $q2c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN childOf int(6) not null default '0'");
  $q3c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN metaDesc TEXT not null");
  $q4c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN metaKeys TEXT not null");
  $q5c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN enComments enum('yes','no') not null default 'yes'");
  $q6c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN enRecipes enum('yes','no') not null default 'yes'");
  $q7c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN enRating enum('yes','no') not null default 'yes'");
  $q8c = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."categories ADD COLUMN enCat enum('yes','no') not null default 'yes'");
 
  $report[] = ($q1c && $q2c && $q3c && $q4c && $q5c && $q6c && $q7c && $q8c ? $setup19 : $setup20);
  $table[]  = $database['prefix']."categories";
  
  // Update older versions to 1.2..
  if ($curVersion=='1.0') {
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN smtp ENUM('0','1') NOT NULL DEFAULT '0' AFTER total");
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN smtp_host varchar(100) NOT NULL default 'localhost' AFTER smtp");
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN smtp_user varchar(100) NOT NULL default '' AFTER smtp_host");
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN smtp_pass varchar(100) NOT NULL default '' AFTER smtp_user");
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN smtp_port varchar(100) NOT NULL default '25' AFTER smtp_pass");
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN install_path VARCHAR(250) NOT NULL default '' AFTER language");
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN modr ENUM('0','1') NOT NULL DEFAULT '0' AFTER smtp_port");
  }
  
  if ($curVersion=='1.1') {
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN install_path VARCHAR(250) NOT NULL default '' AFTER language");
    mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN modr ENUM('0','1') NOT NULL DEFAULT '0' AFTER smtp_port");
  }
  
  // Now update all settings for 2.0..
  $q1s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN server_path varchar(250) not null default ''");
  $q2s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN metaDesc TEXT not null");
  $q3s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN metaKeys TEXT not null");
  $q4s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN enCommApp enum('yes','no') not null default 'yes'");
  $q5s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN enRecApp enum('yes','no') not null default 'yes'");
  $q6s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN enSpam enum('yes','no') not null default 'yes'");
  $q7s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN enRSS enum('yes','no') not null default 'yes'");
  $q8s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN enCloudTags enum('yes','no') not null default 'yes'");
  $q9s  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN maxImages int(3) not null default '0'");
  $q10s = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN validImages varchar(200) not null default 'jpg|gif|bmp|jpeg|png'");
  $q11s = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN autoResize varchar(50) not null default '640,480'");
  $q12s = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN maxFileSize varchar(100) not null default '256000'");
  $q12sw = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings ADD COLUMN `ratingCount` int(8) NOT NULL default '0'");
  $q13s = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings CHANGE `email` `email` varchar(250) not null default ''");
  $q14s = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings CHANGE `smtp` `smtp` enum('yes','no') not null default 'no'");
  $q15s = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."settings CHANGE `modr` `modr` enum('yes','no') not null default 'no'");
  $q16s = mysqli_query($connect,"UPDATE ".$database['prefix']."settings SET smtp = '".(isset($SETTINGS->smtp) ? ($SETTINGS->smtp ? 'yes' : 'no') : 'no')."',
                                                                  modr = '".(isset($SETTINGS->modr) ? ($SETTINGS->modr ? 'yes' : 'no') : 'no')."'");
  
  $report[] = ($q1s && $q2s && $q3s && $q4s && $q5s && $q6s && $q7s && $q8s && $q9s && $q10s && $q11s && $q12s && $q13s && $q14s && $q15s && $q16s ? $setup19 : $setup20);
  $table[]  = $database['prefix']."settings";
  
  // Update recipes..
  $q1r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes CHANGE `adddate` `addDate` date not null default '0000-00-00'");
  $q2r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes DROP pic1");
  $q3r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes DROP pic2");
  $q4r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes DROP pic3");
  $q5r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN metaDesc text not null");
  $q6r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN metaKeys text not null");
  $q7r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN enComments enum('yes','no') not null default 'yes'");
  $q8r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN enRating enum('yes','no') not null default 'yes'");
  $q9r   = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN enRecipe enum('yes','no') not null default 'yes'");
  $q10r  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN isApproved enum('yes','no') not null default 'no'");
  $q11r  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN comCount int(7) not null default '0'");
  $q12r  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN ipAddresses text not null");
  $q13r  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN email varchar(250) not null default ''");
  $q14r  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD COLUMN rss_date varchar(35) not null default ''");
  $q15r  = mysqli_query($connect,"ALTER TABLE ".$database['prefix']."recipes ADD FULLTEXT (name,ingredients,instructions,submitted_by)");
  
  // Apostrophes were converted in earlier versions. Lets try and convert them back..
  // Mask errors to prevent any problems..
  @mysqli_query($connect,"UPDATE ".$database['prefix']."recipes SET
  ingredients   = REPLACE(ingredients,'\&#039;','\''),
  instructions  = REPLACE(instructions,'\&#039;','\''),
  submitted_by  = REPLACE(submitted_by,'\&#039;','\'')
  ");
  
  $report[] = ($q1r && $q2r && $q3r && $q4r && $q5r && $q6r && $q7r && $q8r && $q9r && $q10r && $q11r && $q12r && $q13r && $q14r && $q15r ? $setup19 : $setup20);
  $table[]  = $database['prefix']."recipes";
  
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
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1
  ");
 
  $report[] = ($query ? $setup9 : $setup10);
  $table[]  = $database['prefix']."comments";
  
  // Install table...ratings..
  $query = mysqli_query($connect,"
  CREATE TABLE ".$database['prefix']."ratings (
  `id` int(11) NOT NULL auto_increment,
  `total_votes` int(11) NOT NULL default '0',
  `total_value` int(11) NOT NULL default '0',
  `recipe` int(8) NOT NULL default '0',
  `used_ips` longtext,
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1
  ");
 
  $report[] = ($query ? $setup9 : $setup10);
  $table[]  = $database['prefix']."ratings";
  
  // Install table...cloudtags..
  $query = mysqli_query($connect,"
  CREATE TABLE ".$database['prefix']."cloudtags (
  `id` int(11) NOT NULL auto_increment,
  `cloud_word` varchar(100) NOT NULL default '',
  `cloud_count` int(7) NOT NULL default '0',
  `recipe` int(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1
  ");
 
  $report[] = ($query ? $setup9 : $setup10);
  $table[]  = $database['prefix']."cloudtags";
  
  $stage1 = false;
  $stage2 = false;
  $stage3 = true;
}

if (isset($_POST['three']) || isset($_GET['next'])) {

  // Create cloud tag data..
  $recCount   = 0;
  $loopCount  = ceil(rowCount($connect,'recipes')/CTAG_LOOP);
  $q_r = mysqli_query($connect,"SELECT * FROM ".$database['prefix']."recipes 
         ORDER BY id
         LIMIT $limit,".CTAG_LOOP."
         ") or die(mysqli_error($connect));
  while ($R = mysqli_fetch_object($q_r)) {
    buildCloudTags($connect,cleanData($R->ingredients),
                   cleanData($R->instructions),
                   $R->id
    );
  }
  
  // Reload..
  if ($loopCount>1 && $loopCount!=$page) {
    $goToPage    = $page+1;
    $pleasewait  = true;
  } else {
    $report[] = number_format($recCount);
    $table[]  = $setup25;
  
    $stage1 = false;
    $stage2 = false;
    $stage3 = false;
    $stage4 = true;
  }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $charset; ?>">
<title><?php echo $setup; ?></title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<?php
if (isset($goToPage)) {
?>
<meta http-equiv="refresh" content="3;url=index.php?next=<?php echo $goToPage; ?>">
<?php
}
?>
</head>

<body>
<form method="post" action="index.php">
<div align="center">
<table width="600" cellspacing="0" cellpadding="0" class="mainTable">
<tr>
  <td align="center" class="headCell">- <?php echo $setup; ?> -</td>
</tr>
<?php
if ($stage1 && !isset($pleasewait))
{
if (function_exists('gd_info')) { 
  $GDArray = gd_info();
  $Version = @ereg_replace('[[:alpha:][:space:]()]+', '', $GDArray['GD Version']);
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
  <td align="center" class="pad" style="padding-top:10px"><?php echo $setup17; ?>:<br><br>
  <table width="100%" cellspacing="0" cellpadding="0" class="areaTable">
  <tr>
    <td class="pad" width="60%"><b><?php echo $setup15; ?></b></td>
    <td class="pad" width="40%"><span class="info">v<?php echo $curVersion; ?></span></td>
  </tr>
  <tr>
    <td class="pad"><b><?php echo $setup16; ?></b></td>
    <td class="pad"><span class="info">v<?php echo $upgradeVersion; ?></span></td>
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
if ($stage2 && !$stage1 && !isset($pleasewait))
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
  <td align="center" class="pad">
  <p class="button"><br /><input class="formButton" name="two" type="submit" value="<?php echo $setup18; ?> &raquo;" title="<?php echo $setup18; ?>" /></p>
  <?php
  }
  else
  {
    echo '<span class="error_info"><br>'.$setup23.'</span>';
  }
  ?>
  </td>
</tr>
<?php
}
if ($stage3 && (!$stage1 && !$stage2) && !isset($pleasewait))
{
?>
<tr>
  <td align="center" class="pad"><br><?php echo $setup22; ?><br><br>
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
  <td align="center" class="pad">
  <p class="button"><br /><input class="formButton" name="three" type="submit" value="<?php echo $setup21; ?> &raquo;" title="<?php echo $setup21; ?>" /></p>
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
if (isset($pleasewait))
{
?>
<tr>
  <td align="center" class="pad"><br><?php echo str_replace(array('{count}','{total}'),array($page,ceil(rowCount($connect,'recipes')/CTAG_LOOP)),$setup26); ?><br /><br />
</tr>
<?php
}
if ($stage4 && (!$stage1 && !$stage2 && !$stage3))
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
