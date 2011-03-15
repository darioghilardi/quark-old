<?php use_helper('Gravatar') ?>
<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php slot('sf_apply_login') ?><?php end_slot() ?>

<div id="applyResetLogged">
  <div id="apply-content" class="col-24">
    <div id="global-content">
      <h1 id="page-title"><?php echo link_to($sf_user->getGuardUser()->getUsername(),'@user_profile?username=' . $sf_user->getGuardUser()->getUsername()) ?> &rsaquo; Change your password</h1>

      <ul id="options-user-info" class="nonespace nonelist clearfix fullwidth boxleft">
        <li class="boxleft first"><?php echo link_to('Edit own profile', '@settings');?></li>
        <li class="boxleft"><?php echo link_to('Change password', '@reset');?></li>
        <li class="boxleft last"><?php echo gravatar_profile($sf_user->getGuardUser()->getEmail_address(), 'Edit Gravatar')?></li>
      </ul>
      <div class="clearfix"></div>

			<p class="info">
			  <?php echo __('You may change your password using the form below.', array(), 'sfForkedApply') ?>
			</p>
			
      <form method="post" action="<?php echo url_for("sfApply/reset") ?>" name="sf_apply_reset_form" id="sf_apply_reset_form" class="col-18">
        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['password'],'class'=>'password')) ?>
        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['password2'],'class'=>'password2')) ?>
        <div class="clearfix"></div>
        <span id ="submit-apply" class="save boxright">
          <input type="submit" value="<?php echo __("Reset My Password", array(), 'sfForkedApply') ?>">
        </span>

        <span id ="backtolist-apply" class="backto boxleftt">
          &larr;  <?php echo link_to(__('Cancel'), 'sfApply/resetCancel') ?>
        </span>
        <?php echo $form['_csrf_token'] ?>
      </form>
     </div>
  </div>
</div>