function getDeviceJSON(username) {
  
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      locations = new Array();
      locations = JSON.parse(this.responseText);
    }
  };

  xmlhttp.open("GET", "get_user_devices.php?username=" + username, true);
  xmlhttp.send();
}