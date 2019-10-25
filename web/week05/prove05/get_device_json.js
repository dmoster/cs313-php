function getDeviceJSON(username) {
  
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var locations = JSON.parse(this.responseText);

      displayDeviceGrid(locations);
      console.log(locations);
    }
  };

  xmlhttp.open("POST", "get_user_devices.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form/urlencoded");
  xmlhttp.send("username=" + username);
}