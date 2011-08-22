<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form( $form ) ?>

<div id="applySuccess">
  <div id="apply-content" class="col-18">
    <div id="global-content">
      <h1 id="page-title"><?php echo __("Apply for an Account", array(), 'sfForkedApply') ?></h1>
      
				<form method="post" action="<?php echo url_for('sfApply/apply') ?>"name="sf_apply_apply_form" id="sf_apply_apply_form">
          
          <?php echo $form->renderGlobalErrors() ?>
          
          <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['username'],'class'=>'username')) ?>
	        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['password'],'class'=>'password')) ?>
	        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['password2'],'class'=>'password2')) ?>
	        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['firstname'],'class'=>'firstname')) ?>
	        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['lastname'],'class'=>'lastname')) ?>
	        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['email'],'class'=>'email')) ?>
	        <?php include_partial('sfApply/apply_item_form_register', array('item' => $form['email2'],'class'=>'email2')) ?>
          
          <div class="clearfix"></div>
          
          <span id ="submit-apply" class="save boxright">
				    <input type="submit" value="<?php echo __("Create My Account", array(), 'sfForkedApply') ?>" />
				  </span>
		      <span id ="backtolist-apply" class="backto boxleftt">
	          &larr;  <?php echo link_to(__("Cancel", array(), 'sfForkedApply'), sfConfig::get('app_sfApplyPlugin_after', '@homepage')) ?>
				  </span>
				  <?php echo $form['_csrf_token'] ?>
				</form>
    </div>
  </div>
</div>


