<?php use_stylesheet('wmd.css') ?>
<?php use_javascript('wmd.js') ?>
<?php use_javascript('showdown.js') ?>
<?php use_javascript('wmd-setup.js') ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<form id="add-question" action="<?php echo url_for('question/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
  <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

    <?php echo $form->renderGlobalErrors() ?>
    <div id="title-question" class="item">
	    <?php echo $form['title']->renderError() ?>
	    <?php echo $form['title']->renderLabel() ?>
	    <?php echo $form['title'] ?>
    </div>
    <div id="body-question" class="item">
      <?php echo $form['body']->renderError() ?>
      <?php echo $form['body']->renderLabel() ?>
	    <div id="button-bar"></div>
	    <?php echo $form['body'] ?>
    </div>


   
    <div id="preview-question" class="item"> 
      <label>Preview</label>
      <div id="preview"></div>
    </div>
    
    <?php echo $form['_csrf_token'] ?>

		<span id ="submit-question" class="boxright">
		  <input type="submit" value="Save" />
		</span>
		
		<span id ="backtolist-question" class="boxleftt">
		    &larr; <a href="<?php echo url_for('question/index') ?>">Back to list</a>
		</span>

    

    <?php if (!$form->getObject()->isNew()): ?>
      &nbsp;<?php echo link_to('Delete', 'question/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
    <?php endif; ?>
</form>