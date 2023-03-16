<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\Profile]
class Follow{
	#[\app\filters\JustLeave]
	public function index(){
		//nothing to do here
	}

	//ownership of data is ensured by use of $_SESSION['user_id']
	public function follow($followed_id){
		$follow = new \app\models\Follow();
		$follow->followed = $followed_id;
		$follow->follower = $_SESSION['user_id'];
		$follow->insert();
		header('location:/Profile/details/' . $followed_id);
	}

	//ownership of data is ensured by use of $_SESSION['user_id']
	public function unfollow($followed_id){
		$follow = new \app\models\Follow();
		$follow->delete($_SESSION['user_id'], $followed_id);
		header('location:/Profile/details/' . $followed_id);
	}
}