<?php
    ini_set('display_errors', '1');
    require_once('../models/user.class.php');
    require_once('../lib/header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>floraful</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
    <h2>Welcome to floraful</h2>
    <?php

          if(isset($_SESSION['current_user'])){
            $userrole = $_SESSION['current_user']->getrole();
          }
          else{
            $userrole = 0;
          }

        switch($userrole){
            case USER:
                // include('../views/login_success_view.php');
            case ADMINVIEWONLY:
                // include('../views/login_success_view.php');
            case ADMIN:
                include('../views/login_success_view.php');
                break;

            default:
                include('../views/home_view.php');
                break;
        }
    ?>

</body>
</html>
