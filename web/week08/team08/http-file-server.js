'use strict'
const fs = require('fs')
const http = require('http')
const portNum = process.argv[2]
const filename = process.argv[3]

const server = http.createServer((request, response) => {
  fs.createReadStream(filename).pipe(response)
})

server.listen(portNum)


// Solution
// 'use strict'
// const http = require('http')
// const fs = require('fs')

// const server = http.createServer(function (req, res) {
//   res.writeHead(200, { 'content-type': 'text/plain' })

//   fs.createReadStream(process.argv[3]).pipe(res)
// })

// server.listen(Number(process.argv[2]))