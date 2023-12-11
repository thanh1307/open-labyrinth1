<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

/**
 * URLENC Request Data Parser class for text/plain mime-type.
 *
 * @package		RESTful
 * @category	Parsers
 * @author		Michał Musiał
 * @copyright	(c) 2011 Michał Musiał
 */
class RESTful_Request_Parser_URLENC implements RESTful_Request_IParser
{
	/**
	 * @param	string $data
	 * @return	array
	 */
	static public function parse($request_body)
	{
		$data = array();
		parse_str($request_body, $data);
		return $data;
	}
}
