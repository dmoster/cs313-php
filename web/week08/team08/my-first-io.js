const fs = require('fs');

const filepath = process.argv[2];

const fileBuf = fs.readFileSync(filepath);
const lines = fileBuf.toString().split('\n');

const numNewlineChars = lines.length - 1;

console.log(numNewlineChars);