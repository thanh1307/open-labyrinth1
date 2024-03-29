<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');
/**
 * STDERR log writer. Writes out messages to STDERR.
 *
 * @package    Kohana
 * @category   Logging
 * @author     Kohana Team
 * @copyright  (c) 2008-2011 Kohana Team
 * @license    http://kohanaphp.com/license
 */
class Kohana_Log_StdErr extends Log_Writer {
	/**
	 * Writes each of the messages to STDERR.
	 *
	 *     $writer->write($messages);
	 *
	 * @param   array   messages
	 * @return  void
	 */
	public function write(array $messages)
	{
		// Set the log line format
		$format = 'time --- type: body';

		foreach ($messages as $message)
		{
			// Writes out each message
			fwrite(STDERR, PHP_EOL.strtr($format, $message));
		}
	}
} // End Kohana_Log_StdErr
