<?php use_helper('Gravatar') ?>

<span class="user">
  <?php echo link_to(gravatar($user->getEmail_address(), $size_avatar), 'user/show?username=' . $user->getUsername()) ?>
  <?php echo link_to($user->getUsername(), 'user/show?username=' . $user->getUsername()) ?>
</span>
<span class="points"><?php print rand(299,2000); ?>

