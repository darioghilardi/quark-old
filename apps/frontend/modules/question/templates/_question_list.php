<?php if ($pager == false): ?>
  No results for the selected tags.
<?php else: ?>

  <?php foreach ($pager->getResults() as $question): ?>

  <div class="item clearfix question-listed">
    <div class="first-group-fields boxleft">

      <span class="field votes boxleft">
        <span class="count"><?php echo $question->getInterestedUsers() ?></span>
        <span class="desc">Votes</span>
      </span>

      <span class="field answers boxleft <?php echo $question->getAnswerCountClass() ?>">
        <span class="count"><?php echo $question->getAnswerCount(); ?></span>
        <span class="desc">Answers</span>
      </span>

      <span class="field views boxleft">
        <span class="count"><?php print $question->views; ?></span>
        <span class="desc">Views</span>
      </span>


    </div>

    <div class="second-group-fields boxleft">
    <span class="field title">
      <h2><a href="<?php echo url_for('question_show', $question)?>"><?php echo $question->getTitle()?></a></h2>
    </span>

    <span class="tags boxleft txtleft">
      <?php include_partial('question/question_tags', array('tags' => $question->getQuestionTag())) ?>
    </span>

    <span class="submitted boxright txtright">
      <?php include_partial('question/question_submitted', array('user_id' => $question->getUser_id(), 'created_at' => $question->getCreatedAt())) ?>
    </span>

    </div>
  </div>

  <?php endforeach; ?>

  <div id="pagination">
    <?php include_partial('question/question_pager', array('pager' => $pager, 'order' => $order)) ?>
  </div>

<?php endif; ?>