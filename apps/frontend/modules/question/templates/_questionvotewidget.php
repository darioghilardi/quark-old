<?php use_helper('Token') ?>

<?php if($up): ?>
<div class="up-vote">
  <a class="button-up" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
</div>
<?php else: ?>
<div class="up-vote">
  <a class="button-up" href="<?php echo url_for('question/undovote?id='.$question->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
</div>
<?php endif; ?>

<div class="count"><?php echo $question->getInterestedUsers() ?></div>

<?php if($down): ?>
<div class="down-vote">
  <a class="button-down" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
</div>
<?php else: ?>
<div class="down-vote">
  <a class="button-down" href="<?php echo url_for('question/undovote?id='.$question->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
</div>
<?php endif; ?>