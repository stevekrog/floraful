<?php
	$userrole = $_SESSION['current_user']->getrole();
	$useremail = $_SESSION['current_user']->getemail();
	$username = $_SESSION['current_user']->getname();
?>

	<h3>Good Day <?= $username ?></h3>

<?php
	if($userrole == USER)
	{ ?>
		<a href="observation.php?action=add_observation" class="btn btn-info" role="button">add new record</a>
		<a href="observation.php?action=view_user_observations&email=<?= $useremail ?>&obstype=1" class="btn btn-info" role="button">view your previous plant records</a>
	    <a href="../webroot/login.php?action=logout" class="btn btn-info" role="button">Logout</a>
<?php	}
	else
	{ ?>
		<a href="user.php" class="btn btn-info" role="button">manage users</a>
		<a href="observation.php?action=view_observations_list&obstype=1" class="btn btn-info" 
			role="button">manage observations</a>
	    <a href="../webroot/login.php?action=logout" class="btn btn-info" role="button">Logout</a>
<?php } ?>

