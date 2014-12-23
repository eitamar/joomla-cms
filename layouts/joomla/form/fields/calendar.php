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
 * 	$format
 */

// Including fallback code for HTML5 non supported browsers.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);

echo JHtml::_('calendar', 
		$displayData['field']->name, 
		$displayData['field']->value,
		$displayData['field']->id, 
		$displayData['format'], 
		$displayData['attributes']);

?>
