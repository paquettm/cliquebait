<?php $this->view('header', 'cliquebait'); ?>

<p>Check out these publications:</p>

<?php
foreach ($data as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('footer'); ?>