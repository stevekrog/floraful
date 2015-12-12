<?php
    if(!isset($_SESSION['current_user'])) {
        $email = '';
        $name = '';
        $activeUserSession = FALSE;
    }else{
        $email = $_SESSION['current_user']->getemail();
        $name = $_SESSION['current_user']->getname();
        $activeUserSession = TRUE;
    }

    if(!isset($_SESSION['obstype'])) {
        $obstype = PLANT;
    }else{
        $obstype = $_SESSION['obstype'];
    }
?>

<h3>Edit Record</h3>

<div class="container">
<form action="observation.php" method="get">
    <input type="hidden" name="oid" value="<?= $obs->getoid() ?>">
    <input type="hidden" name="action" value="save_observation">
    <input type="hidden" name="obstype" value="<?= $obstype ?>">

    <a href="../webroot/home.php" class="btn btn-info" role="button">Home</a>

    <div class="form-group">
        <label for="observerName">ObserverName: </label>
        <input type="text" class="form-control" id="observerName" name="observerName" value="<?= $obs->getobserverName() ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= $obs->getemail() ?>" readonly>
    </div>

    <div class="form-group">
        <label for="obsDateTime">Observation DateTime: </label>
        <input type="text" class="form-control" id="obsDateTime" name="obsDateTime" value="<?= $obs->getobsDateTime() ?>" required>
    </div>

    <div class="form-group">
        <label for="plantName">Plant Name: </label>
        <input type="text" class="form-control" id="plantName" name="plantName" value="<?= $obs->getplantName() ?>">
    </div>

    <div class="form-group">
        <label for="soilDesc">SoilDesc: </label>
        <input type="text" class="form-control" id="soilDesc" name="soilDesc" value="<?= $obs->getsoilDesc() ?>">
    </div>

    <div class="form-group">
        <label for="weatherDesc">WeatherDesc: </label>
        <input type="text" class="form-control" id="weatherDesc" name="weatherDesc" value="<?= $obs->getweatherDesc() ?>">
    </div>

    <div class="form-group">
        <label for="currentTemp">CurrentTemp: </label>
        <input type="text" class="form-control" id="currentTemp" name="currentTemp" value="<?= $obs->getcurrentTemp() ?>">
    </div>

    <div class="form-group">
        <label for="highTemp">HighTemp: </label>
        <input type="text" class="form-control" id="highTemp" name="highTemp" value="<?= $obs->gethighTemp() ?>">
    </div>

    <div class="form-group">
        <label for="lowTemp">LowTemp: </label>
        <input type="text" class="form-control" id="lowTemp" name="lowTemp" value="<?= $obs->getlowTemp() ?>">
    </div>

    <div class="form-group">
        <label for="locationDesc">LocationDesc: </label>
        <input type="text" class="form-control" id="locationDesc" name="locationDesc" value="<?= $obs->getlocationDesc() ?>">
    </div>

    <div class="form-group">
        <label for="latitude">Latitude: </label>
        <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $obs->getlatitude() ?>">
    </div>

    <div class="form-group">
        <label for="longitude">Longitude: </label>
        <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $obs->getlongitude() ?>">
    </div>

    <div class="form-group">
        <label for="notes">Notes: </label>
        <input type="text" class="form-control" id="notes" name="notes" value="<?= $obs->getnotes() ?>">
    </div>

    <input type="submit" value="Save" class="btn btn-info" role="button">
</form>
</div>