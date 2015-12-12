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
<div class="container">
    <form action="observation.php" method="get">
        <a href="../webroot/home.php" class="btn btn-info" role="button">Home</a>
<!--         <a href="../webroot/login.php?action=logout" class="btn btn-info" role="button">Logout</a> -->
        <input type="hidden" name="action" value="save_observation">
        <input type="hidden" name="obstype" value="<?= $obstype ?>">

<?php
    if($activeUserSession) { ?>
        <div class="form-group">
            <label for="observerName">Observer Name: </label>
            <input type="text" class="form-control" id="observerName" name="observerName" placeholder="observerName" value="<?= $name ?>" readonly>     
        </div>

        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= $email ?>" readonly>
        </div>

<?php   }
    else
    { ?>
        <div class="form-group">
            <label for="observerName">Observer Name: </label>
            <input type="text" class="form-control" id="observerName" name="observerName" placeholder="observerName" value="<?= $name ?>" required>     
        </div>

        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="anonymous@email.com" value="anonymous@email.com" readonly>
        </div>
<?php   } ?>

        <div class="form-group">
            <label for="plantName">Plant Name: </label>
            <input type="text" class="form-control" id="plantName" name="plantName"placeholder="plantName" required>
        </div>

        <div class="form-group">
            <label for="soilDesc">SoilDesc: </label>
            <input type="text" class="form-control" id="soilDesc" name="soilDesc" placeholder="soilDesc" >
        </div>

        <div class="form-group">
            <label for="weatherDesc">WeatherDesc: </label>
            <input type="text" class="form-control" id="weatherDesc" name="weatherDesc" placeholder="weatherDesc" required>
        </div>
        
        <div class="form-group">
            <label for="currentTemp">CurrentTemp: </label>
            <input type="text" class="form-control" id="currentTemp" name="currentTemp" placeholder="currentTemp">
        </div>

        <div class="form-group">
            <label for="highTemp">HighTemp: </label>
            <input type="text" class="form-control" id="highTemp" name="highTemp" placeholder="highTemp">
        </div>

        <div class="form-group">
            <label for="lowTemp">LowTemp: </label>
            <input type="text" class="form-control" id="lowTemp" name="lowTemp" placeholder="lowTemp">
        </div>

        <div class="form-group">
            <label for="locationDesc">LocationDesc: </label>
            <input type="text" class="form-control" id="locationDesc" name="locationDesc" placeholder="locationDesc" required>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude: </label>
            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude">
        </div>

        <div class="form-group">
            <label for="longitude">Longitude: </label>
            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="longitude">
        </div>

        <div class="form-group">
            <label for="notes">Notes: </label>
            <input type="text" class="form-control" id="notes" name="notes" placeholder="notes">
        </div>

        <input type="submit" value="Save" class="btn btn-info" role="button">
    </form>
</div>
