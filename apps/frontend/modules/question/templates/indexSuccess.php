<div id="indexSuccess">

	<div id="question-list-content" class="col-18">
	<h1>Question List</h1>
	<div id="tabs-question-list" class="clearfix">
    <ul id="order" class="nonelist clearfix">
      <li class="boxleft <?php ($order=='oldest') ? print 'selected' : print 'unselected';?>"><a href="<?php echo url_for('question/index?order=oldest') ?>"><span>Oldest Questions</span></a></li>
      <li class="boxleft <?php ($order=='newest') ? print 'selected' : print 'unselected';?>"><a href="<?php echo url_for('question/index?order=newest') ?>"><span>Newest Questions</span></a></li>
      <li class="boxleft <?php ($order=='rated') ? print 'selected' : print 'unselected';?>"><a href="<?php echo url_for('question/index?order=rated') ?>"><span>Most Rated</span></a></li>
    </ul>
  </div>
  
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