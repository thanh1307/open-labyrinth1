<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_503 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 503 Service Unavailable
	 */
	protected $_code = 503;

}