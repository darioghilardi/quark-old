<span class="time"><?php print rand(0,20); ?>
  <?php (rand(0,1)==1) ? print 'h' : print 'min';?> ago</span> by
  
  <?php include_component('user', 'WidgetUserInfo', array('id' => $user_id,'size_avatar'=>13)) ?>
</span>
