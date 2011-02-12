<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="add-answer" action="<?php echo url_for('answer/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
  <?php echo $form->renderHiddenFields(false) ?>
  
  &nbsp;<a href="<?php echo url_for('answer/index') ?>">Back to list</a>
  
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'answer/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  

  <?php echo $form->renderGlobalErrors() ?>
  
  <div id="body-answer" class="item">
	  <?php echo $form['body']->renderLabel() ?>
	  <?php echo $form['body']->renderError() ?>
	  <?php echo $form['body'] ?>
  </div>



    <span id ="submit-answer" class="boxright save">
      <input type="submit" value="Save" />
    </span>
    
    <span id ="backtop-answer" class="boxleftt backto">
        &uarr; <a href="#question">Back to question</a>
    </span>  
</form>

<?php 

/**
 *
 * Form with #id
 * Item with #id and .class = .item
 * 
 *     <div id="" class="item">
**/?>