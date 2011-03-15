<?php use_helper('Token') ?>

<?php if($up == "up"): ?>
<div class="up-vote">
  <a class="button-up logged" href="<?php echo url_for('answer/vote?id='.$answer->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php elseif($up == "undo"): ?>
<div class="up-undovote">
  <a class="button-up logged" href="<?php echo url_for('answer/undovote?id='.$answer->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
<?php elseif($up == 'anonymous'): ?>
<div class="up-none-vote">
  <a class="button-up anonymous" title="Please register to vote">Up</a>
<?php else: ?>
<div class="up-none-vote">
  <a class="button-up anonymous" title="You don't have enough reputation to vote up (<?php print sfConfig::get('app_vote_up') ?> points needed)">Up</a>
<?php endif; ?>
</div>

<div class="count"><?php echo $answer->getVotes() ?></div>

<?php if($down == "down"): ?>
<div class="down-vote">
  <a class="button-down" href="<?php echo url_for('answer/vote?id='.$answer->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php elseif($down == "undo"): ?>
<div class="down-undovote">
  <a class="button-down" href="<?php echo url_for('answer/undovote?id='.$answer->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
<?php elseif($down == 'anonymous'): ?>
<div class="down-none-vote">
  <a class="button-down" title="Please register to vote">Down</a>
<?php else: ?>
<div class="down-none-vote">
  <a class="button-down" title="You don't have enough reputation to vote down (<?php print sfConfig::get('app_vote_down') ?> points needed)">Down</a>
<?php endif; ?>
</div>