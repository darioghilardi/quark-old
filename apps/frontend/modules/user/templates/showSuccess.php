<?php slot('title', sprintf('%s', $user->getUsername())); ?>
<?php use_helper('Text') ?>

<div id="showSuccess">
	<?php print_r($user->getFirst_name());?>
	<?php print_r($user->getLast_name());?>
	<?php print_r($user->getUsername());?>
</div>