<?php use_helper('I18N') ?>


<div id="applyResetRequestAfter">
  <div id="apply-content" class="col-18">
    <div id="global-content">
      <h1 id="page-title">Oops! Account not verified</h1>
      
      <p class="error">
				<?php echo __('
				That account was never verified. You must verify the account before you can log in or, if
				necessary, reset the password. We have resent your verification email, which contains
				instructions to verify your account. If you do not see that email, please be sure to check 
				your "spam" or "bulk" folder.', array(), 'sfForkedApply') ?>
      </p>
        
      <?php include_partial('sfApply/continue') ?>
    </div>
  </div>
</div>
