<?php 
require_once 'config.php';
// session_destroy();
if(isset($_SESSION['fb_access_token'])){
	$access_token = $_SESSION['fb_access_token'];
	if(!isset($_SESSION['sessions'])){
		$requestUserName = $fb->get('/me/accounts',$access_token);
		$data = $requestUserName->getDecodedBody();
		$sessions = [];
		foreach ($data['data'] as $key => $value) {
			if($value['id'] == PAGEID){
				$sessions = ['access_token'=>$value['access_token'],'id'=>$value['id']];
			}
		}
		if(empty($sessions)) exit('Unable to get Page details');
		file_put_contents(TOKENPATH, json_encode($sessions));

	}
	?>
	<a href="post.php">Post images</a>
	<?php
}else{
	require 'login.php';
}