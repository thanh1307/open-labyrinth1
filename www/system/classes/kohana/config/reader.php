<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

/**
 * Interface for config readers
 *
 * @package    Kohana
 * @category   Configuration
 * @author     Kohana Team
 * @copyright  (c) 2008-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface Kohana_Config_Reader extends Kohana_Config_Source
{
	
	/**
	 * Tries to load the specificed configuration group
	 *
	 * Returns FALSE if group does not exist or an array if it does
	 *
	 * @param  string $group Configuration group
	 * @return boolean|array
	 */
	public function load($group);
	
}
