<table>
  <tbody>
    <tr>
      <th>Follower:</th>
      <td><?php echo $simpletwitter_follows->getFollowerId() ?></td>
    </tr>
    <tr>
      <th>Followed:</th>
      <td><?php echo $simpletwitter_follows->getFollowedId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $simpletwitter_follows->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $simpletwitter_follows->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('follows/edit?follower_id='.$simpletwitter_follows->getFollowerId().'&followed_id='.$simpletwitter_follows->getFollowedId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('follows/index') ?>">List</a>
