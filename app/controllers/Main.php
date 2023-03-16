<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
		//To see interesting publications, as a person or user, I can see a list of all publications, most recent first.
		$publication = new \app\models\Publication();
		$publications = $publication->getAll();
		$this->view('Main/index', $publications);
	}

	public function search(){
		//To find interesting publications, as a person or user, I can search for captions by search terms.
		$publication = new \app\models\Publication();
		$publications = $publication->search($_GET['search_term']);
		$this->view('Main/index', $publications);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function follow(){
		$publication = new \app\models\Publication();
		$publications = $publication->getFollowedPublications($_SESSION['user_id']);
		$this->view('Main/index', $publications);
	}

}