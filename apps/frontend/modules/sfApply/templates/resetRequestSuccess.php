<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php slot('sf_apply_login') ?>
<?php end_slot() ?>

<div id="applyResetRequest">
  <div id="apply-content" class="col-18">
    <div id="global-content">
      <h1 id="page-title">Request new password</h1>
      
      
			<form method="POST" action="<?php echo url_for('sfApply/resetRequest') ?>" name="sf_apply_reset_request" id="sf_apply_reset_request">
			<p class="info">
			<?php echo __('Forgot your username or password? No problem! Just enter your username <strong>or</strong>
			your email address and click "Reset My Password." You will receive an email message containing both your username and
			a link permitting you to change your password if you wish.', array(), 'sfForkedApply') ?>
			</p>
			
			<?php //echo $form ?>
			<?php echo $form->renderGlobalErrors() ?>
      <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['username_or_email'],'class'=>'username_or_email')) ?>
      
      <span id ="submit-apply" class="save boxright">
			    <input type="submit" value="<?php echo __("Reset My Password", array(), 'sfForkedApply') ?>">
			</span>
			
			<span id ="backtolist-apply" class="backto boxleftt">
        &larr;  <?php echo link_to(__('Cancel', array(), 'sfForkedApply'), sfConfig::get('app_sfApplyPlugin_after', '@homepage')) ?>
			</span>
			<?php echo $form['_csrf_token'] ?>
			</form>
      
    </div>
  </div>
</div>