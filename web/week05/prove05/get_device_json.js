function getDeviceJSON() {
  
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      locations = JSON.parse(this.responseText);
    }
  };

  xmlhttp.open("POST", "get_user_devices.php", true);
  xmlhttp.send();
}