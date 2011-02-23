<?php use_helper('Gravatar') ?>

<span class="time"><?php print rand(0,20); ?>
<?php (rand(0,1)==1) ? print 'h' : print 'min';?> ago</span> by <span class="user"><a href=""><?php (rand(0,1)==1) ? print 'kiuz' : print 'Ingo';?></a></span> <span class="points"><?php print rand(299,2000); ?></span>
