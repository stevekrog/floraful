<?php
    ini_set('display_errors', '1');
    require_once('../lib/db.interface.php');
    require_once('../lib/db.class.php');
    require_once('../models/observation.class.php');
    require_once('../models/plant_observation.class.php');
    require_once('../models/observations_manager.class.php');
	require_once('../lib/header.php');	

    $obstype = isset($_GET["obstype"])?$_GET["obstype"]:'';

	$observationsManager = new ObservationsManager();
	$observationsManager->saveObsToFile($obstype);

?>