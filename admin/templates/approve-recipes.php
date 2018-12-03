<?php

/*---------------------------------------------
  MAIAN RECIPE v3.0
  E-Mail: N/A
  Original Website: www.maianscriptworld.co.uk
  Current Website: github.com/dewalters1/maianrecipe3
  This File: Admin - Approve Recipes
  Written by David Ian Bennett
  Updated by Dennis Walters for PHP 7
----------------------------------------------*/

if (!defined('PARENT')) { include('index.html'); exit; } ?>
<!-- Start Body Area -->
<div id="bodyArea">
<?php
if (isset($OK)) {
echo actionCompleted(count($_POST['recipe']).' '.$recipes45);
}
if (isset($OK2)) {
echo actionCompleted(count($_POST['recipe']).' '.$recipes46);
}
?>
<div class="mainHead">
  
  <span class="headLeft"><?php echo $header3.(rowCount($connect,'recipes',' WHERE isApproved = \'yes\'')>0 ? ' <span style="font-weight:normal">- '.$recipes37.'</span>' : ''); ?>:</span>
  
  <form method="post" id="form" action="?p=approve-recipes" onsubmit="return confirmMessage('<?php echo $javascript; ?>')">
  <p>
  <span class="noData" style="text-align:left;font-size:12px"><span class="floatRight"><a href="#" onclick="infoBlock('show','<?php echo PER_PAGE; ?>');return false" title="<?php echo $recipes52; ?>"><?php echo $recipes52; ?></a> | <a href="#" onclick="infoBlock('hide','<?php echo PER_PAGE; ?>');return false" title="<?php echo $recipes53; ?>"><?php echo $recipes53; ?></a></span>&nbsp;<input type="checkbox" name="log" onclick="selectAll()" /> <?php echo $comments9; ?></span>
  </p>
  <?php

  $q_all = mysqli_query($connect,"SELECT *,DATE_FORMAT(adddate,'".mysqli_DATE_FORMAT."') AS aDate 
           FROM ".$database['prefix']."recipes
           WHERE isApproved = 'yes'
           LIMIT $limit,".PER_PAGE."
           ") or die(mysqli_error($connect));
  if (mysqli_num_rows($q_all)>0) {
  while ($RECIPES = mysqli_fetch_object($q_all)) {
  ?>
  <div class="recipe">
    <p><a href="#" onclick="toggle_box('recipe<?php echo $RECIPES->id; ?>');return false" title="<?php echo $recipes10; ?>"><?php echo $recipes10; ?></a></p>
    <input style="vertical-align:middle" type="checkbox" name="recipe[]" value="<?php echo $RECIPES->id; ?>" />&nbsp;&nbsp;&nbsp;<a href="?p=edit&amp;id=<?php echo $RECIPES->id; ?>" title="<?php echo $script13.': '.cleanData($RECIPES->name); ?>"><?php echo cleanData($RECIPES->name); ?></a>
  </div>
  
  <div class="recipeInfo" id="recipe<?php echo $RECIPES->id; ?>"<?php echo (!SHOW_RECIPE_INFO_BOXES ? ' style="display:none"' : ''); ?>>
    <b><?php echo $recipes18; ?></b>: <?php echo $RECIPES->aDate; ?> /<?php echo ($RECIPES->submitted_by ? ' <b>'.$recipes19.'</b>: '.cleanData($RECIPES->submitted_by).' / ' : ''); ?><b><?php echo $recipes33; ?></b>: <a href="?p=pictures&amp;recipe=<?php echo $RECIPES->id; ?>" title="<?php echo $recipes36; ?>"><?php echo rowCount($connect,'pictures',' WHERE recipe = \''.$RECIPES->id.'\''); ?></a> / <b><?php echo $recipes20; ?></b>: 0/<?php echo MAXIMUM_RATING_SCORE; ?> / <b><?php echo $recipes21; ?></b>: <?php echo number_format($RECIPES->hits); ?> / <b><?php echo $recipes22; ?></b>: <?php echo rowCount($connect,'comments',' WHERE recipe = \''.$RECIPES->id.'\' AND isApproved = \'no\''); ?>
  </div>
  <?php
  }
  } else {
  ?>
  <span class="noData"><?php echo $recipes38; ?></span>
  <?php
  }
  if (rowCount($connect,'recipes',' WHERE isApproved = \'yes\'')>0) {
  ?>
  <p>
  <span class="headLeft" style="margin-top:3px;text-align:left;font-size:12px">
  <?php echo $comments25; ?>: <select name="approve">
  <option value="yes"><?php echo $recipes43; ?></option>
  <option value="no"><?php echo $recipes44; ?></option>
  </select>
  <?php echo $comments26; ?>: <select name="email">
  <option value="yes"><?php echo $settings6; ?></option>
  <option value="no"><?php echo $settings7; ?></option>
  </select> <img src="templates/images/info.png" alt="" title="" <?php echo hoverHelpTip($javascript62); ?> />
  </span>
  <span style="display:block;padding-top:10px"><input type="hidden" name="process" value="1" />
  <input class="button" type="submit" value="<?php echo $recipes39; ?>" title="<?php echo $recipes39; ?>" />
  </span>
  </p>
  <?php
  }
  ?>
  
  </form>
  
  <?php 
  if (rowCount($connect,'recipes',' WHERE isApproved = \'yes\'')>0) {
    echo pageNumbers(rowCount($connect,'recipes',' WHERE isApproved = \'yes\''),PER_PAGE,$page);
  }
  ?>
  
  <p>&nbsp;</p>
  
</div>

<br class="break" />

</div>
<!-- End Body Area -->
