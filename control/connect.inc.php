<?php

/*---------------------------------------------
  MAIAN RECIPE v2.0
  E-Mail: N/A
  Website: www.maianscriptworld.co.uk
  This File: Database Connection File
  Written by David Ian Bennett
----------------------------------------------*/

//------------------------------------------------------
// Class to establish global database connection
//------------------------------------------------------

$database = array();

//========================================================================================================
// NOTE: EDIT YOUR SQL CONNECTION INFORMATION BELOW. THE VARIABLES ARE ARRAY VARIABLES AND MUST NOT
// BE CHANGED. IE: $database['username']. DO NOT CHANGE THESE NAMES. ONLY THE VALUES SHOULD BE CHANGED
//========================================================================================================

//------------------------------------------------------
// HOST
// This is usually localhost or your server ip address
// Example: $database['host'] = 'localhost';
//------------------------------------------------------

//$database['host']          = 'host name goes here..';
$database['host']          = 'localhost';

//----------------------------------------------
// USERNAME
// Username assigned to database
// Example: $database['username'] = 'david';
//----------------------------------------------

//$database['username']      = 'username goes here..';
$database['username']      = 'root';

//----------------------------------------------
// PASSWORD
// Password assigned to database
// Example: $database['password'] = 'abc1234';
//----------------------------------------------

//$database['password']      = 'password goes here..';
$database['password']      = '';

//----------------------------------------------
// DATABASE NAME
// Name of Database that holds tables
// Example: $database['database'] = 'recipe';
//----------------------------------------------

//$database['database']      = 'database name goes here..';
$database['database']      = 'recipes';

//----------------------------------------------
// TABLE PREFIX
// For people with only 1 database
// Example: $database['prefix'] = 'mr_';
// DO NOT comment this line out. It is important
//  to the script. Leave as default if not sure
//----------------------------------------------

$database['prefix']        = 'mr_';

//----------------------------------------------
// COOKIE SANITATION
// Choose secret key for cookie and cookie name.
// The longer and more complex the better..
// Random characters or phrase for key
//----------------------------------------------

$database['cookieName']    = 'mr_cookie';
$database['cookieKey']     = 'hfgfyf[]f[9874hg36g88sgshgyghtythfdt00kfte';

//================================
// DO NOT EDIT BELOW THIS LINE
//================================

$connect = @mysqli_connect($database['host'],$database['username'],$database['password']);
if (!$connect) {
	die ('MySQL Error!!<br><br>Connection to the database has failed, this is the reason:<br /><br />'.mysqli_error().'<br><br>Check your connection information.');
}
@mysqli_select_db($connect, $database['database']) or die (mysqli_error($connect));
?>
