
<?php 
  if($this->session->flashdata('errors'))
  {
?>
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="container">
    <div class="row">
<?php
    foreach($this->session->flashdata('errors') as $value)
    { 
?>
      <p><?= $value ?></p>
<?php   
	}
?>
    </div>
    </div>
    </div>
<?php
  } 
?>


<?php 
  if($this->session->flashdata('success'))
  {
?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="container">
    <div class="row">
<?php
    foreach($this->session->flashdata('success') as $value)
    { 
?>
      <?= $value ?>
<?php
    }
?>
    </div>
    </div>
    </div>
<?php
  } 
?>
