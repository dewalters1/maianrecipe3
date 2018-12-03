<?php

/*---------------------------------------------
  MAIAN RECIPE v3.0
  E-Mail: N/A
  Original Website: www.maianscriptworld.co.uk
  Current Website: github.com/dewalters1/maianrecipe3
  This File: Main Control File
  Written by David Ian Bennett
  Updated by Dennis Walters for PHP 7
----------------------------------------------*/

class cats {

var $prefix;

// Add category..
function addCat($con) {
  $_POST = multiDimensionalArrayMap('safeImport', $_POST);
  mysqli_query($con,"INSERT INTO ".$this->prefix."categories (
  catname,
  comments,
  isParent,
  childOf,
  metaDesc,
  metaKeys,
  enComments,
  enRecipes,
  enRating,
  enCat
  ) VALUES (
  '".$_POST['catname']."',
  '".$_POST['comments']."',
  '".($_POST['type']=='new' ? 'yes' : 'no')."',
  '".($_POST['type']=='new' ? '0' : $_POST['type'])."',
  '".$_POST['metaDesc']."',
  '".$_POST['metaKeys']."',
  '".(isset($_POST['enComments']) ? $_POST['enComments'] : 'yes')."',
  '".(isset($_POST['enRecipes']) ? $_POST['enRecipes'] : 'yes')."',
  '".(isset($_POST['enRating']) ? $_POST['enRating'] : 'yes')."',
  '".(isset($_POST['enCat']) ? $_POST['enCat'] : 'yes')."'
  )") or die(mysqli_error($con));
}

// Update category..
function updateCat($con) {
  $_POST = multiDimensionalArrayMap('safeImport', $_POST);
  mysqli_query($con,"UPDATE ".$this->prefix."categories SET
  catname     = '".$_POST['catname']."',
  comments    = '".$_POST['comments']."',
  isParent    = '".($_POST['type']=='new' ? 'yes' : 'no')."',
  childOf     = '".($_POST['type']=='new' ? '0' : $_POST['type'])."',
  metaDesc    = '".$_POST['metaDesc']."',
  metaKeys    = '".$_POST['metaKeys']."',
  enComments  = '".(isset($_POST['enComments']) ? $_POST['enComments'] : 'yes')."',
  enRecipes   = '".(isset($_POST['enRecipes']) ? $_POST['enRecipes'] : 'yes')."',
  enRating    = '".(isset($_POST['enRating']) ? $_POST['enRating'] : 'yes')."',
  enCat       = '".(isset($_POST['enCat']) ? $_POST['enCat'] : 'yes')."'
  WHERE id    = '".$_POST['edit']."'
  LIMIT 1
  ") or die(mysqli_error($con));
  
  // If parent category is moved to children and this parent already had children, move them to same new parent..
  if (ctype_digit($_POST['type'])) {
    mysqli_query($con,"UPDATE ".$this->prefix."categories SET
    childOf        = '".$_POST['type']."'
    WHERE childOf  = '".$_POST['edit']."'
    ") or die(mysqli_error($con));
  }
}

// Delete category..
function deleteCat($con,$SETTINGS) {
  // Remove categories..
  mysqli_query($con,"DELETE FROM ".$this->prefix."categories
  WHERE id = '".(int)$_GET['del']."'
  OR childOf   = '".(int)$_GET['del']."'
  ") or die(mysql_error($con));
  $query = mysqli_query($con,"SELECT * FROM ".$this->prefix."recipes
  WHERE cat = '".(int)$_GET['del']."'
  OR cat    = '".(int)$_GET['del']."'
  ") or die(mysqli_error($con));
  while ($RECIPE = mysqli_fetch_object($query)) {
    // Remove recipe images..
    $q_pic = mysqli_query($con,"SELECT * FROM ".$this->prefix."pictures
             WHERE recipe = '$RECIPE->id'
             ") or die(mysqli_error($con));
    if (mysqli_num_rows($q_pic)>0) {
      while ($IMG = mysqli_fetch_object($q_pic)) {
      if (file_exists($SETTINGS->server_path.'templates/images/recipes/'.$IMG->picPath)) {
        @unlink($SETTINGS->server_path.'templates/images/recipes/'.$IMG->picPath);
      }
      mysqli_query($con,"DELETE FROM ".$this->prefix."pictures
      WHERE id = '".$IMG->id."'
      LIMIT 1
      ") or die(mysqli_error($con));
      }
    }
  }
  // Remove recipes..
  mysqli_query($con,"DELETE FROM ".$this->prefix."recipes
  WHERE cat = '".(int)$_GET['del']."'
  OR cat    = '".(int)$_GET['del']."'
  ") or die(mysqli_error($con));
}

}


?>
