<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_413 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 413 Request Entity Too Large
	 */
	protected $_code = 413;

}