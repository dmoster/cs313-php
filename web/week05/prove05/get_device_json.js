function getDeviceJSON(username) {
  
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var locations = JSON.parse(this.responseText);

      displayDeviceGrid(locations);
      console.log(locations);
      return locations;
    }
  };

  xmlhttp.open("POST", "get_user_devices.php", true);
  xmlhttp.send("username=" + username);

  return null;
}