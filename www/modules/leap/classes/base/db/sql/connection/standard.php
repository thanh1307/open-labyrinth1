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
 * This class handles a standard connection.
 *
 * @package Leap
 * @category SQL
 * @version 2012-02-09
 *
 * @abstract
 */
abstract class Base_DB_SQL_Connection_Standard extends DB_Connection {

	/**
	 * This function escapes a string to be used in an SQL statement.
	 *
	 * @access public
	 * @param string $string                    the string to be escaped
	 * @param char $escape                      the escape character
	 * @return string                           the quoted string
	 *
	 * @license http://codeigniter.com/user_guide/license.html
	 *
	 * @see http://codeigniter.com/forums/viewthread/179202/
	 */
	public function quote($string, $escape = NULL) {
		$removables = array(
			'/%0[0-8bcef]/',
			'/%1[0-9a-f]/',
			'/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S',
		);
		do {
			$string = preg_replace($removables, '', $string, -1, $count);
		}
		while ($count);

		$string = "'" . str_replace("'", "''", $string) . "'";
		
		if (is_string($escape) || ! empty($escape)) {
			$string .= " ESCAPE '{$escape[0]}'";
	    }

		return $string;
	}

}
?>