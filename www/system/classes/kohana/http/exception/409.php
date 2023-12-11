<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_409 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 409 Conflict
	 */
	protected $_code = 409;

}