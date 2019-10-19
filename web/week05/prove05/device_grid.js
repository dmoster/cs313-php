// Add devices
function addDeviceGrid(device) {
  devices.push(new Device(
    device.address,
    device.label,
    device.notes,
    device.type,
    device.canFrame
  ));

  var deviceString = '';

  deviceString += '<div id="device' +
    deviceIt + '" class="device device-grid"><p class="device-label">' +
    device.label + '</p><p class="description">' +
    device.notes + '</p><div class="action-items">';

  if (device.type == 'Print Server') {
    deviceString += '<input id="server' +
      deviceIt + '" class="small copy-field" type="text" value="' +
      device.address + '" readonly><button id="copy' +
      deviceIt++ + '" class="btn small copy-btn" onclick="copyText(this)">Copy</button>';
  }
  else {
    deviceString += '<a href="' +
      device.address + '" class="btn small view" target="_blank">View</a>';
  }

  deviceString += '</div></div>';

  return deviceString;
}


// Add floors
function addFloorGrid(floor) {

  if (floor.name != '') {
    navString += '<li><a href="#floor' + floorIt + '">' + floor.name + '</li>';
  }

  var floorString = '';

  floorString += '<div id="floor' +
    floorIt++ + '" class="floor"><h3 class="floor-name">' +
    floor.name + '</h3><div class="flex-container">';

  for (var i = 0; i < floor.devices.length; i++) {
    floorString += addDeviceGrid(floor.devices[i]);
  }

  floorString += '</div></div>';

  return floorString;
}


// Add locations
function addLocationGrid(location) {

  navString += '<li><a href="#location' + locationIt + '"';
  if (locationIt == 0) {
    navString += ' class="radius-tr"';
  }
  else if (locationIt == locations.length - 1) {
    navString += ' class="radius-br"';
  }
  navString += '>' + location.building + '</a><ul>';

  var locationString = '';

  locationString += '<div id="location' +
    locationIt++ + '" class="card location"><h2>' +
    location.building + '</h2>';

  for (var i = 0; i < location.floors.length; i++) {
    locationString += addFloorGrid(location.floors[i]);
  }

  locationString += '</div>';
  navString += '</ul></li>'

  return locationString;
}


// Populate screen with a list of devices
function displayDeviceGrid(locations) {

  locationIt = floorIt = deviceIt = 0;

  navString = '<ul>';
  
  devicesString = '';
  devices = new Array();

  for (var i = 0; i < locations.length; i++) {
    devicesString += addLocationGrid(locations[i]);
  }

  navString += '</ul>';

  document.getElementById('device-list').innerHTML = devicesString;
  document.getElementById('main-nav').innerHTML = navString;
}