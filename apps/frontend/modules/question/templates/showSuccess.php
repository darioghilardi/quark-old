<?php slot('title', sprintf('%s', $question->getTitle())); ?>
<?php use_helper('Text') ?>

<div id="question">
  <h1><?php echo $question->getTitle() ?></h1>

  <div class="description">
    <?php echo simple_format_text($question->getBody()) ?>
  </div>

  <div class="meta">
    <small>posted on <?php echo $question->getDateTimeObject('created_at')->format('d/m/Y') ?></small> |
	<small>updated on <?php echo $question->getDateTimeObject('updated_at')->format('d/m/Y') ?></small>
  </div>

  <div style="padding: 20px 0">
    <a href="<?php echo url_for('question/edit?id='.$question->getId()) ?>">
      Edit
    </a>
  </div>
</div>
