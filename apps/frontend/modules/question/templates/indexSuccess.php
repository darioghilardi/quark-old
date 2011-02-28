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
  
	  <div class="block statistics">
		  <div>
        <div class="item">1246<span>questions</span></div>
        <div class="item">125<span>unanswered</span></div>
        <div class="item">2503<span>answers</span></div>
		  </div>
	  </div>

    <div class="block populartags">
      <h4 class="block-title">Popular Tags</h4>
      <div>
      <ul class="nonelist nonespace">
        <li><a href="">Web</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Developing</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Apache</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Google</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Driven</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Design</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Android</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Image</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Css3</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">XHTML</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Django</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Drupal</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Python</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Linux</a><?php print 'x ' .rand(5,99);?></li>
        <li><a href="">Programming</a><?php print 'x' .rand(5,99);?></li>
      </ul>
      </div>
    </div>
    
  </div>
</div>