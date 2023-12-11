<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Kohana_HTTP_Exception_416 extends HTTP_Exception {

	/**
	 * @var   integer    HTTP 416 Request Range Not Satisfiable
	 */
	protected $_code = 416;

}