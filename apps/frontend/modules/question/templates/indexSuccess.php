<div id="indexSuccess">

	<div id="question-list-content" class="col-18">
	<div id="global-content">
	<h1 id="page-title" class="boxleft">Question List</h1>
	<div id="tabs-question-list">
    <ul id="order" class="nonelist clearfix nonespace">
      <li class="boxright <?php ($order=='oldest') ? print 'selected' : print 'unselected';?>"><a href="<?php echo url_for('question/index?order=oldest') ?>"><span>Oldest</span></a></li>
      <li class="boxright <?php ($order=='newest') ? print 'selected' : print 'unselected';?>"><a href="<?php echo url_for('question/index?order=newest') ?>"><span>Newest </span></a></li>
      <li class="boxright <?php ($order=='rated') ? print 'selected' : print 'unselected';?>"><a href="<?php echo url_for('question/index?order=rated') ?>"><span>Votes</span></a></li>
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