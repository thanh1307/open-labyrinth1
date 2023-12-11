<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_408 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 408 Request Timeout
	 */
	protected $_code = 408;

}