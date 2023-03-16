<?php
namespace app\filters;

#[\Attribute]
class Profile extends \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/Profile/create?message=You must now create your profile to access social functionality.');
			return true;
		}
		$profile = new \app\models\Profile();
		$profile = $profile->get($_SESSION['user_id']);
		if($profile==null){
			header('location:/Profile/create?message=You must now create your profile to access social functionality.');
			return true;
		}
		return false;
	}
}
?>