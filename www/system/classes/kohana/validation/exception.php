<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');
/**
 * @package    Kohana
 * @category   Exceptions
 * @author     Kohana Team
 * @copyright  (c) 2009-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Validation_Exception extends Kohana_Exception {

	/**
	 * @var  object  Validation instance
	 */
	public $array;

	/**
	 * @param  Validation  Validation object
	 * @param  string    error message
	 * @param  array     translation variables
	 * @param  int       the exception code
	 */
	public function __construct(Validation $array, $message = 'Failed to validate array', array $values = NULL, $code = 0)
	{
		$this->array = $array;

		parent::__construct($message, $values, $code);
	}

} // End Kohana_Validation_Exception
