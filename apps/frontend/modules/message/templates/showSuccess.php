<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $simpletwitter_message->getId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $simpletwitter_message->getUserId() ?></td>
    </tr>
    <tr>
      <th>Message:</th>
      <td><?php echo $simpletwitter_message->getMessage() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $simpletwitter_message->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $simpletwitter_message->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('message/edit?id='.$simpletwitter_message->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('message/index') ?>">List</a>
