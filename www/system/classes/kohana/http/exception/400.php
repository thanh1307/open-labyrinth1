<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_400 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 400 Bad Request
	 */
	protected $_code = 400;

}