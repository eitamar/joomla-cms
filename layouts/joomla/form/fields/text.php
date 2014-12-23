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
 *  $hint			
 * 	$size			
 * 	$maxLength		
 * 	$class			
 * 	$readonly		
 * 	$disabled		
 * 	$required
 * 	$autocomplete 
 * 	$autofocus
 * 	$spellcheck
 * 	$pattern
 * 	$inputmode
 * 	$dirname
 * 	$onchange
 * 	$datalist
 * 	$list
 */
// Including fallback code for HTML5 non supported browsers.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);
?>
<input type="text" 
	   name="<?= $displayData['field']->name ?>" 
	   id="<?= $displayData['field']->id ?>"
	   <?= $displayData['dirname'] ?> 
	   value="<?= htmlspecialchars($displayData['field']->value, ENT_COMPAT, 'UTF-8') ?>"
	   <?= $displayData['class'] ?> 
	   <?= $displayData['size'] ?> 
	   <?= $displayData['disabled'] ?> 
	   <?= $displayData['readonly'] ?> 
	   <?= $displayData['list'] ?>
	   <?= $displayData['hint'] ?>
	   <?= $displayData['onchange'] ?>
	   <?= $displayData['maxLength'] ?>
	   <?= $displayData['required'] ?>
	   <?= $displayData['autocomplete'] ?>
	   <?= $displayData['autofocus'] ?>
	   <?= $displayData['spellcheck'] ?>
	   <?= $displayData['inputmode'] ?>
	   <?= $displayData['pattern'] ?> />

<?= $displayData['datalist'] ?>
