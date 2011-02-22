<?php foreach ($pager->getResults() as $user): ?>

<div class="item boxleft">
	<div class="user-avatar boxleft"></div>
	
	<div class="user-username boxleft">
	  <?php echo link_to($user->getUsername(), 'user/show?username=' . $user->getUsername()) ?>
  </div>	
	<div class="user-points boxleft">
    <span class="boxleft"><?php echo rand(99,299); ?>K</span>
    <span class="boxleft"><?php echo rand(1,99); ?></span>
    <span class="boxleft"><?php echo rand(1,99); ?></span>
    
	</div>
  


</div>
<?php endforeach; ?>

<div class="clearfix"></div>

<div id="pagination">
  <?php include_partial('user/user_pager', array('pager' => $pager)) ?>
</div>