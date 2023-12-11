<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_412 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 412 Precondition Failed
	 */
	protected $_code = 412;

}