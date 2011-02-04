<?php 
/* ## Parzial ##
 * ### List of Questions ###
 * 
 * Deleted form original: $question->getDateTimeObject('updated_at')->format('H:i d/m/Y')
**/
?>

  <?php foreach ($pager->getResults() as $question): ?>
  
  <div class="item clearfix">
    <div class="first-grop-fields col-5 boxleft">
    
	    <span class="field votes boxleft">
	      <?php include_partial('question/question_votes', array('question' => $question)) ?>
	    </span>

      <span class="field answers boxleft <?php (rand(0,1)==1) ? print 'answered' : print 'unanswered';?>">
        <?php include_partial('question/question_answers', array()) ?>
      </span>
      
	    <span class="field views boxleft">
	      <?php include_partial('question/question_views', array()) ?>
	    </span>
	    

    </div>
    
    <div class="second-grop-fields col-13 boxleft">
    <span class="field title">
      <h2><a href="<?php echo url_for('question_show', $question)?>"><?php echo $question->getTitle()?></a></h2>
    </span>
    
    <span class="submitted boxright txtright">
        <span class="time"><?php print rand(0,20); ?><?php (rand(0,1)==1) ? print 'h' : print 'min';?> ago</span> by <span class="user"><a href=""><?php (rand(0,1)==1) ? print 'kiuz' : print 'Ingo';?></a></span> <span class="points"><?php print rand(299,2000); ?></span>
    </span>
    
    </div>
  </div>
	<?php endforeach; ?>
  
  <div id="pagination">
    <?php include_partial('question/question_pager', array('pager' => $pager, 'order' => $order)) ?>
  </div>
