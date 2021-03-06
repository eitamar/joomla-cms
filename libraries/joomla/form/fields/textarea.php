<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla Platform.
 * Supports a multi line area for entry of plain text
 *
 * @link   http://www.w3.org/TR/html-markup/textarea.html#textarea
 * @since  11.1
 */
class JFormFieldTextarea extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Textarea';

	/**
	 * The number of rows in textarea.
	 *
	 * @var    mixed
	 * @since  3.2
	 */
	protected $rows;

	/**
	 * The number of columns in textarea.
	 *
	 * @var    mixed
	 * @since  3.2
	 */
	protected $columns;
	
	/**
	 * Layout to render the input
	 *
	 * @var  string
	 */
	protected $renderInputLayout = 'joomla.form.fields.textarea'; 

	/**
	 * Method to get certain otherwise inaccessible properties from the form field object.
	 *
	 * @param   string  $name  The property name for which to the the value.
	 *
	 * @return  mixed  The property value or null.
	 *
	 * @since   3.2
	 */
	public function __get($name)
	{
		switch ($name)
		{
			case 'rows':
			case 'columns':
				return $this->$name;
		}

		return parent::__get($name);
	}

	/**
	 * Method to set certain otherwise inaccessible properties of the form field object.
	 *
	 * @param   string  $name   The property name for which to the the value.
	 * @param   mixed   $value  The value of the property.
	 *
	 * @return  void
	 *
	 * @since   3.2
	 */
	public function __set($name, $value)
	{
		switch ($name)
		{
			case 'rows':
			case 'columns':
				$this->$name = (int) $value;
				break;

			default:
				parent::__set($name, $value);
		}
	}

	/**
	 * Method to attach a JForm object to the field.
	 *
	 * @param   SimpleXMLElement  $element  The SimpleXMLElement object representing the <field /> tag for the form field object.
	 * @param   mixed             $value    The form field value to validate.
	 * @param   string            $group    The field name group control value. This acts as as an array container for the field.
	 *                                      For example if the field has name="foo" and the group value is set to "bar" then the
	 *                                      full field name would end up being "bar[foo]".
	 *
	 * @return  boolean  True on success.
	 *
	 * @see     JFormField::setup()
	 * @since   3.2
	 */
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);

		if ($return)
		{
			$this->rows    = isset($this->element['rows']) ? (int) $this->element['rows'] : false;
			$this->columns = isset($this->element['cols']) ? (int) $this->element['cols'] : false;
		}

		return $return;
	}

	/**
	 * Method to get the textarea field input markup.
	 * Use the rows and columns attributes to specify the dimensions of the area.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Translate placeholder text
		$hint = $this->translateHint ? JText::_($this->hint) : $this->hint;

		// Initialize some field attributes.
		$layoutData['class']        = !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$layoutData['disabled']     = $this->disabled ? ' disabled' : '';
		$layoutData['readonly']     = $this->readonly ? ' readonly' : '';
		$layoutData['columns']      = $this->columns ? ' cols="' . $this->columns . '"' : '';
		$layoutData['rows']         = $this->rows ? ' rows="' . $this->rows . '"' : '';
		$layoutData['required']     = $this->required ? ' required aria-required="true"' : '';
		$layoutData['hint']         = $hint ? ' placeholder="' . $hint . '"' : '';
		$autocomplete = !$this->autocomplete ? ' autocomplete="off"' : ' autocomplete="' . $this->autocomplete . '"';
		$layoutData['autocomplete'] = $autocomplete == ' autocomplete="on"' ? '' : $autocomplete;
		$layoutData['autofocus']    = $this->autofocus ? ' autofocus' : '';
		$layoutData['spellcheck']   = $this->spellcheck ? '' : ' spellcheck="false"';

		// Initialize JavaScript field attributes.
		$layoutData['onchange'] = $this->onchange ? ' onchange="' . $this->onchange . '"' : '';
		$layoutData['onclick'] = $this->onclick ? ' onclick="' . $this->onclick . '"' : '';

		$layoutData['field']		= $this;
		
		
		return JLayoutHelper::render($this->renderInputLayout , $layoutData);
	}
}
