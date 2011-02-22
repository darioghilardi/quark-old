<?php 
/*
 * <?php echo link_to('Users', '@sf_guard_user') ?>/
 * <?php echo $sf_user->getGuardUser()->getId(); ?>
 * 
**/
?>

<ul id="primary-menu" class="nonelist nonespace boxright txtright">
        <li class="boxright login-item">
            <?php if((empty($notloginlink))): ?>
	            <?php if ($sf_user->isAuthenticated()): ?> Welcome <?php echo link_to($sf_user, 'user/show?username=' . $sf_user->getGuardUser()->getUsername()) ?> - <?php echo link_to('Logout', 'sf_guard_signout') ?>
	            
	            <?php else: ?>
	              <a href="<?php echo url_for('sf_guard_signin') ?>">Login</a>
	            <?php endif;?>
            <?php endif;?>
        </li>

        <li class="boxright menu-item"><a href="">Home</a></li>
        <li class="boxright menu-item"><a href="">About</a></li>
        <li class="boxright menu-item"><a href="">Blabla</a></li>
      </ul>
