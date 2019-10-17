// Search for a device on the list
function findDevice() {

  var input, filter, locations, floors, devices, floorsHidden, devicesHidden, deviceLabel, i, j, k, txtValue;

  input = document.getElementById('search');
  filter = input.value.toUpperCase();
  locations = document.getElementsByClassName('location');

  for (i = 0; i < locations.length; i++) {
    floors = locations[i].getElementsByClassName('floor');
    floorsHidden = 0;

    for (j = 0; j < floors.length; j++) {
      devices = floors[j].getElementsByClassName('device');
      devicesHidden = 0;

      for (k = 0; k < devices.length; k++) {
        deviceLabel = devices[k].getElementsByClassName('device-label')[0];
        txtValue = deviceLabel.textContent || deviceLabel.innerText;
    
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          devices[k].style.display = '';
        }
        else {
          devices[k].style.display = 'none';
          devicesHidden++;
        }
      }

      if (devicesHidden == devices.length) {
        floors[j].style.display = 'none';
        floorsHidden++;
      }
      else {
        floors[j].style.display = '';
      }
    }

    if (floorsHidden == floors.length) {
      locations[i].style.display = 'none';
    }
    else {
      locations[i].style.display = '';
    }
  }
}


// Clear searches and display again
function clearSearch() {
  var locations, floors, devices, i;

  locations = document.getElementsByClassName('location');
  floors = document.getElementsByClassName('floor');
  devices = document.getElementsByClassName('device');

  for (i = 0; i < locations.length; i++) {
    locations[i].style.display = '';
  }
  for (i = 0; i < floors.length; i++) {
    floors[i].style.display = '';
  }
  for (i = 0; i < devices.length; i++) {
    devices[i].style.display = '';
  }
}