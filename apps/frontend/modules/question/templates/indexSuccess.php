<div id="indexSuccess">

	<div id="question-list-content" class="col-18">
	<div id="global-content">
	<h1 id="page-title" class="boxleft">Questions List</h1>
	<div id="tabs-question-list">
    <ul id="order" class="nonelist clearfix nonespace">
      <li class="boxright <?php ($order=='latest') ? print 'selected' : print 'unselected';?>">
        <a title="The most recently asked questions" href="<?php echo url_for('question/index?order=latest') ?>"><span>Latest</span></a>
      </li>
      <li class="boxright <?php ($order=='views') ? print 'selected' : print 'unselected';?>">
        <a title="The most viewed questions" href="<?php echo url_for('question/index?order=views') ?>"><span>Views </span></a>
      </li>
      <li class="boxright <?php ($order=='rated') ? print 'selected' : print 'unselected';?>">
        <a title="Questions with the best positive rating" href="<?php echo url_for('question/index?order=rated') ?>"><span>Votes</span></a>
      </li>
    </ul>
  </div>

	 <?php include_partial('question/question_list', array('pager' => $pager, 'order' => $order)) ?>
	</div>
	</div>
	
	<div id="sidebar" class="col-6">

  <?php //Custom Blocks ?>
    <div class="block clearfix welcome">
      <h4 class="block-title">Welcome!</h4>
      <div>
      <p>Quark is an open source Question and Answer (Q&A) platform written in PHP.</p>      <span class="boxright txtrigt link"><a href="">Faq &raquo;</a></span>
      <span class="boxright txtrigt link"><a href="">About &raquo;</a></span>
      </div>
    </div>
  
    <?php include_component('question', 'blockQuestionStats'); ?>

    <?php include_component('question', 'blockRecentTags'); ?>
    
  </div>
</div>