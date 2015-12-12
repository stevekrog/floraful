<?php
    require_once('../lib/db.interface.php');
    require_once('../lib/db.class.php');
    require_once('../models/user.class.php');
    require_once('../models/user_manager.class.php');
    require_once('../lib/header.php');

?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <title>floraful login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
    <body>
        <?php

            $action = isset($_GET["action"])?$_GET["action"]:'';
            $email = isset($_GET["email"])?$_GET["email"]:'';
            $password = isset($_GET["password"])?$_GET["password"]:'';
            $error_msg = array();

            switch ($action) {
            case 'logout':
                if(!$_SESSION["current_user"]){
                    include('home.php');
                    print "No User currently logged in";
                }
                else{
                    session_destroy();
                    include('../views/logout_success_view.php');
                }
                break;

            case 'login':
                $userManager = new UserManager();
                $user = $userManager->authenticate($email, $password);
                if($user){
                    $_SESSION['current_user'] = $user;
                    include('../views/login_success_view.php');
                }else{
                    $error_msg[] = 'Username or Password incorrect.';
                    include('../views/login_view.php');
                }
                break;

            default:
                if($_SESSION["current_user"]){
                    include('home.php');
                    print "login: User: '$name' already logged in with email: $email";
                    break;
                }
                include('../views/login_view.php');
                break;
            }
        ?>
    </body>
</html>
