
<?php
	$userrole = $_SESSION['current_user']->getrole();
	$useremail = $_SESSION['current_user']->getemail();
	$username = $_SESSION['current_user']->getname();
?>

<h2>Record saved successfully</h2>

<?php
	if($userrole == USER)
	{ ?>
		<a href="observation.php?action=view_user_observations&email=<?= $useremail ?>&obstype=1" class="btn btn-info" role="button">continue</a>
<?php	}
	else
	{ ?>
		<a href="observation.php?action=view_observations_list&obstype=1" class="btn btn-info" 
			role="button">continue</a>
<?php	}

?>
