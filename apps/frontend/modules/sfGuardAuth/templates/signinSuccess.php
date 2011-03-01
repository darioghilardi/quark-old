<?php use_helper('I18N') ?>
<div id="signinSuccess">
  <div id="signin-form-content" class="col-18">
    <h1 id="page-title"><?php echo __('Signin', null, 'sf_guard') ?></h1>
      <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
  </div>
  
  <div id="sidebar" class="col-6">
  <?php include_partial('question/question_block', array('title' => 'Collabora', 'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')) ?>
  </div>
  
</div>
