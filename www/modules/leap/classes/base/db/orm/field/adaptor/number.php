<?php defined('SYSPATH') OR die('Không được phép truy cập trực tiếp.');

/**
 * Copyright 2011-2012 Spadefoot
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * This class represents a "number" adaptor for a handling formatted numbers.
 *
 * @package Leap
 * @category ORM
 * @version 2011-12-17
 *
 * @see http://php.net/manual/en/function.number-format.php
 * @see http://api.rubyonrails.org/classes/ActionView/Helpers/NumberHelper.html
 *
 * @abstract
 */
abstract class Base_DB_ORM_Field_Adaptor_Number extends DB_ORM_Field_Adaptor {

	/**
	 * This constructor initializes the class.
	 *
	 * @access public
	 * @param DB_ORM_Model $model                   a reference to the implementing model
	 * @param array $metadata                       the adaptor's metadata
	 * @throws Kohana_InvalidArgument_Exception     indicates that an invalid field name
	 *                                              was specified
	 */
	public function __construct(DB_ORM_Model $model, Array $metadata = array()) {
		parent::__construct($model, $metadata['field']);

		// Sets the number of decimal points.
		$this->metadata['precision'] = (isset($metadata['precision']))
			? (int) $metadata['precision']
			: 0;

		// Sets the data type that will be used when casting value.
		$this->metadata['type'] = ($this->metadata['precision'] > 0) ? 'double' : 'integer';

		// Sets the separator between the fractional and integer digits.
		$this->metadata['separator'] = (isset($metadata['separator']))
			? (string) $metadata['separator']
			: '.';

		$this->metadata['regex'] = array();

		// Sets the regex that will be used to replace separator
		$this->metadata['regex'][0] = '/' . preg_quote($this->metadata['separator']) . '/';

		// Sets the thousands delimiter.
		$this->metadata['delimiter'] = (isset($metadata['delimiter']))
			? (string) $metadata['delimiter']
			: ',';

		// Sets the regex that will be used to replace delimiter
		$this->metadata['regex'][1] = '/' . preg_quote($this->metadata['delimiter']) . '/';
	}

	/**
	 * This function returns the value associated with the specified property.
	 *
	 * @access public
	 * @param string $key                           the name of the property
	 * @return mixed                                the value of the property
	 * @throws Kohana_InvalidProperty_Exception     indicates that the specified property is
	 *                                              either inaccessible or undefined
	 */
	public function __get($key) {
		switch ($key) {
			case 'value':
				$value = $this->model->{$this->metadata['field']};
				if ( ! is_null($value)) {
					$value = number_format($value, $this->metadata['precision'], $this->metadata['separator'], $this->metadata['delimiter']);
				}
				return $value;
			break;
			default:
				if (isset($this->metadata[$key])) { return $this->metadata[$key]; }
			break;
		}
		throw new Kohana_InvalidProperty_Exception('Message: Unable to get the specified property. Reason: Property :key is either inaccessible or undefined.', array(':key' => $key));
	}

	/**
	 * This function sets the value for the specified key.
	 *
	 * @access public
	 * @param string $key                           the name of the property
	 * @param mixed $value                          the value of the property
	 * @throws Kohana_InvalidProperty_Exception     indicates that the specified property is
	 *                                              either inaccessible or undefined
	 */
	public function __set($key, $value) {
		switch ($key) {
			case 'value':
				if (is_string($value)) {
					$value = preg_replace($this->metadata['regex'][1], '', $value);
					$value = preg_replace($this->metadata['regex'][0], '.', $value);
					settype($value, $this->metadata['type']);
				}
				$this->model->{$this->metadata['field']} = $value;
			break;
			default:
				throw new Kohana_InvalidProperty_Exception('Message: Unable to set the specified property. Reason: Property :key is either inaccessible or undefined.', array(':key' => $key, ':value' => $value));
			break;
		}
	}

}
?>