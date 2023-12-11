<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_403 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 403 Forbidden
	 */
	protected $_code = 403;

}