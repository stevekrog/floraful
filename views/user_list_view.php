<div class="container">
<table class="table table-striped">
    <tr>
        <th></th>
        <th>Email</th>
        <th>Name</th>
        <th>Password</th>
        <th>Created</th>
        <th>Last Login</th>
        <th>Role</th>
    </tr>
	<?php foreach($users as $user){ ?>
	<tr>
		<td><a href='user.php?action=view_user&target=<?= $user->getemail() ?>' class="btn btn-info btn-sm" role="button">view</a></td>
		<td><?= $user->getemail() ?></td>
		<td><?= $user->getname() ?></td>
		<td><?= $user->getpassword() ?></td>
		<td><?= $user->getcreated() ?></td>
		<td><?= $user->getlastLogin() ?></td>
		<td><?= $user->getrole() ?></td>
	</tr>
	<?php } ?>
</table>
</div>
<a href='user.php?action=admin_add_user' class="btn btn-info" role="button">Add New User</a>
<a href='login.php?action=logout' class="btn btn-info" role="button">Log Out</a>
<a href="../webroot/home.php" class="btn btn-info" role="button">Home</a>