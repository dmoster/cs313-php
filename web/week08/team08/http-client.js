const url = process.argv[2];
const http = require('http');

http.get(url, callback);

function callback(response) {
  response.setEncoding('utf8');
  response.on('data', function (data) {
    console.log(data);
  });
}


// Solution
// 'use strict'
// const http = require('http')

// http.get(process.argv[2], function (response) {
//   response.setEncoding('utf8')
//   response.on('data', console.log)
//   response.on('error', console.error)
// }).on('error', console.error)