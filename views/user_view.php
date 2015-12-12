<?php
  if($user->isAdmin()){
    echo "<div style='color:red'>Administrator</div>";
  }
?>
<ul>
  <li><?php echo "Email: ", $user->getemail() ?></li>
  <li><?php echo "Name: ", $user->getname() ?></li>
  <li><?php echo "Password: ", $user->getpassword() ?></li>
  <li><?php echo "Created: ", $user->getcreated() ?></li>
  <li><?php echo "Last Login: ", $user->getlastLogin() ?></li>
  <li><?php echo "Role ID: ", $user->getrole() ?></li>
</ul>

<a href='user.php' class="btn btn-info" role="button">View All Users</a>
<a href='user.php?action=delete_user&target=<?= $user->getemail() ?>' class="btn btn-info" role="button">Delete This User</a>
<a href='user.php?action=edit_user&target=<?= $user->getemail() ?>' class="btn btn-info" role="button">Edit This User</a>
<a href="../webroot/home.php" class="btn btn-info" role="button">Home</a>
