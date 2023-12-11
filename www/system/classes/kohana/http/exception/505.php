<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_505 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 505 HTTP Version Not Supported
	 */
	protected $_code = 505;

}