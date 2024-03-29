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
 * This class sets forth the functions for a database connection.
 *
 * @package Leap
 * @category Connection
 * @version 2012-02-09
 *
 * @abstract
 */
abstract class Base_DB_Connection extends Kohana_Object {

	/**
	 * This variable stores the connection configurations.
	 *
	 * @access protected
	 * @var string
	 */
	protected $cache_key = NULL;

	/**
	 * This variable stores the connection configurations.
	 *
	 * @access protected
	 * @var DB_DataSource
	 */
	protected $data_source = NULL;

	/**
	 * This variable stores the last error message reported.
	 *
	 * @access protected
	 * @var array
	 */
	protected $error = '';

	/**
	 * This variable is used to store the connection's link identifier.
	 *
	 * @access protected
	 * @var resource
	 */
	protected $link_id = NULL;

	/**
	 * This variable stores the last SQL statement executed.
	 *
	 * @access protected
	 * @var string
	 */
	protected $sql = '';

	/**
	 * This function initializes the class with the specified data source.
	 *
	 * @access public
	 * @param DB_DataSource $data_source	the connection's configurations
	 */
	public function __construct(DB_DataSource $data_source) {
		$this->data_source = $data_source;
	}

	/**
	 * This function allows for the ability to open a connection using the data source
	 * provided.
	 *
	 * @access public
	 * @abstract
	 * @throws Kohana_Database_Exception        indicates that there is problem with
	 *                                          the database connection
	 */
	public abstract function open();

	/**
	 * This function manages query caching.
	 *
	 * @access protected
	 * @param string $sql                       the SQL statement being queried
	 * @param string $type						the return type that is being used
	 * @param DB_ResultSet $results             the result set
	 * @return DB_ResultSet                     the result set for the specified
	 */
	protected function cache($sql, $type, $results = NULL) {
		if ($this->data_source->cache->enabled) {
			if ( ! is_null($results)) {
				if ($this->data_source->cache->lifetime > 0) {
					Kohana::cache($this->cache_key, $results, $this->data_source->cache->lifetime);
				}
				return $results;
			}
			else if ($this->data_source->cache->lifetime !== NULL) {
				$this->cache_key = 'DB_Connection::query("' . $this->data_source->id . '", "' . $type . '", "' . $sql . '")';
				$results = Kohana::cache($this->cache_key, NULL, $this->data_source->cache->lifetime);
				if (($results !== NULL) && ! $this->data_source->cache->force) {
					return $results;
				}
			}
		}
		return $results;
	}

	/**
	 * This function begins a transaction.
	 *
	 * @access public
	 * @abstract
	 * @throws Kohana_SQL_Exception             indicates that the executed statement failed
	 */
	public abstract function begin_transaction();

	/**
	 * This function allows for the ability to process a query that will return data
	 * using the passed string.
	 *
	 * @access public
	 * @abstract
	 * @param string $sql                       the SQL statement
	 * @param string $type               		the return type to be used
	 * @return DB_ResultSet                     the result set
	 * @throws Kohana_SQL_Exception             indicates that the query failed
	 */
	public abstract function query($sql, $type = 'array');

	/**
	 * This function allows for the ability to process a query that will not return
	 * data using the passed string.
	 *
	 * @access public
	 * @abstract
	 * @param string $sql						the SQL statement
	 * @throws Kohana_SQL_Exception             indicates that the executed statement failed
	 */
	public abstract function execute($sql);

	/**
	 * This function returns the last insert id.
	 *
	 * @access public
	 * @abstract
	 * @return integer                          the last insert id
	 * @throws Kohana_SQL_Exception             indicates that the query failed
	 */
	public abstract function get_last_insert_id();

	/**
	 * This function returns the connection's link identifier.
	 *
	 * @access public
	 * @return resource                         the link identifier
	 * @throws Kohana_Database_Exception        indicates that no connection has been
	 *                                          established
	 */
	public function &get_resource_id() {
		if ( ! $this->is_connected()) {
			throw new Kohana_Database_Exception('Message: Unable to fetch resource id. Reason: No connection has been established.');
		}
		return $this->link_id;
	}

	/**
	 * This function is for determining whether a connection is established.
	 *
	 * @access public
	 * @return boolean                          whether a connection is established
	 */
	public function is_connected() {
		return is_resource($this->link_id);
	}

	/**
	 * This function returns the last error reported.
	 *
	 * @access public
	 * @return string                            the error message
	 */
	public function get_error() {
		return $this->error;
	}

	/**
	 * This function rollbacks a transaction.
	 *
	 * @access public
	 * @abstract
	 * @throws Kohana_SQL_Exception             indicates that the executed statement failed
	 */
	public abstract function rollback();

	/**
	 * This function commits a transaction.
	 *
	 * @access public
	 * @abstract
	 * @throws Kohana_SQL_Exception             indicates that the executed statement failed
	 */
	public abstract function commit();

	/**
	 * This function escapes a string to be used in an SQL statement.
	 *
	 * @access public
	 * @abstract
	 * @param string $string                    the string to be escaped
	 * @param char $escape                      the escape character
	 * @return string                           the quoted string
	 */
	public abstract function quote($string, $escape = NULL);

	/**
	 * This function allows for the ability to close the connection that was opened.
	 *
	 * @access public
	 * @abstract
	 * @return boolean                          whether an open connection was closed
	 */
	public abstract function close();

	/**
	 * This destructor will ensure that the connection is closed.
	 *
	 * @access public
	 * @abstract
	 */
	public abstract function __destruct();

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * This variable stores an array of serialized class objects, which is
	 * used when type casting a result set.
	 *
	 * @access protected
	 * @var array
	 */
	protected static $cached_objects = array();

	/**
	 * This function returns a connection to the appropriate database based
	 * on the specified configurations.
	 *
	 * @access public
	 * @static
	 * @param mixed $config                     the data source configurations
	 * @return DB_Connection                    the database connection
	 */
	public static function factory($config = array()) {
		$source = new DB_DataSource($config);
		$driver = 'DB_' . $source->dialect . '_Connection_' . $source->driver;
		$connection = new $driver($source);
		return $connection;
	}

	/**
	 * This function type casts an associated array to the declared return type.
	 *
	 * @access protected
	 * @static
	 * @param string $type						the return type to be used
	 * @param array $record						the record to be casted
	 * @return mixed                            the casted record
	 *
	 * @see http://www.richardcastera.com/blog/php-convert-array-to-object-with-stdclass
	 * @see http://codeigniter.com/forums/viewthread/103493/
	 */
	protected static function type_cast($type, Array $record) {
		switch ($type) {
			case 'array':
				return $record;
			break;
			case 'object':
				return (object) $record;
			break;
			default:
				if ( ! isset(self::$cached_objects[$type])) {
					$object = new $type();
					self::$cached_objects[$type] = serialize($object);
				}
				else {
					$object = unserialize( (string) self::$cached_objects[$type]);
				}
				foreach ($record as $key => $value) {
					$object->{$key} = $value;
				}
				return $object;
			break;
		}
	}

}
?>