<h1>Simpletwitter users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($simpletwitter_users as $simpletwitter_user): ?>
    <tr>
      <td class="id"><a href="<?php echo url_for('user/show?id='.$simpletwitter_user->getId()) ?>"><?php echo $simpletwitter_user->getId() ?></a></td>
      <td><?php echo $simpletwitter_user->getName() ?></td>
      <td class="email" hash="<?php echo md5(strtolower(trim($simpletwitter_user->getEmail())))?>"><?php echo $simpletwitter_user->getEmail() ?></td>
      <td><?php echo $simpletwitter_user->getPassword() ?></td>
      <td><?php echo $simpletwitter_user->getCreatedAt() ?></td>
      <td><?php echo $simpletwitter_user->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
