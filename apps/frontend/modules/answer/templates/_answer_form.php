<?php use_stylesheet('wmd.css') ?>
<?php use_javascript('wmd.js') ?>
<?php use_javascript('showdown.js') ?>
<?php use_javascript('wmd-setup-answer.js') ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="add-answer" action="<?php echo url_for('answer/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
  
  <?php echo $form->renderHiddenFields(false) ?>
    
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'answer/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  

  <?php echo $form->renderGlobalErrors() ?>
  
  <div id="body-answer" class="item">
    <?php echo $form['body']->renderError() ?>
    <?php echo $form['body']->renderLabel() ?>
    <div id="button-bar"></div>
	  <?php echo $form['body'] ?>
  </div>

    <div id="preview-answer" class="item preview"> 
      <label>Preview</label>
      <div id="preview"></div>
    </div>

    <?php echo $form['_csrf_token'] ?>

  <div id="button-answer" class="item">
    <span id ="submit-answer" class="boxright save">
      <input type="submit" value="Save" />
    </span>
    
    <span id ="backtop-answer" class="boxleftt backto">
        &uarr; <a href="#question">Back to question</a>
    </span>
  </div>
    
</form>

<?php 

/**
 *
 * Form with #id
 * Item with #id and .class = .item
 * 
 *     <div id="" class="item">
**/?>