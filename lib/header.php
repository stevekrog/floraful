<?php
if(!session_start())
{
    echo "Session failed to start";
}

define('PLANT', '1');
define('BIRD', '2');

define('USER', '1');
define('ADMINVIEWONLY', '2');
define('ADMIN', '3');

?>