<?php use_helper('Token') ?>

<div class="up-vote">
<?php if($up == "up"): ?>
  <a class="button-up" href="<?php echo url_for('answer/vote?id='.$answer->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php elseif($up == "undo"): ?>
  <a class="button-up" href="<?php echo url_for('answer/undovote?id='.$answer->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php else: ?>
  Up
<?php endif; ?>
</div>

<div class="count"><?php echo $answer->getVotes() ?></div>

<div class="down-vote">
<?php if($down == "down"): ?>
  <a class="button-down" href="<?php echo url_for('answer/vote?id='.$answer->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php elseif($down == "undo"): ?>
  <a class="button-down" href="<?php echo url_for('answer/undovote?id='.$answer->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php else: ?>
  Down
<?php endif; ?>
</div>