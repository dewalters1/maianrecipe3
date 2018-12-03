<?php

/*---------------------------------------------
  MAIAN RECIPE v3.0
  E-Mail: N/A
  Original Website: www.maianscriptworld.co.uk
  Current Website: github.com/dewalters1/maianrecipe3
  This File: Admin - Home
  Written by David Ian Bennett
  Updated by Dennis Walters for PHP 7
----------------------------------------------*/

if (!defined('PARENT')) { include('index.html'); exit; }
$disRecipes  = rowCount($connect,'recipes',' WHERE enRecipe = \'no\'');
$disCats     = rowCount($connect,'categories',' WHERE isParent = \'yes\' AND enCat = \'no\'');
$disSubCats  = rowCount($connect,'categories',' WHERE isParent = \'no\' AND enCat = \'no\'');
?>
<!-- Start Body Area -->
<div id="bodyArea">

<div class="left">
  <?php
  if (!empty($sec)) {
  ?>
  <span class="headError"><?php echo $script17; ?>:</span>
  <p class="errorWrap">&#8226; <?php echo implode('<br /><br />&#8226; ',$sec); ?></p>
  <?php
  }
  ?>
  <span class="headLeft"><?php echo $script.' '.$script2.' '.$header; ?>:</span>

  <p style="padding:10px;line-height:18px"><?php echo $home2; ?></p>

</div>

<div class="right">

  <span class="headRight"><?php echo $home4; ?>:</span>

  <p class="rightPHome">

  <span class="homeStat"><b><?php echo rowCount($connect,'recipes',' WHERE isApproved = \'no\''); ?></b> <?php echo $home8; ?></span>
  <?php echo ($disRecipes>0 ? '<span class="homeStat2"><b>'.$disRecipes.'</b> '.$home15.'</span>' : ''); ?>

  <span class="homeStat"><b><?php echo rowCount($connect,'pictures'); ?></b> <?php echo $home9; ?> <img src="templates/images/info.png" alt="" title="" <?php echo hoverHelpTip($javascript63); ?> /></span>

  <span class="homeStat"><b><?php echo rowCount($connect,'comments',' WHERE isApproved = \'no\''); ?></b> <?php echo $home10; ?></span>

  <span class="homeStat"><b><?php echo rowCount($connect,'categories',' WHERE isParent = \'yes\''); ?></b> <?php echo $home11; ?></span>
  <?php echo ($disCats>0 ? '<span class="homeStat2"><b>'.$disCats.'</b> '.$home15.'</span>' : ''); ?>

  <span class="homeStat"><b><?php echo rowCount($connect,'categories',' WHERE childOf > \'0\''); ?></b> <?php echo $home12; ?></span>
  <?php echo ($disSubCats>0 ? '<span class="homeStat2"><b>'.$disSubCats.'</b> '.$home15.'</span>' : ''); ?>

  </p>

  <span class="headRight"><?php echo $home7; ?>:</span>

  <p class="rightPHome">

  <span class="homeStat"><a href="?p=approve-recipes"><b><?php echo rowCount($connect,'recipes',' WHERE isApproved = \'yes\''); ?></b></a> <?php echo $home8; ?></span>

  <span class="homeStat"><a href="?p=approve-comments"><b><?php echo rowCount($connect,'comments',' WHERE isApproved = \'yes\''); ?></b></a> <?php echo $home10; ?></span>

  </p>

  <span class="headRightMid"><?php echo $home3; ?>:</span>

  <p class="rightPHome"><a href="http://www.maianrecipe.com/"><img src="templates/images/donation.gif" alt="<?php echo $home3; ?>" title="<?php echo $home3; ?>" /></a></p>

  <span class="headRight"><?php echo $home5; ?>:</span>

  <p class="rightPHome">

  <span class="homeLink"><a href="http://www.maianrecipe.com/" title="<?php echo $home13; ?>" onclick="window.open(this);return false"><?php echo $home13; ?></a></span>

  <span class="homeLink"><a href="http://www.maianrecipe.com/" title="<?php echo $home14; ?>" onclick="window.open(this);return false"><?php echo $home14; ?></a></span>

  </p>

</div>

<br class="break" />

</div>
<!-- End Body Area -->
