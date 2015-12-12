<ul>
    <li><?php echo "ObsID: ", $obs->getoid();?></li>
    <li><?php echo "ObserverName: ", $obs->getobserverName();?></li>
    <li><?php echo "Email: ", $obs->getemail();?></li>
    <li><?php echo "ObsDateTime: ", $obs->getobsDateTime();?></li>
    <li><?php echo "PlantName: ", $obs->getplantName();?></li>
    <li><?php echo "SoilDesc: ", $obs->getsoilDesc();?></li>
    <li><?php echo "WeatherDesc: ", $obs->getweatherDesc();?></li>
    <li><?php echo "CurrentTemp: ", $obs->getcurrentTemp();?></li>
    <li><?php echo "HighTemp: ", $obs->gethighTemp();?></li>
    <li><?php echo "LowTemp: ", $obs->getlowTemp();?></li>
    <li><?php echo "LocationDesc: ", $obs->getlocationDesc();?></li>
    <li><?php echo "Latitude: ", $obs->getlatitude();?></li>
    <li><?php echo "Longitude: ", $obs->getlongitude();?></li>
    <li><?php echo "Notes: ", $obs->getnotes();?></li>
    <li><?php echo "ObservationType: ", $obs->getobstypeid();?></li>
</ul>
<a href="observation.php?action=view_observations_list&obstype=1" class="btn btn-info" role="button">View All Observations</a>

<a href='observation.php?action=delete_observation&target=<?= $obs->getoid() ?>'
   class="btn btn-info" role="button">Delete This Observation</a>

<a href='observation.php?action=edit_observation&target=<?= $obs->getoid() ?>'
    class="btn btn-info" role="button">Edit This Observation</a>
