function getDeviceJSON(username) {
  
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var locations = JSON.parse(this.responseText);

      displayDeviceGrid(locations);
    }
  };

  xmlhttp.open("GET", "get_user_devices.php", true);
  xmlhttp.send();
}