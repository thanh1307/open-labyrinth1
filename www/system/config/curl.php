<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

return array(
	CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; Kohana v'.Kohana::VERSION.' +http://kohanaframework.org/)',
	CURLOPT_CONNECTTIMEOUT => 5,
	CURLOPT_TIMEOUT        => 5,
	CURLOPT_HEADER         => FALSE,
);