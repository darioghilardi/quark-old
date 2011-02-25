<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $static_content->getId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $static_content->getTitle() ?></td>
    </tr>
    <tr>
      <th>Path:</th>
      <td><?php echo $static_content->getPath() ?></td>
    </tr>
    <tr>
      <th>Body:</th>
      <td><?php echo $static_content->getBody() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('static/edit?id='.$static_content->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('static/index') ?>">List</a>
