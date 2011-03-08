<?php use_helper('I18N') ?>

<div id="applyResetRequestAfter">
  <div id="apply-content" class="col-18">
    <div id="global-content">
      <h1 id="page-title">Oops! Error during delivery email</h1>

      <p class="error">
				<?php echo __('
				An error took place during the email delivery process. Please try
				again later.
				', array(), 'sfForkedApply') ?>
      </p>
        
      <?php include_partial('sfApply/continue') ?>
    </div>
  </div>
</div>

