<?php use_helper('Token') ?>

<div class="up-vote">
<?php if($up == "up"): ?>
  <a class="button-up" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php elseif($up == "undo"): ?>
  <a class="button-up" href="<?php echo url_for('question/undovote?id='.$question->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php elseif($up == 'anonymous'): ?>
  <a class="button-up" title="Please register to vote">Up</a>
<?php else: ?>
  <a class="button-up" title="You don't have enough reputation to vote up (<?php print sfConfig::get('app_vote_up') ?> points needed)">Up</a>
<?php endif; ?>
</div>

<div class="count"><?php echo $question->getInterestedUsers() ?></div>

<div class="down-vote">
<?php if($down == "down"): ?>
  <a class="button-down" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php elseif($down == "undo"): ?>
  <a class="button-down" href="<?php echo url_for('question/undovote?id='.$question->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php elseif($down == 'anonymous'): ?>
  <a class="button-up" title="Please register to vote">Up</a>
<?php else: ?>
  <a class="button-up" title="You don't have enough reputation to vote down (<?php print sfConfig::get('app_vote_down') ?> points needed)">Down</a>
<?php endif; ?>
</div>