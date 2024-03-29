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
 * This class represents a "boolean" field in a database table.
 *
 * @package Leap
 * @category ORM
 * @version 2012-03-05
 *
 * @abstract
 */
abstract class Base_DB_ORM_Field_Boolean extends DB_ORM_Field {

	/**
	 * This constructor initializes the class.
	 *
	 * @access public
	 * @param DB_ORM_Model $model                   a reference to the implementing model
	 * @param array $metadata                       the field's metadata
	 */
	public function __construct(DB_ORM_Model $model, Array $metadata = array()) {
		parent::__construct($model, 'boolean');

		if (isset($metadata['savable'])) {
			$this->metadata['savable'] = (bool) $metadata['savable'];
		}

		if (isset($metadata['nullable'])) {
			$this->metadata['nullable'] = (bool) $metadata['nullable'];
		}

		if (isset($metadata['filter'])) {
			$this->metadata['filter'] = (string) $metadata['filter'];
		}

		if (isset($metadata['callback'])) {
			$this->metadata['callback'] = (string) $metadata['callback'];
		}

		$this->metadata['control'] = 'checkbox';

		if (isset($metadata['label'])) {
			$this->metadata['label'] = (string) $metadata['label'];
		}

		if (isset($metadata['default'])) {
			$default = $metadata['default'];
			if ( ! is_null($default)) {
				settype($default, $this->metadata['type']);
				$this->validate($default);
			}
			$this->metadata['default'] = $default;
			$this->value = $default;
		}
		else if ( ! $this->metadata['nullable']) {
			$default = FALSE;
			$this->metadata['default'] = $default;
			$this->value = $default;
		}
	}

}
?>