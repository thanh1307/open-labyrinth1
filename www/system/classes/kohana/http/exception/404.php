<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_404 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 404 Not Found
	 */
	protected $_code = 404;

}