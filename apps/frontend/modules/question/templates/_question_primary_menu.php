<?php use_helper('Gravatar') ?>

<ul id="primary-menu" class="nonelist nonespace boxright txtright">
  <li class="boxright login-item">
    <?php if((empty($notloginlink))): ?>
    <?php if ($sf_user->isAuthenticated()): ?> Welcome <?php echo gravatar($sf_user->getGuardUser()->getEmail_address(), 13);?><?php echo link_to($sf_user->getGuardUser()->getUsername(), 'user/show?username=' . $sf_user->getGuardUser()->getUsername()) ?> - <?php echo link_to('Logout', 'sf_guard_signout') ?>
    <?php else: ?>
      <a href="<?php echo url_for('sf_guard_signin') ?>">Login</a>
    <?php endif;?>
    <?php endif;?>
  </li>
  <li class="boxright menu-item"><?php echo link_to('Faq', '/faq') ?></li>
  <li class="boxright menu-item"><?php echo link_to('About', '/about') ?></li>
  <li class="boxright menu-item"><a href="/">Home</a></li>
</ul>
