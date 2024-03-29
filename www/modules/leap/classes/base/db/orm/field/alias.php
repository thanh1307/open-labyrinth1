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
 * This class represents an alias for a field in a database table.
 *
 * @package Leap
 * @category ORM
 * @version 2012-01-20
 *
 * @abstract
 */
abstract class Base_DB_ORM_Field_Alias extends Kohana_Object {

	/**
	 * This variable stores a reference to the implementing model.
	 *
	 * @access protected
	 * @var DB_ORM_Model
	 */
	protected $model;

	/**
	 * This variable stores the alias's metadata.
	 *
	 * @access protected
	 * @var array
	 */
	protected $metadata;

	/**
	 * This constructor initializes the class.
	 *
	 * @access public
	 * @param DB_ORM_Model $model                   a reference to the implementing model
	 * @param string $field                         the name of field in the database table
	 * @throws Kohana_InvalidArgument_Exception     indicates that an invalid field name
	 *                                              was specified
	 */
	public function __construct(DB_ORM_Model $model, $field) {
		if ( ! is_string($field) || $model->is_adaptor($field) || $model->is_alias($field) || ! $model->is_field($field) || $model->is_relation($field)) {
			throw new Kohana_InvalidArgument_Exception('Message: Invalid field name defined. Reason: Field name either is not a field or is already defined.', array(':field' => $field));
		}
		$this->model = $model;
		$this->metadata['field'] = $field;
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
				return $this->model->{$this->metadata['field']};
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
				$this->model->{$this->metadata['field']} = $value;
			break;
			default:
				throw new Kohana_InvalidProperty_Exception('Message: Unable to set the specified property. Reason: Property :key is either inaccessible or undefined.', array(':key' => $key, ':value' => $value));
			break;
		}
	}

}
?>