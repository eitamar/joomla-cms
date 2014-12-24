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
 * 	$class			
 * 	$disabled		
 * 	$required
 * 	$autofocus
 * 	$checked
 * 	$onclick
 * 	$onchange
 */
// Including fallback code for HTML5 non supported browsers.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);
?>

<input type="checkbox" 
		name="<?= $displayData['field']->name ?>" 
	   id="<?= $displayData['field']->id ?>"
	   value="<?= htmlspecialchars($displayData['field']->value, ENT_COMPAT, 'UTF-8') ?>"
	   <?= $displayData['class'] ?> 
	   <?= $displayData['checked'] ?>
	   <?= $displayData['disabled'] ?>
	   <?= $displayData['onclick'] ?> 
	   <?= $displayData['onchange'] ?> 
	   <?= $displayData['required'] ?> 
	   <?= $displayData['autofocus'] ?> />
