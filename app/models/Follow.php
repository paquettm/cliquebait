<?php
namespace app\models;

class Follow extends \app\core\Model{

	public function getAll(){
		$SQL = "SELECT * FROM follow";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		return $STMT->fetchAll();
	}

	public function getFollowedByProfileId($follower){
		$SQL = "SELECT * FROM follow WHERE follower=:follower";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['follower'=>$follower]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		return $STMT->fetchAll();
	}

	public function getFollowersByProfileId($followed){
		$SQL = "SELECT * FROM follow WHERE followed=:followed";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['followed'=>$followed]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		return $STMT->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT IGNORE INTO follow(follower, followed) VALUES (:follower, :followed)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['follower'=>$this->follower,
						'followed'=>$this->followed]);
		return $STMT->rowCount();
	}

	public function delete($follower, $followed){
		$SQL = "DELETE FROM follow WHERE follower=:follower AND followed=:followed";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['follower'=>$follower,
						'followed'=>$followed]);
	}

	public function getFollow($follower, $followed){
		$SQL = "SELECT * FROM follow WHERE follower=:follower AND followed=:followed";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['follower'=>$follower,
						'followed'=>$followed]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		return $STMT->fetch();

	}	
}