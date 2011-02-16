<?php use_helper('Token') ?>

<div class="up-vote">
<?php if($up): ?>
  <a class="button-up" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php elseif($up == "clear"): ?>
  <a class="button-up" href="<?php echo url_for('question/undovote?id='.$question->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php else: ?>
  Up
<?php endif; ?>
</div>

<div class="count"><?php echo $question->getInterestedUsers() ?></div>

<div class="down-vote">
<?php if($down): ?>
  <a class="button-down" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php elseif($up == "clear"): ?>
  <a class="button-down" href="<?php echo url_for('question/undovote?id='.$question->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php else: ?>
  Down
<?php endif; ?>
</div>