<?php

/*---------------------------------------------
  MAIAN RECIPE v3.0
  E-Mail: N/A
  Original Website: www.maianscriptworld.co.uk
  Current Website: github.com/dewalters1/maianrecipe3
  This File: Admin - Approve Comments
  Written by David Ian Bennett
  Updated by Dennis Walters for PHP 7
----------------------------------------------*/

if (!defined('PARENT')) { include('index.html'); exit; }

?>
<div id="bodyArea">
<?php
if (isset($OK)) {
echo actionCompleted(count($_POST['comment']).' '.$comments12);
}
if (isset($OK2)) {
echo actionCompleted(count($_POST['comment']).' '.$comments13);
}
?>

<div class="mainHead">

  <span class="headLeft"><?php echo $comments; ?> - <span style="font-weight:normal"><?php echo $comments2; ?></span>:</span>
  
  <form method="post" id="form" action="?p=approve-comments<?php echo (isset($_GET['recipe']) ? '&amp;recipe='.$_GET['recipe'] : ''); ?>" onsubmit="return confirmMessage('<?php echo $javascript; ?>')">
  <p><span class="noData" style="text-align:left;font-size:12px">
  <span class="filterByComments"><?php echo $comments10; ?>: <select onchange="if(this.value!= 0){location=this.options[this.selectedIndex].value}">
  <option value="?p=approve-comments"><?php echo $comments27; ?></option>
  <?php
  $q_all = mysqli_query($connect,"SELECT *,DATE_FORMAT(adddate,'".mysqli_DATE_FORMAT."') AS aDate 
           FROM ".$database['prefix']."recipes
           WHERE isApproved = 'no'
           ORDER BY name
           ") or die(mysqli_error($connect));
  if (mysqli_num_rows($q_all)>0) {
  while ($RECIPES = mysqli_fetch_object($q_all)) {
  ?>
  <option value="?p=approve-comments&amp;recipe=<?php echo $RECIPES->id; ?>"<?php echo (isset($_GET['recipe']) && $_GET['recipe']==$RECIPES->id ? ' selected="selected"' : ''); ?>><?php echo cleanData($RECIPES->name); ?> (<?php echo rowCount($connect,'comments',' WHERE isApproved = \'yes\' AND recipe = \''.$RECIPES->id.'\''); ?>)</option>
  <?php
  }
  }
  ?>
  </select>
  </span>
  
  &nbsp;<input type="checkbox" name="log" onclick="selectAll()" /> <?php echo $comments9; ?>
  </span>
  </p>
  <?php
  $q_comms = mysqli_query($connect,"SELECT *,DATE_FORMAT(addDate,'".mysqli_DATE_FORMAT."') AS adate FROM ".$database['prefix']."comments 
             WHERE isApproved = 'yes' 
             ".(isset($_GET['recipe']) ? 'AND recipe = \''.(int)$_GET['recipe'].'\'' : '')."
             ORDER BY recipe
             ") or die(mysqli_error($connect));
  if (mysqli_num_rows($q_comms)>0) {
  while ($COMMENTS = mysqli_fetch_object($q_comms)) {
  $RECIPE = getTableData($connect,'recipes','id',$COMMENTS->recipe);
  ?>
  <div class="comment">
    <p><a href="?p=edit-comment&amp;id=<?php echo $COMMENTS->id; ?>" onclick="$.GB_show(this.href, {height: 400,width: 800,caption: this.title});return false;" title="<?php echo $comments4; ?>"><?php echo $comments4; ?></a></p>
    <input style="vertical-align:middle" type="checkbox" name="comment[]" value="<?php echo $COMMENTS->id; ?>" />&nbsp;&nbsp;&nbsp;<?php echo cleanData($RECIPE->name); ?> <span class="leftBy">(<?php echo str_replace(array('{name}','{date}'),array(cleanData($COMMENTS->leftBy),$COMMENTS->adate),$comments8); ?>)</span> <a href="mailto:<?php echo $COMMENTS->email; ?>"><img src="templates/images/contact.png" alt="<?php echo str_replace('{name}',cleanData($COMMENTS->leftBy),$comments23); ?>" title="<?php echo str_replace('{name}',cleanData($COMMENTS->leftBy),$comments23); ?>" /></a>
  </div>
  <?php
  }
  ?>
  <p>
  <span class="headLeft" style="margin-top:3px;text-align:left;font-size:12px">
  <?php echo $comments25; ?>: <select name="approve">
  <option value="yes"><?php echo $comments6; ?></option>
  <option value="no"><?php echo $comments7; ?></option>
  </select>
  <?php echo $comments26; ?>: <select name="email">
  <option value="yes"><?php echo $settings6; ?></option>
  <option value="no"><?php echo $settings7; ?></option>
  </select> <img src="templates/images/info.png" alt="" title="" <?php echo hoverHelpTip($javascript61); ?> />
  </span>
  <span style="display:block;padding-top:10px"><input type="hidden" name="process" value="1" />
  <input type="hidden" name="recipe" value="<?php echo (isset($_GET['recipe']) ? $_GET['recipe'] : '0'); ?>" />
  <input class="button" type="submit" value="<?php echo $comments5; ?>" title="<?php echo $comments5; ?>" />
  </span>
  </p>
  <?php
  } else {
  ?>
  <span class="noData"><?php echo (isset($_GET['recipe']) ? $comments11 : $comments3); ?></span>
  <?php
  }
  ?>
  </form>
  
  <?php 
  if (mysqli_num_rows($q_comms)>0) {
    echo pageNumbers(rowCount($connect,'comments',(isset($_GET['recipe']) ? ' WHERE isApproved = \'yes\' AND recipe = \''.(int)$_GET['recipe'].'\'' : ' WHERE isApproved = \'yes\'')),PER_PAGE,$page);
  }
  ?>
  <p>&nbsp;</p>
  
</div>

</div>
