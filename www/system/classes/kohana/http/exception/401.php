<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_401 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 401 Unauthorized
	 */
	protected $_code = 401;

}