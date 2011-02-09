<?php slot('title', sprintf('%s', $question->getTitle())); ?>
<?php use_helper('Text') ?>

<?php if(isset($token)): ?>
  <img src="<?php echo url_for('question/increaseviewcount?id='.$question->getId().'&token='.$token); ?>" style="display:none;"/>
<?php endif; ?>

<div id="question">
  <?php include_partial('question/question_votes', array('question' => $question)) ?>
  <div class="">
    <span><a href=""><img src="" /></a></span>
  </div>
  <h1><?php echo $question->getTitle() ?></h1>

  <div class="description">
    <?php echo simple_format_text($question->getBody()) ?>
  </div>

  <div class="meta">
    <small>posted on <?php echo $question->getDateTimeObject('created_at')->format('d/m/Y') ?></small> |
    <small>updated on <?php echo $question->getDateTimeObject('updated_at')->format('d/m/Y') ?></small>
  </div>

  <div style="padding: 20px 0">
    <a href="<?php echo url_for('question/edit?id=' . $question->getId()) ?>">
      Edit
    </a>
  </div>
</div>


<div id="answers">
  <h3>Answer List</h3>  
  <?php foreach ($question->getAskQuestion() as $answer): ?>
    <div class="answer">
    Votes: <?php echo $answer->getVotes() ?>
    <div>
        <?php echo $answer->getBody() ?>

      </div>
      posted by <?php echo $answer->getUser() ?>
      on <?php echo $answer->getDateTimeObject('created_at')->format('d/m/Y') ?>
    </div>
  <?php endforeach; ?>
</div>

<div id="answer-form">
  <h3>Post a new answer</h3>
  <?php if ($sf_user->isAuthenticated()): ?>
    <?php include_partial('answer/answer_form', array('form' => $form)) ?>
  <?php else: ?>
    You need to be logged in to post a new answer.
  <?php endif; ?>
</div>