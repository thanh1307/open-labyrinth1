<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_414 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 414 Request-URI Too Long
	 */
	protected $_code = 414;

}