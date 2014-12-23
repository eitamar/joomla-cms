<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

JFormHelper::loadFieldClass('list');

/**
 * Form Field class for the Joomla Platform.
 * Provides a list of access levels. Access levels control what users in specific
 * groups can see.
 *
 * @see    JAccess
 * @since  11.1
 */
class JFormFieldAccessLevel extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'AccessLevel';
	
	/**
	 * Layout to render the input
	 *
	 * @var  string
	 */
	protected $renderInputLayout = 'joomla.form.fields.accesslevel';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		$attr = '';

		// Initialize some field attributes.
		$attr .= !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$attr .= $this->disabled ? ' disabled' : '';
		$attr .= !empty($this->size) ? ' size="' . $this->size . '"' : '';
		$attr .= $this->multiple ? ' multiple' : '';
		$attr .= $this->required ? ' required aria-required="true"' : '';
		$attr .= $this->autofocus ? ' autofocus' : '';

		// Initialize JavaScript field attributes.
		$attr .= $this->onchange ? ' onchange="' . $this->onchange . '"' : '';

		// Get the field options.
		$layoutData['options']		= $this->getOptions();
		
		$layoutData['field']		= $this;
		$layoutData['attributes']	= $attr;   //TODO: break the attr to pieces and load it to the layout for creating the right matrkup

		return JLayoutHelper::render($this->renderInputLayout , $layoutData);
	}
}
