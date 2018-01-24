<?php

/*---------------------------------------------
  MAIAN RECIPE v2.0
  E-Mail: N/A
  Website: www.maianscriptworld.co.uk
  This File: Admin Recipe Management Class
  Written by David Ian Bennett
----------------------------------------------*/

class recipes {

var $prefix;

// Activate comment..
function activateComment($con,$id) {
  mysqli_query($con,"UPDATE ".$this->prefix."comments SET
  isApproved  = 'no'
  WHERE id    = '$id'
  LIMIT 1
  ") or die(mysqli_error($con));
  $COMMENT = getTableData($con,'comments','id',$id);
  $RECIPE  = getTableData($con,'recipes','id',$COMMENT->recipe);
  mysqli_query($con,"UPDATE ".$this->prefix."recipes SET
  comCount  = (comCount+1)
  WHERE id  = '$RECIPE->id'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Reject comment..
function rejectComment($con,$id) {
  mysqli_query($con,"DELETE FROM ".$this->prefix."comments
  WHERE id = '$id'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Delete comments..
function deleteComments($con) {
  mysqli_query($con,"DELETE FROM ".$this->prefix."comments
  WHERE id IN (".implode(',',$_POST['comment']).")
  ") or die(mysqli_error($con));
  mysqli_query($con,"UPDATE ".$this->prefix."recipes SET
  comCount  = (comCount-".count($_POST['comment']).")
  WHERE id  = '".(int)$_GET['recipe']."'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Activate recipe..
function activateRecipe($con,$id) {
  mysqli_query($con,"UPDATE ".$this->prefix."recipes SET
  isApproved  = 'no'
  WHERE id    = '$id'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Reject recipe..
function rejectRecipe($con,$id,$SETTINGS) {
  // Remove any pictures..
  $q_pic = mysqli_query($con,"SELECT * FROM ".$this->prefix."pictures
           WHERE recipe = '$id'
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
  // Delete cloud tags..
  mysqli_query($con,"DELETE FROM ".$this->prefix."cloudtags
  WHERE recipe = '$id'
  ") or die(mysqli_error($con));
  // Delete recipe..
  mysqli_query($con,"DELETE FROM ".$this->prefix."recipes
  WHERE id = '$id'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Update comment..
function updateComment($con) {
  $_POST = multiDimensionalArrayMap('safeImport', $_POST);
  mysqli_query($con,"UPDATE ".$this->prefix."comments SET
  recipe    = '".$_POST['recipe']."',
  comment   = '".$_POST['comment']."',
  leftBy    = '".$_POST['leftBy']."',
  email     = '".$_POST['email']."'
  WHERE id  = '".(int)$_GET['id']."'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Rebuild cloud tags..
function rebuildAdminCloudTags($con,$words,$words2,$id) {
  global $database;
  // Remove new line characters and html code..
  $words   = str_replace(array(defineNewline(),defineNewline().defineNewline()),array(' ',' '),strip_tags($words));
  $words2  = str_replace(array(defineNewline(),defineNewline().defineNewline()),array(' ',' '),strip_tags($words2));
  // Assign arrays..
  $skipWords   = array_map('trim',file(REL_PATH.'control/cloud-tags-skip-file.txt'));
  $wordBlock1  = ($words ? array_map('trim',explode(' ',$words)) : array());
  $wordBlock2  = ($words2 ? array_map('trim',explode(' ',$words2)) : array());
  mysqli_query($con,"DELETE FROM ".$database['prefix']."cloudtags
  WHERE recipe = '$id'
  ") or die(mysqli_error($con));
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
      $wd  = safeImport($con,$wd);
      if (!in_array($wd,$skipWords) && strlen($wd)>=CLOUD_TAG_WORD_LIMIT) {
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
      $wd  = safeImport($con,$wd);
      if (!in_array($wd,$skipWords) && strlen($wd)>CLOUD_TAG_WORD_LIMIT) {
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

// Add new picture..
function addNewPicture($con,$name,$temp,$id,$SETTINGS) {
  $ext      = strrchr(strtolower($name), '.');
  $picPath  = $id.'-'.$this->getNextPictureID($id).$ext;
  if (is_uploaded_file($temp) && is_writeable($SETTINGS->server_path.'templates/images/recipes')) {
    move_uploaded_file($temp,$SETTINGS->server_path.'templates/images/recipes/'.$picPath);
    if (file_exists($SETTINGS->server_path.'templates/images/recipes/'.$picPath)) {
      // Make file removeable via FTP..
      // Not supported by all servers, so mask error..
      @chmod($SETTINGS->server_path.'templates/images/recipes/'.$picPath,0644);
      mysqli_query($con,"INSERT INTO ".$this->prefix."pictures (
      recipe,picPath
      ) VALUES (
      '$id','$picPath'
      )") or die(mysqli_error($con));
    }
  }
}

// Get next picture id..
function getNextPictureID($con,$id) {
  $query = mysqli_query($con,"SELECT * FROM ".$this->prefix."pictures 
                        WHERE recipe = '$id'
                        ") or die(mysqli_error($con));
  return (mysqli_num_rows($query)>0 ? (mysqli_num_rows($query)+1) : 1); 
}

// Delete pictures..
function deletePicture($con,$SETTINGS) {
  if (file_exists($SETTINGS->server_path.'templates/images/recipes/'.$_GET['picture'])) {
    @unlink($SETTINGS->server_path.'templates/images/recipes/'.$_GET['picture']);
  }
  mysqli_query($con,"DELETE FROM ".$this->prefix."pictures
  WHERE id = '".(int)$_GET['id']."'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Delete all pictures..
function deleteAllPictures($con,$SETTINGS) {
  // Delete pictures..
  $q_pic = mysqli_query($con,"SELECT * FROM ".$this->prefix."pictures
           WHERE recipe = '".(int)$_GET['recipe']."'
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

// Add new recipe..
function addRecipe($con) {
  mysqli_query($con,"INSERT INTO ".$this->prefix."recipes (
  name,
  cat,
  ingredients,
  instructions,
  submitted_by,
  addDate,
  hits,
  metaDesc,
  metaKeys,
  enComments,
  enRating,
  enRecipe,
  isApproved,
  comCount,
  ratingCount,
  ipAddresses,
  rss_date
  ) VALUES (
  '".safeImport($con,$_POST['name'])."',
  '".$_POST['cat']."',
  '".safeImport($con,$_POST['ingredients'])."',
  '".safeImport($con,$_POST['instructions'])."',
  '".safeImport($con,$_POST['submitted_by'])."',
  '".date("Y-m-d",strtotime(SERVER_TIME_ADJUSTMENT))."',
  '0',
  '".safeImport($con,$_POST['metaDesc'])."',
  '".safeImport($con,$_POST['metaKeys'])."',
  '".(isset($_POST['enComments']) ? $_POST['enComments'] : 'yes')."',
  '".(isset($_POST['enRating']) ? $_POST['enRating'] : 'yes')."',
  '".(isset($_POST['enRecipe']) ? $_POST['enRecipe'] : 'yes')."',
  'no',
  '0',
  '0',
  '".getRealIPAddr()."',
  '".RSS_BUILD_DATE_FORMAT."'
  )") or die(mysqli_error($con));
  return mysqli_insert_id($con);
}

// Update recipe..
function updateRecipe($con) {
  mysqli_query($con,"UPDATE ".$this->prefix."recipes SET
  name          = '".safeImport($con,$_POST['name'])."',
  cat           = '".$_POST['cat']."',
  ingredients   = '".safeImport($con,$_POST['ingredients'])."',
  instructions  = '".safeImport($con,$_POST['instructions'])."',
  submitted_by  = '".safeImport($con,$_POST['submitted_by'])."',
  addDate       = '".$_POST['addDate']."',
  hits          = '".$_POST['hits']."',
  metaDesc      = '".safeImport($con,$_POST['metaDesc'])."',
  metaKeys      = '".safeImport($con,$_POST['metaKeys'])."',
  enComments    = '".(isset($_POST['enComments']) ? $_POST['enComments'] : 'yes')."',
  enRating      = '".(isset($_POST['enRating']) ? $_POST['enRating'] : 'yes')."',
  enRecipe      = '".(isset($_POST['enRecipe']) ? $_POST['enRecipe'] : 'yes')."'
  WHERE id      = '".(int)$_GET['id']."'
  LIMIT 1
  ") or die(mysqli_error($con));
}

// Delete recipe..
function deleteRecipe($con,$SETTINGS,$cats=false) {
  if ($cats) {
    if (in_array('all',$_POST['cats'])) {
      $query = mysqli_query($con,"SELECT * FROM ".$this->prefix."recipes
      ") or die(mysqli_error($con));
    } else {
      $query = mysqli_query($con,"SELECT * FROM ".$this->prefix."recipes
      WHERE cat IN (".implode(',',$_POST['cats']).")
      ") or die(mysqli_error($con));
    }
  } else {
    $query = mysqli_query($con,"SELECT * FROM ".$this->prefix."recipes
    WHERE id IN (".implode(',',$_POST['recipe']).")
    ") or die(mysqli_error($con));
  }
  while ($RECIPE = mysqli_fetch_object($query)) {
    // Delete comments..
    mysqli_query($con,"DELETE FROM ".$this->prefix."comments
    WHERE recipe = '$RECIPE->id'
    ") or die(mysqli_error($con));  
    // Delete pictures..
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
    // Delete cloud tags..
    mysqli_query($con,"DELETE FROM ".$this->prefix."cloudtags
    WHERE recipe = '$RECIPE->id'
    ") or die(mysqli_error($con));
    // Delete recipes..
    mysqli_query($con,"DELETE FROM ".$this->prefix."recipes
    WHERE id = '$RECIPE->id'
    ") or die(mysqli_error($con));
  }
}

// Reset recipe hits..
function resetRecipeHits($con) {
  if (in_array('all',$_POST['cats'])) {
    mysqli_query($con,"UPDATE ".$this->prefix."recipes SET
    hits = '0'
    ") or die(mysqli_error($con));
  } else {
    mysqli_query($con,"UPDATE ".$this->prefix."recipes SET
    hits = '0'
    WHERE cat IN (".implode(',',$_POST['cats']).")
    ") or die(mysqli_error($con));
  }
}

// Reset recipe ratings..
function resetRecipeRatings($con) {
  if (in_array('all',$_POST['cats'])) {
    mysqli_query($con,"TRUNCATE TABLE ".$this->prefix."ratings") or die(mysqli_error($con));
  } else {
    $query = mysqli_query($con,"SELECT * FROM ".$this->prefix."recipes
    WHERE cat IN (".implode(',',$_POST['cats']).")
    ") or die(mysqli_error($con));
    while ($RECIPE = mysqli_fetch_object($query)) {
      mysqli_query($con,"DELETE FROM ".$this->prefix."ratings
      WHERE recipe = '$RECIPE->id'
      ") or die(mysqli_error($con));
    }
  }
}

// Delete all member comments..
function deleteAllRecipeComments($con) {
  $ids = array();
  if (in_array('all',$_POST['cats'])) {
    mysqli_query($con,"TRUNCATE TABLE ".$this->prefix."comments") or die(mysqli_error($con));
    mysqli_query($con,"UPDATE ".$this->prefix."recipes SET comCount = '0'") or die(mysqli_error($con));
  } else {
    $query = mysqli_query($con,"SELECT * FROM ".$this->prefix."recipes
    WHERE cat IN (".implode(',',$_POST['cats']).")
    ") or die(mysqli_error($con));
    while ($RECIPE = mysqli_fetch_object($query)) {
      $ids[] = $RECIPE->id;
    }
    if (!empty($ids)) {
      mysqli_query($con,"DELETE FROM ".$this->prefix."comments
      WHERE recipe IN (".implode(',',$ids).")
      ") or die(mysqli_error($con));
      mysqli_query($con,"UPDATE ".$this->prefix."recipes SET
      comCount = '0'
      WHERE id IN (".implode(',',$ids).")
      ") or die(mysqli_error($con));
    }
  }
}

}

?>
