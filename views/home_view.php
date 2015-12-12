<?php

    if(isset($_SESSION['current_user']))
    {
        $email = $_SESSION['current_user']->getemail();
        $name = $_SESSION['current_user']->getname();
        $userrole = $_SESSION['current_user']->getrole();
        print "User: '$name' currently logged in with email: $email, role: $userrole";
    }else{
        print "No user currently logged in";
        $userrole = 0;
    }
?>

<form name="home" method="get">
    <a href="../webroot/user.php?action=user_add_user" class="btn btn-info" role="button">Create User account</a>
    <a href="../webroot/login.php" class="btn btn-info" role="button">Login</a>
    <a href="../webroot/observation.php?action=add_observation" class="btn btn-info" 
        role="button">Add Record No Login</a>
    <!-- <a href="../webroot/login.php?action=logout" class="btn btn-info" role="button">Logout</a> -->
</form>
