<?php

/*---------------------------------------------
  MAIAN RECIPE v3.0
  E-Mail: N/A
  Original Website: www.maianscriptworld.co.uk
  Current Website: github.com/dewalters1/maianrecipe3
  This File: Admin - Comments
  Written by David Ian Bennett
  Updated by Dennis Walters for PHP 7
----------------------------------------------*/

if (!defined('PARENT')) { include('index.html'); exit; }
$thisRecipe = getTableData($connect,'recipes','id',(int)$_GET['recipe']);
$SQL_SEARCH = '';
if (isset($_GET['keywords'])) {
  $SQL_SEARCH = "AND MATCH(comment,leftBy) AGAINST('".mysqli_real_escape_string($connect,$_GET['keywords'])."' IN BOOLEAN MODE)";
}
?>
<!-- Start Body Area -->
<div id="bodyArea">
<?php
if (isset($OK)) {
echo actionCompleted(count($_POST['comment']).' '.$comments30);
}
?>
<div class="mainHead">

  <span class="headLeft" style="margin-bottom:10px">
  
  <span class="quickJump"><?php echo $script15; ?>:
  <select onchange="if(this.value!= 0){location=this.options[this.selectedIndex].value}">
  <option value="0">---</option>
  <option value="?p=edit&amp;id=<?php echo $_GET['recipe']; ?>"><?php echo $edit; ?></option>
  <?php
  if ($thisRecipe->isApproved=='no') {
  ?>
  <option value="?p=comments&amp;recipe=<?php echo $_GET['recipe']; ?>" selected="selected"><?php echo $comments19; ?></option>
  <?php
  }
  ?>
  <option value="?p=pictures&amp;recipe=<?php echo $_GET['recipe']; ?>"><?php echo $pictures9; ?></option>
  </select>
  </span>
  
  <?php echo str_replace('{url}','?p=recipes',$comments21); ?>
  </span>

  <span class="headLeft" style="background:#fff;color:#4e626c"><?php echo $pictures; ?>:
  <select onchange="if(this.value!= 0){location=this.options[this.selectedIndex].value}">
  <?php
  $q_cats = mysqli_query($connect,"SELECT * FROM ".$database['prefix']."categories 
            WHERE isParent = 'yes'
            AND childOf    = '0'
            ORDER BY catname") or die(mysqli_error($connect));
  while ($CATS = mysqli_fetch_object($q_cats)) {
  $q_recipes = mysqli_query($connect,"SELECT * FROM ".$database['prefix']."recipes
               WHERE cat = '$CATS->id'
               ORDER BY name
               ") or die(mysqli_error($connect));
  if (mysqli_num_rows($q_recipes)>0) {
  ?>
  <optgroup label="<?php echo cleanData($CATS->catname); ?>">
  <?php
  while ($RECIPES = mysqli_fetch_object($q_recipes)) {
  ?>
  <option value="?p=comments&amp;recipe=<?php echo $RECIPES->id ; ?>"<?php echo (isset($_GET['recipe']) && $_GET['recipe']==$RECIPES->id ? ' selected="selected"' : ''); ?>><?php echo cleanData($RECIPES->name) ; ?> (<?php echo rowCount($connect,'comments',' WHERE isApproved = \'no\' AND recipe = \''.$RECIPES->id.'\''); ?>)</option>
  <?php
  }
  ?>
  </optgroup>
  <?php
  }
  $q_children = mysqli_query($connect,"SELECT * FROM ".$database['prefix']."categories 
                WHERE isParent = 'no'
                AND childOf    = '".$CATS->id."'
                ORDER BY catname") or die(mysqli_error($connect));
  while ($CHILDREN = mysqli_fetch_object($q_children)) {
  $q_recipes = mysqli_query($connect,"SELECT * FROM ".$database['prefix']."recipes
               WHERE cat = '$CHILDREN->id'
               ORDER BY name
               ") or die(mysqli_error($connect));
  if (mysqli_num_rows($q_recipes)>0) {
  ?>
  <optgroup label="<?php echo cleanData($CHILDREN->catname); ?>">
  <?php
  while ($RECIPES = mysqli_fetch_object($q_recipes)) {
  ?>
  <option value="?p=comments&amp;recipe=<?php echo $RECIPES->id ; ?>"<?php echo (isset($_GET['recipe']) && $_GET['recipe']==$RECIPES->id ? ' selected="selected"' : ''); ?>><?php echo cleanData($RECIPES->name) ; ?> (<?php echo rowCount($connect,'comments',' WHERE isApproved = \'no\' AND recipe = \''.$RECIPES->id.'\''); ?>)</option>
  <?php
  }
  ?>
  </optgroup>
  <?php
  }
  }
  }
  ?>
  </select>
  
  </span>
  
  <?php 
  if (isset($_GET['recipe'])) {
  ?>
  <form method="post" id="form" action="?p=comments&amp;recipe=<?php echo $_GET['recipe']; ?>" onsubmit="return confirmMessage('<?php echo $javascript; ?>')">
  <?php
  $q_comms = mysqli_query($connect,"SELECT *,DATE_FORMAT(addDate,'".mysqli_DATE_FORMAT."') AS adate FROM ".$database['prefix']."comments 
             WHERE isApproved = 'no' 
             AND recipe       = '".(int)$_GET['recipe']."'
             $SQL_SEARCH
             ORDER BY recipe
             ") or die(mysqli_error($connect));
  if (mysqli_num_rows($q_comms)>0) {
  ?>
  <p><span class="noData" style="text-align:left;font-size:12px">
  <span class="filterByComments"><?php echo str_replace('{count}',rowCount($connect,'comments',' WHERE isApproved = \'no\' AND recipe = \''.(int)$_GET['recipe'].'\''),$comments22); ?></span>
  
  &nbsp;<input type="checkbox" name="log" onclick="selectAll()" /> <?php echo $comments9; ?>
  </span>
  </p>
  <?php
  while ($COMMENTS = mysqli_fetch_object($q_comms)) {
  $RECIPE = getTableData($connect,'recipes','id',$COMMENTS->recipe);
  ?>
  <div class="comment">
    <p><a href="?p=edit-comment&amp;id=<?php echo $COMMENTS->id; ?>" onclick="$.GB_show(this.href, {height: 400,width: 800,caption: this.title});return false;" title="<?php echo $comments4; ?>"><?php echo $comments4; ?></a></p>
    <input style="vertical-align:middle" type="checkbox" name="comment[]" value="<?php echo $COMMENTS->id; ?>" />&nbsp;&nbsp;&nbsp;<span class="leftBy" style="font-size:12px">(<?php echo str_replace(array('{name}','{date}'),array(cleanData($COMMENTS->leftBy),$COMMENTS->adate),$comments8); ?>)</span> <a href="mailto:<?php echo $COMMENTS->email; ?>"><img src="templates/images/contact.png" alt="<?php echo str_replace('{name}',cleanData($COMMENTS->leftBy),$comments23); ?>" title="<?php echo str_replace('{name}',cleanData($COMMENTS->leftBy),$comments23); ?>" /></a>
  </div>
  <?php
  }
  ?>
  <p>
  <span style="display:block;padding-top:10px"><input type="hidden" name="process" value="1" />
  <input type="hidden" name="recipe" value="<?php echo (isset($_GET['recipe']) ? $_GET['recipe'] : '0'); ?>" />
  <input class="button" type="submit" value="<?php echo $comments31; ?>" title="<?php echo $comments31; ?>" />
  </span>
  </p>
  <?php
  } else {
  ?>
  <span class="noData"><?php echo $comments24; ?></span>
  <?php
  }
  ?>
  </form>
  
  <?php 
  if (mysqli_num_rows($q_comms)>0) {
    echo pageNumbers(rowCount($connect,'comments',(isset($_GET['recipe']) ? ' WHERE isApproved = \'no\' AND recipe = \''.(int)$_GET['recipe'].'\'' : ' WHERE isApproved = \'no\'').' '.$SQL_SEARCH),PER_PAGE,$page);
  }
  ?>
  <p>&nbsp;</p>
  <?php
  }
  ?>

</div>

<br class="break" />

</div>
<!-- End Body Area -->
