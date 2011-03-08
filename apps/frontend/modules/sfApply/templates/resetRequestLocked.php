<?php use_helper('I18N') ?>
<?php slot('sf_apply_login') ?>
<?php end_slot() ?>

<div id="applyResetRequestAfter">
  <div id="apply-content" class="col-18">
    <div id="global-content">
      <h1 id="page-title">Oops! Inactive account</h1>
      
      <p class="error">
        <?php echo __('This account is inactive. Please contact the administrator', array(), 'sfForkedApply') ?>
      </p>
        
      <?php include_partial('sfApply/continue') ?>
    </div>
  </div>
</div>
