// Copy server location on click
function copyText(refButton) {

  var elementNum = refButton.id[4];
  var element = document.getElementById('server' + elementNum);

  element.select();
  document.execCommand('copy');

  refButton.innerHTML = 'Copied';
}


// Declare global variables
var devices = null;
var locations = null;
var locationIt = floorIt = deviceIt = 0;
var navString = devicesString = '';


// Declare classes
class Location {
  constructor(building, floors) {
    this.building = building;
    this.floors = floors;
  }
}

class Floor {
  constructor(name, devices) {
    this.name = name;
    this.devices = devices;
  }
}

class Device {
  constructor(address, label, notes, type, canFrame) {
    this.address= address;
    this.label = label;
    this.notes = notes;
    this.type = type;
    this.canFrame = canFrame;
  }
}


// Initial load
var deviceDisplay = document.getElementById('device-list');
var username = document.getElementById('username').innerHTML;

if (!deviceDisplay.innerHTML) {
  locations = getDeviceJSON(username);
  displayDeviceGrid();
}