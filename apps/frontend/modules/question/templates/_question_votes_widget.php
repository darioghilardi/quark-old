<?php use_helper('Token') ?>

<div class="up-vote">
  <a class="button-up" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=up&token='.generateToken($sf_user));?>">Up</a>
</div>

<div class="count"><?php echo $question->getInterestedUsers() ?></div>

<div class="down-vote">
  <a class="button-down" href="<?php echo url_for('question/vote?id='.$question->getId().'&type=down&token='.generateToken($sf_user));?>">Down</a>
</div>