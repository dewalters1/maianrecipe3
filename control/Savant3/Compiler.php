<?php

/**
* 
* Abstract Savant3_Compiler class.
* 
* You have to extend this class for it to be useful; e.g., "class
* Savant3_Plugin_example extends Savant3_Plugin".
* 
* $Id: Compiler.php,v 1.4 2004/12/13 13:23:45 pmjones Exp $
* $Id: Compiler.php,v 2.0 2018/01/10 18:55:00 dewalters Exp $
* 
* @author Paul M. Jones <pmjones@ciaweb.net>
* @author Dennis E. Walters <dewalters1@live.com>
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

class Savant3_Compiler {
	
	/**
	* 
	* Reference to the "parent" Savant object.
	*
	*/
	
	var $Savant = null;
	
	
	/**
	* 
	* Constructor.
	* 
	* @access public
	* 
	*/
	
	function __construct($conf = array())
	{
		settype($conf, 'array');
		foreach ($conf as $key => $val) {
			$this->$key = $val;
		}
	}
	
	
	/**
	* 
	* Stub method for extended behaviors.
	*
	* @access public
	* 
	* @return void
	*
	*/
	
	function compile($tpl)
	{
	}
}
?>