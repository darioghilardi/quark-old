<?php foreach ($pager->getResults() as $user): ?>
<div class="item boxleft">
  <?php echo $user->getId();?>
  <?php echo $user->getUsername();?>
  <?php echo $user->getFirst_name();?>
</div>
<?php endforeach; ?>

<div id="pagination">
  <?php include_partial('user/user_pager', array('pager' => $pager)) ?>
</div>