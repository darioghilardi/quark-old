<div id="indexSuccess">
	<div id="tabs-question-list" class="col-24">
	  <ul class="nonelist">
	    <li class="boxleft"><a href="<?php echo url_for('question/index?order=oldest') ?>"><span>Oldest Questions</span></a></li>
	    <li class="boxleft"><a href="<?php echo url_for('question/index?order=newest') ?>"><span>Newest Questions</span></a></li>
	    <li class="boxleft"><a href="<?php echo url_for('question/index?order=rated') ?>"><span>Most Rated</span></a></li>
	  </ul>
	</div>
	
	<div id="question-list-content" class="col-18">
	 <?php include_partial('question/question_list', array('pager' => $pager, 'order' => $order)) ?>
	</div>
	
	<div id="sidebar" class="col-6">
    <div class="block">
      <h2>Primo</h2>
      <p>Bloa bla blaoa </p>
    </div>
    
    <div class="block">
          <h2>Secondo</h2>
      <p>Bloa bla blaoa </p>
    </div>
    
    <div class="block">
          <h2>Terzo</h2>
      <p>Bloa bla blaoa </p>
    </div>
	</div>
</div>