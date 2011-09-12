<h1>Simpletwitter followss List</h1>

<table>
  <thead>
    <tr>
      <th>Follower</th>
      <th>Followed</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($simpletwitter_followss as $simpletwitter_follows): ?>
    <tr>
      <td><a href="<?php echo url_for('follows/show?follower_id='.$simpletwitter_follows->getFollowerId().'&followed_id='.$simpletwitter_follows->getFollowedId()) ?>"><?php echo $simpletwitter_follows->getFollowerId() ?></a></td>
      <td><a href="<?php echo url_for('follows/show?follower_id='.$simpletwitter_follows->getFollowerId().'&followed_id='.$simpletwitter_follows->getFollowedId()) ?>"><?php echo $simpletwitter_follows->getFollowedId() ?></a></td>
      <td><?php echo $simpletwitter_follows->getCreatedAt() ?></td>
      <td><?php echo $simpletwitter_follows->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('follows/new') ?>">New</a>
