'use strict'
const http = require('http')
const portNum = Number(process.argv[2])
const map = require('through2-map')

const server = http.createServer((request, response) => {
  if (request.method != 'POST') {
    return response.end('This module for POST only')
  }

  request.pipe(map((chunk) => {
    return chunk.toString().toUpperCase()
  })).pipe(response)
})

server.listen(portNum)


// Solution
// 'use strict'
// const http = require('http')
// const map = require('through2-map')

// const server = http.createServer(function (req, res) {
//   if (req.method !== 'POST') {
//     return res.end('send me a POST\n')
//   }

//   req.pipe(map(function (chunk) {
//     return chunk.toString().toUpperCase()
//   })).pipe(res)
// })

// server.listen(Number(process.argv[2]))