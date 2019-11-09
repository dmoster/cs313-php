const fs = require('fs');
const path = require('path');
const dirName = process.argv[2];
const fileExt = process.argv[3];

fs.readdir(dirName, function callback(err, list) {
  if (err) {
    return console.error(err);
  }
  else {
    list.forEach(element => {
      if (path.extname(element) === '.' + fileExt) {
        console.log(element);
      }
    });
  }
});