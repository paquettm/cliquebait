<div class='jumbotron' id='publication<?=$data->publication_id?>'>
	<hr>
	<?php $profile=$data->getProfile(); ?>
	<a href="/Publication/details/<?=$data->publication_id?>"><img src="/images/<?= $data->picture ?>"></a>
	<p>Posted by <?php $this->view('Profile/link',$profile) ?> on <?= $data->date_time?><?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->profile_id){
			echo "<a href='/Publication/delete/$data->publication_id'><i class='bi-trash'></i></a>";
			echo "<a href='/Publication/edit/$data->publication_id'><i class='bi-pen'></i></a>";
		}
	?></p>
	<p><?=htmlspecialchars($data->caption) ?></p>
	

</div>
