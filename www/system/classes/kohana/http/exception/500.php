<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_500 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 500 Internal Server Error
	 */
	protected $_code = 500;

}