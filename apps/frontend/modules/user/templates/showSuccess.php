<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $simpletwitter_user->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $simpletwitter_user->getName() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $simpletwitter_user->getEmail() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $simpletwitter_user->getPassword() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $simpletwitter_user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $simpletwitter_user->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$simpletwitter_user->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>">List</a>
