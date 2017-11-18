<?php 
session_start();
require 'vendor/autoload.php';
$creds = file_get_contents('creds.json');
$creds = json_decode($creds);
define('APPID',$creds->app_id);
define('APPSECRET',$creds->app_secret);
define('BASEURL','http://windows.dev/www/fb/');
define('PAGEID','153401821939505');
define('TOKENPATH','token.json');

$fb = new Facebook\Facebook([
  'app_id' => APPID, // Replace {app-id} with your app id
  'app_secret' => APPSECRET,
  'default_graph_version' => 'v2.11',
]);