<?php use_helper('I18N') ?>

<div id="applyResetRequestAfter">
  <div id="apply-content" class="col-18">
    <div id="global-content">
      <h1 id="page-title">Oops! No such user</h1>
      
      <p class="error">
        <?php echo __('Sorry, there is no user with that username or email address.', array(), 'sfForkedApply') ?>
      </p>
        
      <?php include_partial('sfApply/continue') ?>
    </div>
  </div>
</div>
