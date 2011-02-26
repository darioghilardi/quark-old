<?php use_helper('Token') ?>

<?php if ($accepted == 'static'): ?>
  Accepted
<?php elseif ($accepted == 'link'): ?>
  <a href="<?php echo url_for('answer/accept?id='.$answer->getId().'&token='.generateToken($sf_user)); ?>">Accept Link</a>
<?php endif; ?>