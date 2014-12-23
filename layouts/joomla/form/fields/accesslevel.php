<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * Layout variables
 * ---------------------
 * 	$field <--- the field object
 *  $attributes			
 * 	$options
 */

echo JHtml::_('access.level', 
		$displayData['field']->name, 
		$displayData['field']->value, 
		$displayData['attributes'], 
		$displayData['options'], 
		$displayData['field']->id);
?>
