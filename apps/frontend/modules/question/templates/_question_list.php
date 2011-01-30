<h1>Question List</h1>

<div id="tabs-1">
  <table>
    <tbody>
      <?php foreach ($pager->getResults() as $question): ?>
      <tr>
      <td><?php include_partial('question/question_votes', array('question' => $question)) ?></td>
        <td><a href="<?php echo url_for('question_show', $question)?>"><?php echo $question->getTitle()?></a></td>
        <td>Author: <?php echo $question->User->getNickname() ?></td>
        <td>Created at: <?php echo $question->getDateTimeObject('created_at')->format('H:i d/m/Y') ?></td>
        <td>Updated at: <?php echo $question->getDateTimeObject('updated_at')->format('H:i d/m/Y') ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php include_partial('question/question_pager', array('pager' => $pager, 'order' => $order)) ?>
</div>