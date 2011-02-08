<?php use_helper('I18N') ?>
<div id="signinSuccess">
  <div id="signing-form" class="col-16">
    <div>
      <h1><?php echo __('Signin', null, 'sf_guard') ?></h1>
      <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
    </div>
    
  </div>
  
  <div id="signing-sidebar" class="col-8">
    <div>
	    <h4>How to register</h4>
	    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using </p>
    </div>
  </div>
  
</div>
