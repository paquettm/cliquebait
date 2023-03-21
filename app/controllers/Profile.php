<?php
namespace app\controllers;

class Profile extends \app\core\Controller{
	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function index(){
		//To manage my online content, as a user, I can view my profile page.
		$profile = new \app\models\Profile();
		$profile = $profile->get($_SESSION['user_id']);
		$this->view('Profile/details', $profile);
	}

	public function details($user_id){
		//To find interesting publications, as a person or user, I can view other user profile pages.
		$profile = new \app\models\Profile();
		$profile = $profile->get($user_id);
		$this->view('Profile/details', $profile);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function edit(){
		//To manage my profile, as a user, I can edit my profile information.
		$profile = new \app\models\Profile();
		$profile = $profile->get($_SESSION['user_id']);
		if(isset($_POST['action'])){
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->update();
			header('location:/Profile/index');
		}else{
			$this->view('Profile/edit', $profile);
		}

	}

	#[\app\filters\Login]
	public function create(){
		if(isset($_POST['action'])){
			$profile = new \app\models\Profile();
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->user_id = $_SESSION['user_id'];
			$profile->insert();
			header('location:/Profile/index');
		}else{
			$this->view('Profile/create');
		}
	}
}