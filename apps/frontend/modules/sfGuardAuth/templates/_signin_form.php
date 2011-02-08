<?php use_helper('I18N') ?>

<form id="signin-form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <?php echo $form->renderGlobalErrors() ?>
  
  <div id="username-signin" class="item">
	  <?php echo $form['username']->renderError() ?>
	  <?php echo $form['username']->renderLabel() ?>
	  <?php echo $form['username'] ?>
  </div>
  
  <div id="password-signin" class="item">
	  <?php echo $form['password']->renderError() ?>
	  <?php echo $form['password']->renderLabel() ?>
	  <?php echo $form['password'] ?>
  </div>
  
	<?php echo $form['_csrf_token'] ?>
	
  <span id ="submit-signin" class="boxright">
    <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
  </span>

  <?php $routes = $sf_context->getRouting()->getRoutes() ?>
  
  <?php if (isset($routes['sf_guard_forgot_password'])): ?>
    <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
  <?php endif; ?>

  <?php if (isset($routes['sf_guard_register'])): ?>
    &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
  <?php endif; ?>

</form>