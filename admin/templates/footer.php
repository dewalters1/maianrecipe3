<?php

/*---------------------------------------------
  MAIAN RECIPE v3.0
  E-Mail: N/A
  Original Website: www.maianscriptworld.co.uk
  Current Website: github.com/dewalters1/maianrecipe3
  This File: Admin - Footer
  Written by David Ian Bennett
  Updated by Dennis Walters for PHP 7
----------------------------------------------*/

if (!defined('PARENT')) { include('index.html'); exit; }

// The footer link to Maian Script World should remain in place.
// If you wish to remove this link, please consider a copyright removal fee for your domain.
// Payment can be made via the Maian Recipe website
// Removing the link without permission invalidates any support.
// Thank you! 

$show_footer  = $script3.': <a href="http://gihub.com/dewalters1/maianrecipe3/" title="'.$script.' '.$script2.'" onclick="window.open(this);return false"><b>'.$script.' '.$script2.'</b></a><br />&copy; 2006-'.date("Y").' Maian Script World. '.$script9;

?>

</div>
<!-- End Content Wrapper -->

<!-- Footer -->
<div id="footer">
 <p class="copyright"><?php echo $show_footer; ?></p>
</div>
<!-- End Footer -->

</div>
<!-- End Site Wrapper -->

<p>&nbsp;</p>

</body>
</html>
