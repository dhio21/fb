<?php 
require_once 'config.php';
$urls = [
	'http://www.planwallpaper.com/static/images/desktop-year-of-the-tiger-images-wallpaper.jpg',
	'https://zdnet3.cbsistatic.com/hub/i/r/2017/10/19/58167892-60ef-4eec-a43a-3e5cda4a7ea5/resize/370xauto/44143a11635e1f75ab8ec36318aaa16d/mongo-db-logo.png',
	'https://i.ytimg.com/vi/K4zm30yeHHE/maxresdefault.jpg',
	'https://media.playstation.com/is/image/SCEA/spider-man-listing-thumb-01-ps4-us-13jun16?$Icon$'
];
$session = file_get_contents(TOKENPATH);
$session = json_decode($session);
try{
	foreach ($urls as $key => $value) {
		$return[] = $fb->sendRequest('POST',$session->id.'/photos',['url'=>$value],$session->access_token);
	}
	//$return = $fb->sendRequest('POST',$session['id'].'/photos',['url'=>$url],$session['access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
foreach ($return as $key => $value) {
	echo $value->getBody();
}
//exit($return->getBody());/
