<?php use_helper('Gravatar') ?>

<ul id="primary-menu" class="nonelist nonespace boxright txtright">
  <?php if((empty($notloginlink))): ?>
	  <li class="boxright login-item">
	    <?php if ($sf_user->isAuthenticated()): ?> Welcome <?php echo gravatar($sf_user->getGuardUser()->getEmail_address(), 13);?><?php echo link_to($sf_user->getGuardUser()->getUsername(), 'user/show?username=' . $sf_user->getGuardUser()->getUsername()) ?> - <?php echo link_to('Logout', 'sf_guard_signout') ?>
	    <?php else: ?>
	      <a href="<?php echo url_for('sf_guard_signin') ?>">Login</a>
	      or 
	      <a href="<?php echo url_for('sfApply/apply') ?>">Register</a>
	    <?php endif;?>
	  </li>
  <?php endif;?>
  
  <li class="boxright menu-item"><?php echo link_to('Faq', 'static/show?path=faq') ?></li>
  <li class="boxright menu-item"><?php echo link_to('About', 'static/show?path=about') ?></li>
  <li class="boxright menu-item"><?php echo link_to('Home', '@homepage') ?></li>
</ul>
