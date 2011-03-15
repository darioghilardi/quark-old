<?php use_helper('Gravatar') ?>
<?php slot('sf_apply_login') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php end_slot() ?>
<?php use_helper("I18N") ?>


<div id="settingsSuccess">
  <div id="apply-content" class="col-24">
    <div id="global-content">
      <h1 id="page-title"><?php echo link_to($sf_user->getGuardUser()->getUsername(),'@user_profile?username=' . $sf_user->getGuardUser()->getUsername()) ?> &rsaquo; Edit Profile</h1>

      <ul id="options-user-info" class="nonespace nonelist clearfix fullwidth boxleft">
        <li class="boxleft first"><?php echo link_to('Edit own profile', '@settings');?></li>
        <li class="boxleft"><?php echo link_to('Change password', '@reset');?></li>
        <li class="boxleft last"><?php echo gravatar_profile($sf_user->getGuardUser()->getEmail_address(), 'Edit Gravatar')?></li>
      </ul>

      <form method="post" action="<?php echo url_for("sfApply/settings") ?>" name="sf_apply_settings_form" id="sf_apply_settings_form" class="col-18">
          <?php echo $form->renderGlobalErrors() ?>
          <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['firstname'],'class'=>'firstname')) ?>
          <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['lastname'],'class'=>'lastname')) ?>
          <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['age'],'class'=>'age')) ?>
          <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['location'],'class'=>'location')) ?>
          <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['website'],'class'=>'website')) ?>
          <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['biography'],'class'=>'biography')) ?>
                 
          <div class="clearfix"></div>
          
          <span id ="submit-apply" class="save boxright">
            <input type="submit" value="<?php echo __("Save", array(), 'sfForkedApply') ?>" />
          </span>
          
          <span id ="backtolist-apply" class="backto boxleftt">
            &larr;  <?php echo link_to(__('Cancel', array(), 'sfForkedApply'), sfConfig::get('app_sfApplyPlugin_after', '@homepage')) ?>
          </span>
          
          <?php echo $form['_csrf_token'] ?>
 
</form>

<form method="GET" action="<?php echo url_for("sfApply/resetRequest") ?>" name="sf_apply_reset_request" id="sf_apply_reset_request" class="notice col-18">

  <?php echo __('Click the button below to change your password.', array(), 'sfForkedApply'); ?>

  <?php
	$confirmation = sfConfig::get( 'app_sfForkedApply_confirmation' );
	if( $confirmation['reset_logged'] ): ?>
	<p class="notice">
  	<?php echo __('For security reasons, you will receive a confirmation email containing a link allowing you to complete the password change.', array(), 'sfForkedApply') ?>
	</p>
	<?php endif; ?>

  <span id ="submit-apply" class="save boxright">
    <input type="submit" value="<?php echo __("Reset Password", array(), 'sfForkedApply') ?>" />
  </span>

</form>

    </div>
  </div>
</div>