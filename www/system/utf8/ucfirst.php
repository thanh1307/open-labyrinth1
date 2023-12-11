<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');
/**
 * UTF8::ucfirst
 *
 * @package    Kohana
 * @author     Kohana Team
 * @copyright  (c) 2007-2011 Kohana Team
 * @copyright  (c) 2005 Harry Fuecks
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
 */
function _ucfirst($str)
{
	if (UTF8::is_ascii($str))
		return ucfirst($str);

	preg_match('/^(.?)(.*)$/us', $str, $matches);
	return UTF8::strtoupper($matches[1]).$matches[2];
}