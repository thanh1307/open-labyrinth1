<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_411 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 411 Length Required
	 */
	protected $_code = 411;

}