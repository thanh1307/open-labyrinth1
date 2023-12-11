<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_502 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 502 Bad Gateway
	 */
	protected $_code = 502;

}