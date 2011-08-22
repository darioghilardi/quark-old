<h1>Static contents List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Path</th>
      <th>Body</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($static_contents as $static_content): ?>
    <tr>
      <td><a href="<?php echo url_for('static/show?id='.$static_content->getId()) ?>"><?php echo $static_content->getId() ?></a></td>
      <td><?php echo $static_content->getTitle() ?></td>
      <td><?php echo $static_content->getPath() ?></td>
      <td><?php echo $static_content->getBody() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('static/new') ?>">New</a>
