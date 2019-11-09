// const http = require('http')
// const parsetimePath = '/api/parsetime'
// const unixtimePath = '/api/unixtime'

// const server = http.createServer((request, response) => {
//   if (request.method !== 'GET')
//     return response.end('Send me a GET\n')
  
//   response.writeHead(200, { 'Content-Type': 'application/json' })
//   const url = new URL(request.url)
//   const d = new Date(url.searchParams.get('iso'))

//   if (url.pathname === parsetimePath) {
//     const hr = d.getHours()
//     const min = d.getMinutes()
//     const sec = d.getSeconds()

//     return response.end(
//       '{ "hour": ' + hr +
//       ', "minute": ' + min +
//       ', "second": ' + sec +
//       '}'
//       )
//   }
//   else if (url.pathname === unixtimePath) {
//     const unixtime = d.getTime()

//     return response.end(
//       '{ "unixtime": ' + unixtime + ' }'
//     )
//   }
// })

// server.listen(Number(process.argv[2]))


// Solution
'use strict'
const http = require('http')

function parsetime (time) {
  return {
    hour: time.getHours(),
    minute: time.getMinutes(),
    second: time.getSeconds()
  }
}

function unixtime (time) {
  return { unixtime: time.getTime() }
}

const server = http.createServer(function (req, res) {
  const parsedUrl = new URL(req.url, 'http://example.com')
  const time = new Date(parsedUrl.searchParams.get('iso'))
  let result

  if (/^\/api\/parsetime/.test(req.url)) {
    result = parsetime(time)
  } else if (/^\/api\/unixtime/.test(req.url)) {
    result = unixtime(time)
  }

  if (result) {
    res.writeHead(200, { 'Content-Type': 'application/json' })
    res.end(JSON.stringify(result))
  } else {
    res.writeHead(404)
    res.end()
  }
})
server.listen(Number(process.argv[2]))