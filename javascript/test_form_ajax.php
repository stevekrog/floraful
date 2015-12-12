<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.getJSON demo</title>

  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>

<form>
  <fieldset>
    <legend>Location</legend>

    <label for="lat">Latitude: </label>
    <input type="text" name="latitude" id="lat" placeholder="Enter Latitude" value="" required><br><br>

    <label for="lon">Longitude: </label>
    <input type="text" name="longitude" id="lon" placeholder="Enter Longitude" value="" required><br><br>

    <a href="#" id="ajaxTrigger">Fetch Weather Data</a><br><br>

    <label for="temp">Current Temp: </label>
    <input type="text" name="temperature" id="temp" placeholder="Temperature" value="" required><br><br>
  </fieldset>
</form>

<script>
  // The document ready statement delays jQuery execution until the DOM if fully formed.
  $(document).ready(function(){

    // Test if browser supports geolocation.  If so, populate form filds with latitude and longitude
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function( position ){
          $('#lat').val(position.coords.latitude);
          $('#lon').val(position.coords.longitude);
        }
      )
    }

    // Assign a click event to the id of "ajaxTrigger".  When a user clicks the element the enclosed code will run.
    $('#ajaxTrigger').click(function() {

      // We must have lat and lon to proceed.
      // Check if lat and lon have values.  If not present error and end execution.
      if(!$('#lat').val() || !$('#lon').val()){
        alert('Please provide latitude and longitude for which to retrieve weather data.');
        return;
      }

      // check to see if either lat or lon is not a number. If not present error and end execution.
      if(isNaN($('#lat').val()) || isNaN($('#lon').val())){
        alert('Please provide a valid numeric value for latitude and longitude.');
        return;
      }

      // To be a little  more clear on the api url structure list out each piece here.
      var baseURL = 'http://api.openweathermap.org/data/2.5/weather'
      var lat = "?lat=" + $('#lat').val().toString();
      var lon = "&lon=" + $('#lon').val().toString();
      var appid = '&APPID=7d7fffe39e7c66965aaf15016448d3e8';
      var params = '&units=imperial';

      // concat all parts of the ajax url before using it.
      var ajaxURL = baseURL.concat(lat, lon, appid, params);

      // jQuery ajax json call... there is a .done function if all goes well and a .fail function if it doesn't
      $.getJSON( ajaxURL )
        .done(function( json ) {
          $('#temp').val(json.main.temp);
        })
        .fail(function( jqxhr, textStatus, error ) {
          var err = textStatus + ", " + error;
          alert( "Request Failed: " + err );
      });

      // prevent default behavior of element clicked if it has one.
      return false;
    });
  });
</script>

</body>
</html>
