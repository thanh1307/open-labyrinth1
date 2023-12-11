<?php

require_once '../src/twitter.class.php';

// ENTER HERE YOUR CREDENTIALS (see readme.txt)
$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

try {
	$tweet = $twitter->send('Tôi ổn'); // you can add $imagePath as second argument

} catch (TwitterException $e) {
	echo 'Lỗi: ' . $e->getMessage();
}
