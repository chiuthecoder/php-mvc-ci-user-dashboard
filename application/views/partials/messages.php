

<?php
	if($this->session->flashdata('success'))
	{
?>	
		<div class="alert alert-success alert-dismissible" role="alert">
		<div class="container">
		<div class="row">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Congratulations!</strong> <?= $this->session->flashdata('success'); ?>
		</div>
		</div>
		</div>
<?php
	}
?>


<?php 
 if($this->session->flashdata("error")) 
 {
?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		<div class="container">
		<div class="row">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?= $this->session->flashdata("error"); ?>
		</div>
		</div>
		</div>
<?php
 }
?>

