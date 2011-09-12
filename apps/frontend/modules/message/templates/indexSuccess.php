<h1>Simpletwitter messages List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User</th>
      <th>Message</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($simpletwitter_messages as $simpletwitter_message): ?>
    <tr>
      <td><a href="<?php echo url_for('message/show?id='.$simpletwitter_message->getId()) ?>"><?php echo $simpletwitter_message->getId() ?></a></td>
      <td><a href="<?php echo url_for('user/show?id='.$simpletwitter_message->getUserId()) ?>"><?php echo $simpletwitter_message->getUserId() ?></a></td>
      <td><?php echo $simpletwitter_message->getMessage() ?></td>
      <td><?php echo $simpletwitter_message->getCreatedAt() ?></td>
      <td><?php echo $simpletwitter_message->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('message/new') ?>">New</a>
