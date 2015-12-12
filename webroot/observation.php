<?php
    ini_set('display_errors', '1');
    require_once('../lib/db.interface.php');
    require_once('../lib/db.class.php');
    require_once('../models/observation.class.php');
    require_once('../models/plant_observation.class.php');
    require_once('../models/observations_manager.class.php');
    require_once('../models/user.class.php');
	require_once('../lib/header.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
  <body>
    <h2>Plant Observations</h2>
    <?php
        $action = isset($_GET["action"])?$_GET["action"]:'';
        $target = isset($_GET["target"])?$_GET["target"]:'';
        $obstype = isset($_GET["obstype"])?$_GET["obstype"]:'';
        $email = isset($_GET["email"])?$_GET["email"]:'';
        $userrole = isset($_GET["userrole"])?$_GET["userrole"]:'';

        switch($action){
            case 'view_observation':
                $observationsManager = new ObservationsManager();
                $obs = $observationsManager->getObs($target);
                include('../views/obs_plant_view.php');
                break;
            case 'view_observations_list':
                if($_SESSION["current_user"]->getrole() != 3){
                    header('Location: home.php');
                    print "Admin privilege required for this option";
                    break;
                }
                $observationsManager = new ObservationsManager();
                $observations = $observationsManager->getAllObs($obstype);
                include('../views/obs_list_view.php');
                break;
            case 'view_user_observations':
                $observationsManager = new ObservationsManager();
                $observations = $observationsManager->getUserObs($email, $obstype);
                include('../views/obs_list_view.php');
                break;
            case 'delete_observation':
                $observationsManager = new ObservationsManager();
                $observationsManager->delete($target);
                header('Location: observation.php');
                break;
            case 'save_plant_obs_to_file':
                $observationsManager = new ObservationsManager();
                $observationsManager->savePlantObsToFile();
                header('Location: observation.php');
                break;
            case 'add_observation':
                $obs = new plantObservation();
                $_SESSION['obstype'] = PLANT;
                include('../views/obs_add_view.php');
                break;
            case 'edit_observation':
                $observationsManager = new ObservationsManager();
                $obs = $observationsManager->getObs($target);
                include('../views/obs_edit_view.php');
                break;
            case 'save_observation':
                $arr = array();
                $arr["oid"] = isset($_GET["oid"])?$_GET["oid"]:'';
                $arr["observerName"] = isset($_GET["observerName"])?$_GET["observerName"]:'';
                $arr["email"] = isset($_GET["email"])?$_GET["email"]:'';
                $arr["observationDateTime"] = isset($_GET["obsDateTime"])?$_GET["obsDateTime"]:'';
                $arr["weatherDesc"] = isset($_GET["weatherDesc"])?$_GET["weatherDesc"]:'';
                $arr["currentTemp"] = isset($_GET["currentTemp"])?$_GET["currentTemp"]:'';
                $arr["highTemp"] = isset($_GET["highTemp"])?$_GET["highTemp"]:'';
                $arr["lowTemp"] = isset($_GET["lowTemp"])?$_GET["lowTemp"]:'';
                $arr["locationDesc"] = isset($_GET["locationDesc"])?$_GET["locationDesc"]:'';
                $arr["latitude"] = isset($_GET["latitude"])?$_GET["latitude"]:'';
                $arr["longitude"] = isset($_GET["longitude"])?$_GET["longitude"]:'';
                $arr["notes"] = isset($_GET["notes"])?$_GET["notes"]:'';
                $arr["plantName"] = isset($_GET["plantName"])?$_GET["plantName"]:'';
                $arr["soilDesc"] = isset($_GET["soilDesc"])?$_GET["soilDesc"]:'';
                $arr["obstypeid"] = isset($_GET["obstype"])?$_GET["obstype"]:'';

                $obs = new plantObservation();
                $obs->hydrate($arr);

                $observationsManager = new ObservationsManager();
                $observationsManager->save($obs);
                // include('../views/obs_save_success_view.php');
                // header('Location: ../views/obs_save_success_view.php');
                header('Location: observation.php');
                break;
            default:
                header('Location: home.php');
                break;
        }
    ?>

</body>
</html>
