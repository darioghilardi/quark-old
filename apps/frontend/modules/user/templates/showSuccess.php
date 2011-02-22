<?php slot('title', sprintf('%s', $user->getUsername())); ?>
<?php use_helper('Text') ?>

<div id="showSuccess">
	<?php print_r($user->getFirst_name());?>
	<?php print_r($user->getLast_name());?>
	<?php print_r($user->getUsername());?>
	
	
	
	<div id="user-single-content" class="col-18">
	  <h1 id="page-title"><?php echo $user->getUsername(); ?></h1>
	  
	</div>
	    
	<div id="sidebar" class="col-6">
	</div>

</div>