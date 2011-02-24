<h1>Static contents List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User</th>
      <th>Title</th>
      <th>Body</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($static_contents as $static_content): ?>
    <tr>
      <td><a href="<?php echo url_for('static/show?id='.$static_content->getId()) ?>"><?php echo $static_content->getId() ?></a></td>
      <td><?php echo $static_content->getUserId() ?></td>
      <td><?php echo $static_content->getTitle() ?></td>
      <td><?php echo $static_content->getBody() ?></td>
      <td><?php echo $static_content->getCreatedAt() ?></td>
      <td><?php echo $static_content->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('static/new') ?>">New</a>
