<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');
/**
 * UTF8::strlen
 *
 * @package    Kohana
 * @author     Kohana Team
 * @copyright  (c) 2007-2011 Kohana Team
 * @copyright  (c) 2005 Harry Fuecks
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
 */
function _strlen($str)
{
	if (UTF8::is_ascii($str))
		return strlen($str);

	return strlen(utf8_decode($str));
}