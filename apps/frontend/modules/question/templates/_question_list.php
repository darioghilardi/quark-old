<?php 
/* ## Parzial ##
 * ### List of Questions ###
 * 
 * Deleted form original: $question->getDateTimeObject('updated_at')->format('H:i d/m/Y')
**/
?>

  <?php foreach ($pager->getResults() as $question): ?>
  
  <div class="item clearfix">
    <span class="field title">
      <h2><a href="<?php echo url_for('question_show', $question)?>"><?php echo $question->getTitle()?></a></h2>
    </span>
    <div class="first-grop-fields col-5 boxleft">
	    <span class="field votes boxleft">
	      <?php include_partial('question/question_votes', array('question' => $question)) ?>
	    </span>
	    
	    <span class="field views boxleft">
	      <?php include_partial('question/question_views', array()) ?>
	    </span>
	    
	    <span class="field answers boxleft">
        <?php include_partial('question/question_answers', array()) ?>
	    </span>
    </div>
    
    <div class="second-grop-fields col-13 boxleft">
    <div class="field author">
      <span class="label-field">Author:</span>
      <span class="content-field"><?php echo $question->getUser() ?></span>
    </div>
    
    <div class="field created">
      <span class="label-field">Created at:</span>
      <?php echo $question->getDateTimeObject('created_at')->format('H:i d/m/Y') ?>
    </div>

    
    </div>
  </div>
	<?php endforeach; ?>
  
  <div id="pagination">
    <?php include_partial('question/question_pager', array('pager' => $pager, 'order' => $order)) ?>
  </div>
