<?php slot('title', sprintf('%s', $question->getTitle())); ?>
<?php use_helper('Text') ?>

<div id="showSuccess">
  <?php if(isset($token)): ?>
    <img src="<?php echo url_for('question/increaseviewcount?id='.$question->getId().'&token='.$token); ?>" style="display:none;"/>
  <?php endif; ?>
  
  <div id="question-single-content" class="col-18">
    <a name="question"></a>
    <h1 id="page-title"><?php echo $question->getTitle() ?></h1>

    <div id="question-precontents" class="col-2">
      <div class="vote">
        <?php include_component('question', 'questionVoteWidget', array('question' => $question)); ?>
      </div>
    </div>
    <div id="question-content" class="col-16">
      <div class="description">
        <?php echo $question->getBody_html(ESC_RAW); ?>
      </div>
      
      <div class="meta">
        <span class="tags boxleft txtleft">
          <?php include_partial('question/question_tags', array('tags' => $question->getQuestionTag())) ?>
        </span>
    
		    <span class="submitted boxright txtright">
		      <?php include_partial('question/question_submitted', array('user_id'=>$question->getUser_id(), 'created_at' => $question->getCreatedAt())) ?>
		    </span>
      </div>
      <div class="options clearfix clear">
	      <ul class="nonelist nonespace">
		      <li class="boxleft"><a title="Short permalink to the question" href="<?php echo url_for('@question_show_short?id='. $question->getId()) ?>">Link</a></li>
          <?php if ($caneditquestion): ?>
            <li class="boxleft"><a href="<?php echo url_for('question/edit?id='. $question->getId()) ?>">Edit</a></li>
          <?php endif; ?>
          <!-- li class="boxleft"><a href="##">Flag</a></li -->
	      </ul>
      </div>
      
    </div>


  <div id="answers-list" class="col-18">
  <?php if(sizeof($question->getAskQuestion())!=0):?>
    <h3 class="sub-page-title">Answer List</h3>
  <?php endif;?>
    <?php foreach ($question->getAskQuestion() as $answer): ?>
      <a name="<?php print $answer->getId()?>"></a>
      <div class="answer item clearfix">
        <div class="col-2">
         <div class="vote answer-<?php print $answer->getId() ?>">
           <?php include_component('answer', 'answerVoteWidget', array('answer' => $answer)); ?>
         </div>
         <div class="accept answer-<?php print $answer->getId() ?>">
           <?php include_component('answer', 'answerAcceptWidget', array('answer' => $answer)); ?>
         </div>
        </div>
	    <div class="col-16">
        
        <div class="description">
  	      <?php echo $answer->getBody_html(ESC_RAW) ?>
  	    </div>
  	    
		    <span class="submitted txtright boxright">
	        <?php include_partial('question/question_answers_submitted', array('user_id' => $answer->getUserId(), 'created_at' => $question->getCreatedAt())) ?>
		    </span>
		    
			  <div class="options clearfix clear">
	        <ul class="nonelist nonespace">
	          <li class="boxleft"><a title="Permalink to the answer" href="<?php echo url_for('@question_show?id='. $question->getId().'&title_slug='. $question->getTitleSlug() .'#'.$answer->getId()) ?>">Link</a></li>
            <?php if ($sf_user->getGuardUser()->id == $answer->getUserId()): ?>
              <li class="boxleft"><a href="<?php echo url_for('answer/edit?id=' . $answer->getId()) ?>">Edit</a></li>
            <?php endif; ?>
	          <!-- li class="boxleft"><a href="##">Flag</a></li -->
	        </ul>
	      </div>
      
	    </div>
	    
    </div>
  <?php endforeach; ?>
  </div>

	<div id="answer-form" class="col-18">
	  <h3 class="sub-page-title">Post a new answer</h3>
	  <?php if ($sf_user->isAuthenticated()): ?>
	    <?php include_partial('answer/answer_form', array('form' => $form)) ?>
	  <?php else: ?>
      <span class="not-logged">You must be logged in to post a new answer. <a href="<?php echo url_for('sf_guard_signin') ?>">Login</a> or <a href="">register</a>.</span>
	  <?php endif; ?>
	</div>

  </div>

  <div id="sidebar" class="col-6">
	  <?php include_partial('question/question_block', array('title' => 'Introduzione a Quark', 'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for  will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like')) ?>
	  <?php include_partial('question/question_block', array('title' => 'Come partecipare', 'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for  will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)')) ?>
	  <?php include_partial('question/question_block', array('title' => 'Collabora', 'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')) ?>
  </div>

</div>