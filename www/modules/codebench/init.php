<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

// Catch-all route for Codebench classes to run
Route::set('codebench', 'codebench(/<class>)')
	->defaults(array(
		'controller' => 'codebench',
		'action' => 'index',
		'class' => NULL));
