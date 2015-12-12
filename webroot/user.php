<?php
	require_once('../lib/db.interface.php');
	require_once('../lib/db.class.php');
	require_once('../models/user.class.php');
	require_once('../models/user_manager.class.php');
	require_once('../lib/header.php');


	$action = isset($_GET["action"])?$_GET["action"]:'';

	if(!isset($_SESSION['current_user']))
		if ($action != 'user_add_user' && $action != 'save_user')
		{
			header('Location: login.php');
		}
	elseif(isset($_SESSION['current_user']))
	{
		if($_SESSION['current_user']->getrole() == USER)
		{
			header('Location: ../views/login_success_view.php');
		}
	}


?>
<!DOCTYPE html>
<html>
<head>
    <title>floraful</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
  <body>
    <h2>User Administration</h2>
    <?php
    $error_msg = array();

  	$action = isset($_GET["action"])?$_GET["action"]:'';
  	$target = isset($_GET["target"])?$_GET["target"]:'';

    switch ($action) {
      case 'view_user':
        $userManager = new UserManager();
        $user = $userManager->getUser($target);
        include('../views/user_view.php');
        break;

      case 'delete_user':
        $userManager = new UserManager();
        $userManager->delete($target);
        header('Location: user.php');
        break;

      case 'admin_add_user':
        $userManager = new UserManager();
        $roles = $userManager->getAllRoles();
        $user = new User();
        include('../views/user_add_edit_view.php');
        break;

      case 'user_add_user':
        $userManager = new UserManager();
        $roles = $userManager->getUserRole();
        $user = new User();
        include('../views/user_add_edit_view.php');
        break;

      case 'edit_user':
        $userManager = new UserManager();
        $user = $userManager->getUser($target);
        $roles = $userManager->getAllRoles();
        include('../views/user_add_edit_view.php');
        break;

      case 'save_user':
        $userManager = new UserManager();
        $arr = array();
				$arr["email"] = isset($_GET["email"])?$_GET["email"]:'';
        $arr["name"] = isset($_GET["name"])?$_GET["name"]:'';
				$arr["password"] = isset($_GET["password"])?$_GET["password"]:'';
        $arr["created"] = isset($_GET["created"])?$_GET["created"]:'';
        $arr["lastLogin"] = isset($_GET["lastLogin"])?$_GET["lastLogin"]:'';
        $arr["roleid"] = isset($_GET["roleid"])?$_GET["roleid"]:'';
        $user = new User();
        $user->hydrate($arr);

        $success = $userManager->save($user);

  		  if(!$success)
  		  {          
          if($_SESSION['current_user']->getrole() == USER)
          {
            $roles = $userManager->getUserRole();
          }
          else
          {
            $roles = $userManager->getAllRoles();
          }

    			$user->setemail = '';
    			include('../views/user_add_edit_view.php');
    			break;
  		  }
        
        header('Location: user.php');
        break;

      default:
        $userManager = new UserManager();
        $users = $userManager->getAllUsers();
        include('../views/user_list_view.php');
        break;
  }
    ?>

</body>
</html>
