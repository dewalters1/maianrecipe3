<?php

/*---------------------------------------------
  MAIAN RECIPE v2.0
  E-Mail: N/A
  Website: www.maianscriptworld.co.uk
  This File: Program Functions - Upgrade
  Written by David Ian Bennett
----------------------------------------------*/

// Converts recipe/category name for search engine friendly urls..
function seoUrl($title) {
  // Convert special characters from European countries into the English alphabetic equivalent..
  $chars = array('À'=>'A','Á'=>'A','Â'=>'A','Ã'=>'A','Ä'=>'Ae','Å'=>'A','Ç'=>'C','È'=>'E','É'=>'E','Ê'=>'E','Ë'=>'E','Ì'=>'I',
                 'Í'=>'I','Î'=>'I','Ï'=>'I','Ñ'=>'N','Ò'=>'O','Ó'=>'O','Ô'=>'O','Õ'=>'O','Ö'=>'Oe','Ø'=>'O','Ù'=>'U','Ú'=>'U',
                 'Û'=>'U','Ü'=>'Ue','Ý'=>'Y','à'=>'a','á'=>'a','â'=>'a','ã'=>'a','ä'=>'ae','å'=>'a','ç'=>'c','è'=>'e','é'=>'e',
                 'ê'=>'e','ë'=>'e','ì'=>'i','í'=>'i','î'=>'i','ï'=>'i','ñ'=>'n','ò'=>'o','ó'=>'o','ô'=>'o','õ'=>'o','ö'=>'oe',
                 'ø'=>'o','ù'=>'u','ú'=>'u','û'=>'u','ü'=>'ue','ý'=>'y','ÿ'=>'y','ß'=>'ss'); 
			
  // Replace chars in array..
  $title = strtr($title, $chars);
  // Strip none alphabetic and none numeric chars..
  $title = strtolower(preg_replace('`[^\w_-]`', '-', $title));
  // Replace other data that may be passed, such as double hyphens..
  return str_replace(array('--','---','----','-amp-','-039-'),
                     array('-','-','-','-and-',''),
                     $title
                     );
}

// Builds tag cloud list for user submitted recipe..
function buildCloudTags($con,$words,$words2,$id) {
  global $database;
  // Remove new line characters and html code..
  $words   = str_replace(array(defineNewline(),defineNewline().defineNewline()),array(' ',' '),strip_tags($words));
  $words2  = str_replace(array(defineNewline(),defineNewline().defineNewline()),array(' ',' '),strip_tags($words2));
  // Assign arrays..
  if (file_exists(REL_PATH.'control/cloud-tags-skip-file.txt')) {
    $skipWords   = array_map('trim',file(REL_PATH.'control/cloud-tags-skip-file.txt'));
  } else {
    $skipWords   = array();
  }
  $wordBlock1  = ($words ? array_map('trim',explode(' ',$words)) : array());
  $wordBlock2  = ($words2 ? array_map('trim',explode(' ',$words2)) : array());
  mysqli_query($con,"DELETE FROM ".$database['prefix']."cloudtags
  WHERE recipe = '$id'
  ") or die(mysqli_error());
  // Loop through first word block..
  if (!empty($wordBlock1)) {
    foreach ($wordBlock1 AS $wd) {
      // Run words through filter..we can use the seourl function..
      $wd  = seoUrl($wd);
      // If word contains a hyphen from the previous filter, only take first part of word..
      if (strpos($wd,'-')!==FALSE) {
        $wd = substr($wd,0,strlen(strpos($wd,'-')));
      }
      // Prepare for safe importing into dd..
      $wd  = safeImport($wd);
      if (!in_array($wd,$skipWords) && strlen($wd)>=5) {
        if (rowCount($con,'cloudtags',' WHERE cloud_word = \''.$wd.'\' AND recipe = \''.$id.'\'')>0) {
          mysqli_query($con,"UPDATE ".$database['prefix']."cloudtags SET
          cloud_count       = (cloud_count+1)
          WHERE cloud_word  = '$wd' AND recipe = '$id'
          LIMIT 1
          ") or die(mysqli_error($con));
        } else {
          mysqli_query($con,"INSERT INTO ".$database['prefix']."cloudtags (
          cloud_word,cloud_count,recipe
          ) VALUES (
          '$wd','1','$id'
          )") or die(mysqli_error($con));
        }
      }
    }
  }
  // Loop through second word block..
  if (!empty($wordBlock2)) {
    foreach ($wordBlock2 AS $wd) {
      // Run words through filter..we can use the seourl function..
      $wd  = seoUrl($wd);
      // If word contains a hyphen from the previous filter, only take first part of word..
      if (strpos($wd,'-')!==FALSE) {
        $wd = substr($wd,0,strlen(strpos($wd,'-')));
      }
      // Prepare for safe importing into dd..
      $wd  = safeImport($wd);
      if (!in_array($wd,$skipWords) && strlen($wd)>5) {
        if (rowCount($con,'cloudtags',' WHERE cloud_word = \''.$wd.'\' AND recipe = \''.$id.'\'')>0) {
          mysqli_query($con,"UPDATE ".$database['prefix']."cloudtags SET
          cloud_count       = (cloud_count+1)
          WHERE cloud_word  = '$wd' AND recipe = '$id'
          LIMIT 1
          ") or die(mysqli_error($con));
        } else {
          mysqli_query($con,"INSERT INTO ".$database['prefix']."cloudtags (
          cloud_word,cloud_count,recipe
          ) VALUES (
          '$wd','1','$id'
          )") or die(mysqli_error($con));
        }
      }
    }
  }
}

// Prepares date for safe mysql import..
function safeImport($data) {
  if (get_magic_quotes_gpc()) {
    $data = stripslashes($data);
  }
  return mysqli_real_escape_string($data);
}

// Cleans output data.. 
function cleanData($data) {
  $data = str_replace(' & ', ' &amp; ', $data);
  return (get_magic_quotes_gpc() ? stripslashes($data) : $data);
}

// Gets row count..
function rowCount($con,$table,$where='') {
  global $database;
  $query = mysqli_query($con,"SELECT count(*) AS r_count FROM ".$database['prefix'].$table.$where."") or die(mysqli_error($con));
  $row = mysqli_fetch_object($query);
  return number_format($row->r_count);
}

// Define newline..
function defineNewline() {
  $unewline = "\r\n";
  if (strstr(strtolower($_SERVER["HTTP_USER_AGENT"]), 'win')) {
    $unewline = "\r\n";
  } else if (strstr(strtolower($_SERVER["HTTP_USER_AGENT"]), 'mac')) {
    $unewline = "\r";
  } else {
    $unewline = "\n";
  }
  return $unewline;
}

?>
