<h1>Question List</h1>

<table>
  <tbody>
    <?php foreach ($questions as $question): ?>
    <tr>
      <td><a href="<?php echo url_for('question_show', $question)?>"><?php echo $question->getTitle()?></a></td>
	  <td>Author: <?php echo $question->User->getNickname() ?></td>
      <td>Created at: <?php echo $question->getDateTimeObject('created_at')->format('d/m/Y') ?></td>
      <td>Updated at: <?php echo $question->getDateTimeObject('updated_at')->format('d/m/Y') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
