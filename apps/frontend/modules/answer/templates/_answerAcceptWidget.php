<?php use_helper('Token') ?>

<?php if ($accepted == 'static'): ?>
<div class="accepted answer">
  Accepted
</div>
<?php elseif ($accepted == 'link'): ?>
<div class="accept answer">
  <a href="<?php echo url_for('answer/accept?id='.$answer->getId().'&token='.generateToken($sf_user)); ?>">Accept Link</a>
</div>
<?php endif; ?>