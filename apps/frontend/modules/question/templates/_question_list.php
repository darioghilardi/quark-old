<h1>Question List</h1>
<div id="question-list-content">
	<?php foreach ($pager->getResults() as $question): ?>
  
  <div class="item clearfix">
    <span class="field title">
      <h2><a href="<?php echo url_for('question_show', $question)?>"><?php echo $question->getTitle()?></a></h2>
    </span>
    <div class="first-grop-fields col-6 boxleft">
	    <span class="field votes boxleft">
	      <?php include_partial('question/question_votes', array('question' => $question)) ?>
	    </span>
	    
	    <span class="field views boxleft">
	      <?php print rand(199,299); ?> Views
	    </span>
	    
	    <span class="field answers boxleft">
	      <?php print rand(0,99); ?> Answers
	    </span>
    </div>
    
    <span>
      <span class="label-field">Author:</span>
      <?php echo $question->getUser() ?>
    </span>
    
    <span>
      <span class="label-field">Created at:</span>
      <?php echo $question->getDateTimeObject('created_at')->format('H:i d/m/Y') ?>
    </span>
    
    <span>
      <span class="label-field">Updated at:</span>
      <?php echo $question->getDateTimeObject('updated_at')->format('H:i d/m/Y') ?>
    </span>
  </div>
	<?php endforeach; ?>


  <?php include_partial('question/question_pager', array('pager' => $pager, 'order' => $order)) ?>
</div>