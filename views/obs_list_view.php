<div class="container">
<table class="table table-striped">
    <tr>
        <th></th>
<!--         <th></th> -->
        <th>ObserverName</th>
        <th>Email</th>
        <th>ObsDateTime</th>
        <th>PlantName</th>
        <th>SoilDesc</th>
        <th>WeatherDesc</th>
        <th>CurrentTemp</th>
        <th>HighTemp</th>
        <th>LowTemp</th>
        <th>LocationDesc</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Notes</th>
        <th>Obs Type</th>
        <th>ObsID</th>
    </tr>

    <?php foreach ($observations as $obs) { ?>
        <tr>
            <td><a href="observation.php?action=view_observation&target=<?= $obs->getoid();?>"
                class="btn btn-info btn-sm" role="button">View</a></td>
<!--             <td><a href="observation.php?action=delete_observation&target=<?= $obs->getoid();?>"
                class="btn btn-info btn-xs" role="button">Delete</a></td> -->
            <td><?php echo $obs->getobserverName();?></td>
            <td><?php echo $obs->getemail();?></td>
            <td><?php echo $obs->getobsDateTime();?></td>
            <td><?php echo $obs->getplantName();?></td>
            <td><?php echo $obs->getsoilDesc();?></td>
            <td><?php echo $obs->getweatherDesc();?></td>
            <td><?php echo $obs->getcurrentTemp();?></td>
            <td><?php echo $obs->gethighTemp();?></td>
            <td><?php echo $obs->getlowTemp();?></td>
            <td><?php echo $obs->getlocationDesc();?></td>
            <td><?php echo $obs->getlatitude();?></td>
            <td><?php echo $obs->getlongitude();?></td>
            <td><?php echo $obs->getnotes();?></td>
            <td><?php echo $obs->getobstypeid();?></td>
            <td><?php echo $obs->getoid();?></td>
        </tr>
    <?php } ?>
</table>
</div>
<a href='observation.php?action=add_observation' class="btn btn-info" role="button">Add New Record</a>
<a href='../views/create_csv_view.php?obstype=1' class="btn btn-info" role="button">Save Records to File</a>
<a href='../webroot/home.php' class="btn btn-info" role="button">Home</a>
