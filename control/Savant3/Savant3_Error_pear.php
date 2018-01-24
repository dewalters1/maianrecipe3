<?php

/**
* The base Savant3_Error class.
*/
require_once 'Savant3/Error.php';

/**
* The PEAR_Error class.
*/
require_once 'PEAR.php';

/**
* 
* Provides an interface to PEAR_ErrorStack class for Savant.
*
* $Id: Savant3_Error_pear.php,v 1.1 2004/10/04 01:52:23 pmjones Exp $
* 
* @author Paul M. Jones <pmjones@ciaweb.net>
* 
* @package Savant3
* 
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as
* published by the Free Software Foundation; either version 2.1 of the
* License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful, but
* WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
* Lesser General Public License for more details.
* 
*/

class Savant3_Error_pear extends Savant3_Error {
	
	
	/**
	* 
	* Extended behavior for PEAR_Error.
	*
	* @access public
	*
	* @return void
	*
	*/
	
	function error()
	{
		// throw a PEAR_Error
		PEAR::throwError($this->text, $this->code, $this->info);
	}
}
?>