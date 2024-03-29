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
 * This class provides a set of functions for preparing a Drizzle expression.
 *
 * @package Leap
 * @category Drizzle
 * @version 2012-02-22
 *
 * @abstract
 */
abstract class Base_DB_Drizzle_Expression implements DB_SQL_Expression_Interface {

	/**
	 * This constant represents an opening identifier quote character.
	 *
	 * @access public
	 * @static
	 * @const string
	 */
	const _OPENING_QUOTE_CHARACTER_ = '`';

	/**
	 * This constant represents a closing identifier quote character.
	 *
	 * @access public
	 * @static
	 * @const string
	 */
	const _CLOSING_QUOTE_CHARACTER_ = '`';

	/**
	 * This variable stores the data source for which the expression is being
	 * prepared for.
	 *
	 * @access protected
	 * @var mixed
	 */
	protected $source;

	/**
	 * This function initializes the class with the specified data source.
	 *
	 * @access public
	 * @param mixed $source                     the data source to be used
	 */
	public function __construct($source) {
		$this->source = $source;
	}

	/**
	 * This function prepares the specified expression as an alias.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 * @throws Kohana_InvalidArgument_Exception indicates that there is a data type mismatch
	 */
	public function prepare_alias($expr) {
		if ( ! is_string($expr)) {
			throw new Kohana_InvalidArgument_Exception('Message: Invalid alias token specified. Reason: Token must be a string.', array(':expr' => $expr));
		}
		return self::_OPENING_QUOTE_CHARACTER_ . trim(preg_replace('/[^a-z0-9$_ ]/i', '', $expr)) . self::_CLOSING_QUOTE_CHARACTER_;
	}

	/**
	 * This function prepares the specified expression as a boolean.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 */
	public function prepare_boolean($expr) {
		return (bool) $expr;
	}

	/**
	 * This function prepares the specified expression as a connector.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 */
	public function prepare_connector($expr) {
		if (is_string($expr)) {
			$expr = strtoupper($expr);
			switch ($expr) {
				case DB_SQL_Connector::_AND_:
				case DB_SQL_Connector::_OR_:
					return $expr;
				break;
			}
		}
		throw new Kohana_InvalidArgument_Exception('Message: Invalid connector token specified. Reason: Token must exist in the enumerated set.', array(':expr' => $expr));
	}

	/**
	 * This function prepares the specified expression as an identifier column.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/identifiers.html
	 * @see http://www.ispirer.com/wiki/sqlways/mysql/identifiers
	 */
	public function prepare_identifier($expr) {
		if ($expr instanceof DB_Drizzle_Select_Builder) {
			return DB_SQL_Builder::_OPENING_PARENTHESIS_ . $expr->statement(FALSE) . DB_SQL_Builder::_CLOSING_PARENTHESIS_;
		}
		else if ($expr instanceof DB_SQL_Expression) {
			return $expr->value($this);
		}
		else if (class_exists('Database_Expression') && ($expr instanceof Database_Expression)) {
			return $expr->value();
		}
		else if ( ! is_string($expr)) {
			throw new Kohana_InvalidArgument_Exception('Message: Invalid identifier expression specified. Reason: Token must be a string.', array(':expr' => $expr));
		}
		else if (preg_match('/^SELECT.*$/i', $expr)) {
			$expr = rtrim($expr, "; \t\n\r\0\x0B");
			return DB_SQL_Builder::_OPENING_PARENTHESIS_ . $expr . DB_SQL_Builder::_CLOSING_PARENTHESIS_;
		}
		$parts = explode('.', $expr);
		foreach ($parts as &$part) {
			$part = self::_OPENING_QUOTE_CHARACTER_ . trim(preg_replace('/[^a-z0-9$_ ]/i', '', $part)) . self::_CLOSING_QUOTE_CHARACTER_;
		}
		$expr = implode('.', $parts);
		return $expr;
	}

	/**
	 * This function prepares the specified expression as a join type.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 *
	 * @see http://docs.drizzle.org/join.html
	 */
	public function prepare_join($expr) {
		if (is_string($expr)) {
			$expr = strtoupper($expr);
			switch ($expr) {
				case DB_SQL_JoinType::_CROSS_:
				case DB_SQL_JoinType::_LEFT_:
				case DB_SQL_JoinType::_RIGHT_:
					return $expr;
				break;
			}
		}
		throw new Kohana_InvalidArgument_Exception('Message: Invalid join type token specified. Reason: Token must exist in the enumerated set.', array(':expr' => $expr));
	}

	/**
	 * This function prepares the specified expression as a natural number.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 */
	public function prepare_natural($expr) {
		settype($expr, 'integer');
		return abs($expr);
	}

	/**
	 * This function prepares the specified expression as a operator.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @param string $group                     the operator grouping
	 * @return string                           the prepared expression
	 */
	public function prepare_operator($expr, $group) {
		if (is_string($group) && is_string($expr)) {
			$group = strtoupper($group);
			$expr = strtoupper($expr);
			if ($group == 'COMPARISON') {
				switch ($expr) {
					case DB_SQL_Operator::_NOT_EQUAL_TO_:
						$expr = DB_SQL_Operator::_NOT_EQUIVALENT_;
					case DB_SQL_Operator::_NOT_EQUIVALENT_:
					case DB_SQL_Operator::_EQUAL_TO_:
					case DB_SQL_Operator::_BETWEEN_:
					case DB_SQL_Operator::_NOT_BETWEEN_:
					case DB_SQL_Operator::_LIKE_:
					case DB_SQL_Operator::_NOT_LIKE_:
					case DB_SQL_Operator::_LESS_THAN_:
					case DB_SQL_Operator::_LESS_THAN_OR_EQUAL_TO_:
					case DB_SQL_Operator::_GREATER_THAN_:
					case DB_SQL_Operator::_GREATER_THAN_OR_EQUAL_TO_:
					case DB_SQL_Operator::_IN_:
					case DB_SQL_Operator::_NOT_IN_:
					case DB_SQL_Operator::_IS_:
					case DB_SQL_Operator::_IS_NOT_:
					case DB_SQL_Operator::_REGEX_:
					case DB_SQL_Operator::_NOT_REGEX_:
						return $expr;
					break;
				}
			}
			else if ($group == 'SET') {
				switch ($expr) {
					case DB_SQL_Operator::_UNION_:
					case DB_SQL_Operator::_UNION_ALL_:
					case DB_SQL_Operator::_UNION_DISTINCT_:
						return $expr;
					break;
				}
			}
		}
		throw new Kohana_InvalidArgument_Exception('Message: Invalid operator token specified. Reason: Token must exist in the enumerated set.', array(':group' => $group, ':expr' => $expr));
	}

	/**
	 * This function prepare the specified expression as a ordering token.
	 *
	 * @access public
	 * @param string $column                    the column to be sorted
	 * @param string $ordering                  the ordering token that signal whether the
	 *                                          column will sorted either in ascending or
	 *                                          descending order
	 * @param string $nulls                     the weight to be given to null values
	 * @return string                           the prepared clause
	 *
	 * @see http://forums.mysql.com/read.php?10,208709,208927
	 */
	public function prepare_ordering($column, $ordering, $nulls) {
		$column = $this->prepare_identifier($column);
		switch (strtoupper($ordering)) {
			case 'DESC':
				$ordering = 'DESC';
			break;
			case 'ASC':
			default:
				$ordering = 'ASC';
			break;
		}
		$expr = '';
		switch (strtoupper($nulls)) {
			case 'FIRST':
				$expr .= "CASE WHEN {$column} IS NULL THEN 0 ELSE 1 END, ";
			break;
			case 'LAST':
				$expr .= "CASE WHEN {$column} IS NULL THEN 1 ELSE 0 END, ";
			break;
		}
		$expr .= "{$column} {$ordering}";
		return $expr;
	}

	/**
	 * This function prepares the specified expression as a parenthesis.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 */
	public function prepare_parenthesis($expr) {
		if (is_string($expr)) {
			switch ($expr) {
				case DB_SQL_Builder::_OPENING_PARENTHESIS_:
				case DB_SQL_Builder::_CLOSING_PARENTHESIS_:
					return $expr;
				break;
			}
		}
		throw new Kohana_InvalidArgument_Exception('Message: Invalid parenthesis token specified. Reason: Token must exist in the enumerated set.', array(':expr' => $expr));
	}

	/**
	 * This function prepares the specified expression as a value.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @param char $escape                      the escape character
	 * @return string                           the prepared expression
	 */
	public function prepare_value($expr, $escape = NULL) {
		if ($expr === NULL) {
			return 'NULL';
		}
		else if ($expr === TRUE) {
			return "'1'";
		}
		else if ($expr === FALSE) {
			return "'0'";
		}
		else if (is_array($expr)) {
			$buffer = array();
			foreach ($expr as $value) {
				$buffer[] = call_user_func_array(array($this, __FUNCTION__), array($value, $escape));
			}
			return DB_SQL_Builder::_OPENING_PARENTHESIS_ . implode(', ', $buffer) . DB_SQL_Builder::_CLOSING_PARENTHESIS_;
		}
		else if (is_object($expr)) {
			if ($expr instanceof DB_Drizzle_Select_Builder) {
				return DB_SQL_Builder::_OPENING_PARENTHESIS_ . $expr->statement(FALSE) . DB_SQL_Builder::_CLOSING_PARENTHESIS_;
			}
			else if ($expr instanceof DB_SQL_Expression) {
				return $expr->value($this);
			}
			else if (class_exists('Database_Expression') && ($expr instanceof Database_Expression)) {
				return $expr->value();
			}
			else {
				return self::prepare_value( (string) $expr); // Convert the object to a string
			}
		}
		else if (is_integer($expr)) {
			return (int) $expr;
		}
		else if (is_double($expr)) {
			return sprintf('%F', $expr);
		}
		else if (is_string($expr) && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}(\s[0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $expr)) {
			return "'{$expr}'";
		}
		else if (empty($expr)) {
			return "''";
		}
		else {
			return DB_Connection_Pool::instance()->get_connection($this->source)->quote($expr, $escape);
		}
	}

	/**
	 * This function prepares the specified expression as a wildcard.
	 *
	 * @access public
	 * @param string $expr                      the expression to be prepared
	 * @return string                           the prepared expression
	 */
	public function prepare_wildcard($expr) {
		if ( ! is_string($expr)) {
			throw new Kohana_InvalidArgument_Exception('Message: Invalid wildcard token specified. Reason: Token must be a string.', array(':expr' => $expr));
		}
		$parts = explode('.', $expr);
		$count = count($parts);
		for ($i = 0; $i < $count; $i++) {
			$parts[$i] = (trim($parts[$i]) != '*')
				? self::_OPENING_QUOTE_CHARACTER_ . trim(preg_replace('/[^a-z0-9$_ ]/i', '', $parts[$i])) . self::_CLOSING_QUOTE_CHARACTER_
				: '*';
		}
		if (isset($parts[$count - 1]) && ($parts[$count - 1] != '*')) {
			$parts[] = '*';
		}
		$expr = implode('.', $parts);
		return $expr;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * This variable stores the compiler's XML config file.
	 *
	 * @access protected
	 * @static
	 * @var XML
	 */
	protected static $xml = NULL;

	/**
	 * This function checks whether the specified token is a reserved keyword.
	 *
	 * @access public
	 * @static
	 * @param string $token                     the token to be cross-referenced
	 * @return boolean                          whether the token is a reserved keyword
	 */
	public static function is_keyword($token) {
		if (is_null(self::$xml)) {
			self::$xml = XML::load('config/mysql.xml');
		}
		$token = strtoupper($token);
		$nodes = self::$xml->xpath("/sql/dialect[@name='mysql' and @version='5.6']/keywords[keyword = '{$token}']");
		return ! empty($nodes);
	}

}
?>