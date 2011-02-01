<h1>Answers List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Question</th>
      <th>User</th>
      <th>Body</th>
      <th>Created at</th>
      <th>Votes</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($answers as $answer): ?>
    <tr>
      <td><a href="<?php echo url_for('answer/show?id='.$answer->getId()) ?>"><?php echo $answer->getId() ?></a></td>
      <td><?php echo $answer->getQuestionId() ?></td>
      <td><?php echo $answer->getUserId() ?></td>
      <td><?php echo $answer->getBody() ?></td>
      <td><?php echo $answer->getCreatedAt() ?></td>
      <td><?php echo $answer->getVotes() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('answer/new') ?>">New</a>
