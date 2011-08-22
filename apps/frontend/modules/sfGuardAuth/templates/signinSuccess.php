<?php use_helper('I18N') ?>
<div id="signinSuccess">
  <div id="signin-form-content" class="col-18">
    <h1 id="page-title"><?php echo __('Signin', null, 'sf_guard') ?></h1>
      <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
  </div>
</div>
