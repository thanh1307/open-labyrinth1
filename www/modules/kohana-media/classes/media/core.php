<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Media_Core {

	public static function url($filepath)
	{
		return Route::url('media', array(
			'filepath' => $filepath,
			'uid'      => Kohana::$config->load('media')->uid,
		));
	}

	public static function uri($filepath)
	{
		return Route::get('media')->uri(array(
			'filepath' => $filepath,
			'uid'      => Kohana::$config->load('media')->uid,
		));
	}
}