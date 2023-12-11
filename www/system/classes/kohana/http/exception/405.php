<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_405 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 405 Method Not Allowed
	 */
	protected $_code = 405;

}