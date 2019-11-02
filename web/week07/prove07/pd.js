// Copy server location on click
function copyText(refButton) {

  var elementNum = refButton.id[4];
  var element = document.getElementById('server' + elementNum);

  element.select();
  document.execCommand('copy');

  refButton.innerHTML = 'Copied';
}


// Compare passwords
function comparePw() {
  let pwField1 = document.getElementById('password');
  let pwField2 = document.getElementById('verify_pw');
  let signUpBtn = document.getElementById('sign_up_btn');

  const pw1 = pwField1.value;
  const pw2 = pwField2.value;

  if (pw1 === pw2) {
    pwField2.style.color = 'mediumseagreen';
    signUpBtn.style.display = '';
  }
  else {
    pwField2.style.color = 'tomato';
  }
}


// Declare global variables
var devices = locations = null;
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
  getDeviceJSON(username);
}