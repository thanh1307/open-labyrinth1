<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');
/**
 * @package    Kohana
 * @category   Exceptions
 * @author     Kohana Team
 * @copyright  (c) 2009-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Session_Exception extends Kohana_Exception {
	const SESSION_CORRUPT = 1;
}