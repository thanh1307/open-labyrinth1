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
 * This class builds a PostgreSQL delete statement.
 *
 * @package Leap
 * @category PostgreSQL
 * @version 2011-12-12
 *
 * @see http://www.postgresql.org/docs/9.0/static/sql-delete.html
 * @see http://www.pgsql.cz/index.php/PostgreSQL_SQL_Tricks
 * @see http://archives.postgresql.org/pgsql-hackers/2010-11/msg02023.php
 * @see http://www.postgresql.org/docs/8.2/static/ddl-system-columns.html
 *
 * @abstract
 */
abstract class Base_DB_PostgreSQL_Delete_Builder extends DB_SQL_Delete_Builder {

	/**
	 * This function returns the SQL statement.
	 *
	 * @access public
	 * @param boolean $terminated           whether to add a semi-colon to the end
	 *                                      of the statement
	 * @return string                       the SQL statement
	 */
	public function statement($terminated = TRUE) {
		$sql = '';

		if ( ! empty($this->data['where'])) {
			$do_append = FALSE;
			$sql .= ' WHERE ';
			foreach ($this->data['where'] as $where) {
				if ($do_append && ($where[1] != DB_SQL_Builder::_CLOSING_PARENTHESIS_)) {
					$sql .= " {$where[0]} ";
				}
				$sql .= $where[1];
				$do_append = ($where[1] != DB_SQL_Builder::_OPENING_PARENTHESIS_);
			}
		}

		if ( ! empty($this->data['order_by'])) {
			$sql .= ' ORDER BY ' . implode(', ', $this->data['order_by']);
		}

		if ($this->data['limit'] > 0) {
			$sql .= " LIMIT {$this->data['limit']}";
		}

		if ($this->data['offset'] > 0) {
			$sql .= " OFFSET {$this->data['offset']}";
		}

		if ( ! empty($sql)) {
			$sql = " WHERE ctid = any(array(SELECT ctid FROM {$this->data['from']}" . $sql . '))';
		}

		$sql = "DELETE FROM {$this->data['from']}" . $sql;

		if ($terminated) {
			$sql .= ';';
		}

		return $sql;
	}

}
?>