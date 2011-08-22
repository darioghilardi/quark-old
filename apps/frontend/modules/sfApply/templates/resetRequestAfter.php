<?php use_helper('I18N') ?>
<?php slot('sf_apply_login') ?>
<?php end_slot() ?>

<div id="applyResetRequestAfter">
  <div id="apply-content" class="col-18">
    <div id="global-content">
      <h1 id="page-title">Okay! New password request succesful</h1>
      
      <p class="success">
				<?php echo __('
				For security reasons, a confirmation message has been sent to
				the email address associated with this account. Please check your
				email for that message. You will need to click on a link provided
				in that email in order to change your password. If you do not see
				the message, be sure to check your "spam" and "bulk" email folders.
				<br />
				We apologize for the inconvenience.', array(), 'sfForkedApply') ?>
				</p>
				
				<?php include_partial('sfApply/continue') ?>
    </div>
  </div>
</div>
