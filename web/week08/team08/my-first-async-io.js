const fs = require('fs');

const filename = process.argv[2];

function printLen(err, data) {
  if (err) {
    console.error(err);
  }
  else {
    const numNewLineChars = data.split('\n').length - 1;
    console.log(numNewLineChars);
  }
}

fs.readFile(filename, 'utf8', printLen);