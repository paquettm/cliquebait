<?php $this->view('header', 'cliquebait'); ?>

<h1><?=$data ?></h1>
<?php
if(isset($_SESSION['user_id'])){
	if(!$data->getFollowBy($_SESSION['user_id'])){ ?>
	<a href="/Follow/follow/<?= $data->user_id ?>">Follow <?=$data ?></a><br>
<?php  }else{ ?>
	<a href="/Follow/unfollow/<?= $data->user_id ?>">Unfollow <?=$data ?></a><br>
<?php
	}
	if($_SESSION['user_id'] == $data->user_id){
		echo '<a href="/Profile/edit">Edit my profile</a>';
	}
}
?>

<h2>Publications by <?=$data ?></h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<h2><?=$data ?> is followed by:</h2>
<ul><?php
$followers = $data->getFollowers();
foreach ($followers as $follower) {
	echo '<li>';
	$this->view('Profile/link', $follower);
	echo '</li>';
}
?>
</ul>
<?php $this->view('footer'); ?>