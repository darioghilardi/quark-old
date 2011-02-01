<div id="tabs-question-list" class="col-24">
  <ul class="nonelist">
    <li class="boxleft"><a href="<?php echo url_for('question/index?order=oldest') ?>"><span>Oldest Questions</span></a></li>
    <li class="boxleft"><a href="<?php echo url_for('question/index?order=newest') ?>"><span>Newest Questions</span></a></li>
    <li class="boxleft"><a href="<?php echo url_for('question/index?order=rated') ?>"><span>Most Rated</span></a></li>
  </ul>
  <?php include_partial('question/question_list', array('pager' => $pager, 'order' => $order)) ?>
</div>