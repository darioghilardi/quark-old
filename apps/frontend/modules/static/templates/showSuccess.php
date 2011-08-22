<?php slot('title', sprintf('%s', $static_content->getTitle())); ?>
<?php use_helper('Text') ?>

<div id="showSuccess">  
  <div id="static-single-content" class="col-18">
    <h1 id="page-title"><?php echo $static_content->getTitle() ?></h1>
		
		<div>
		
			<div class="description">
			  <?php echo $static_content->getBody() ?>
	    </div>
	    
	    <div class="options clearfix clear">
	      <ul class="nonelist nonespace">
	        <li class="boxleft"><a href="<?php echo url_for('static/edit?id='.$static_content->getId()) ?>">Edit</a></li>
	      </ul>
	    </div>
    
    </div>
    
  </div>
      
  <div id="sidebar" class="col-6">
  </div>
</div>
