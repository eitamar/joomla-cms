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
 * 	$columns
 * 	$rows			
 * 	$class			
 * 	$readonly		
 * 	$disabled		
 * 	$required
 * 	$autocomplete 
 * 	$autofocus
 * 	$spellcheck
 * 	$onchange
 * 	$onclick
 */
// Including fallback code for HTML5 non supported browsers.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);
?>

<textarea name="<?= $displayData['field']->name ?>" 
		  id="<?= $displayData['field']->id ?>"
		  <?= $displayData['columns'] ?>
		  <?= $displayData['rows'] ?>
		  <?= $displayData['class'] ?>
		  <?= $displayData['hint'] ?>
		  <?= $displayData['disabled'] ?> 
		  <?= $displayData['readonly'] ?>
		  <?= $displayData['onchange'] ?>
		  <?= $displayData['onclick'] ?>
		  <?= $displayData['required'] ?>
		  <?= $displayData['autocomplete'] ?>
		  <?= $displayData['autofocus'] ?>
		  <?= $displayData['spellcheck'] ?> ><?= htmlspecialchars($displayData['field']->value, ENT_COMPAT, 'UTF-8') ?></textarea>

