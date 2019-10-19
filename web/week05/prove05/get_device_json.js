function getDeviceJSON(username) {
  
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("JSON: " + this.responseText);
      locations = JSON.parse(this.responseText);
      console.log("Locations: " + locations);
    }
  };

  xmlhttp.open("POST", "get_user_devices.php", true);
  xmlhttp.send("username=" + username);
}