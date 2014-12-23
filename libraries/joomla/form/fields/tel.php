<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

JFormHelper::loadFieldClass('text');

/**
 * Form Field class for the Joomla Platform.
 * Supports a text field telephone numbers.
 *
 * @link   http://www.w3.org/TR/html-markup/input.tel.html
 * @see    JFormRuleTel for telephone number validation
 * @see    JHtmlTel for rendering of telephone numbers
 * @since  11.1
 */
class JFormFieldTel extends JFormFieldText
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Tel';
	
	/**
	 * Layout to render the input
	 *
	 * @var  string
	 */
	protected $renderInputLayout = 'joomla.form.fields.tel';
	

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   3.2
	 */
	protected function getInput()
	{
		// Translate placeholder text
		$hint = $this->translateHint ? JText::_($this->hint) : $this->hint;

		// Initialize some field attributes.
		$layoutData['size']         = !empty($this->size) ? ' size="' . $this->size . '"' : '';
		$layoutData['maxLength']    = !empty($this->maxLength) ? ' maxlength="' . $this->maxLength . '"' : '';
		$layoutData['class']        = !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$layoutData['readonly']     = $this->readonly ? ' readonly' : '';
		$layoutData['disabled']     = $this->disabled ? ' disabled' : '';
		$layoutData['required']     = $this->required ? ' required aria-required="true"' : '';
		$layoutData['hint']         = $hint ? ' placeholder="' . $hint . '"' : '';
		$autocomplete = !$this->autocomplete ? ' autocomplete="off"' : ' autocomplete="' . $this->autocomplete . '"';
		$layoutData['autocomplete'] = $autocomplete == ' autocomplete="on"' ? '' : $autocomplete;
		$layoutData['autofocus']    = $this->autofocus ? ' autofocus' : '';
		$layoutData['spellcheck']   = $this->spellcheck ? '' : ' spellcheck="false"';

		// Initialize JavaScript field attributes.
		$layoutData['onchange'] = $this->onchange ? ' onchange="' . $this->onchange . '"' : '';

		$layoutData['field']		= $this;
		
		return JLayoutHelper::render($this->renderInputLayout , $layoutData);
	}
}
