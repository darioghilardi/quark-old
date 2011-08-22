<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $answer->getId() ?></td>
    </tr>
    <tr>
      <th>Question:</th>
      <td><?php echo $answer->getQuestionId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $answer->getUserId() ?></td>
    </tr>
    <tr>
      <th>Body:</th>
      <td><?php echo $answer->getBody() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $answer->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Votes:</th>
      <td><?php echo $answer->getVotes() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('answer/edit?id='.$answer->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('answer/index') ?>">List</a>
