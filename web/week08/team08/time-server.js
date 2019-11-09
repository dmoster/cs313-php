// const net = require('net')
// const portNum = process.argv[2]

// const server = net.createServer((socket) => {
//   const date = new Date()
//   let y = date.getFullYear()
//   let m = ('0' + (date.getMonth() + 1)).slice(-2)
//   let d = ('0' + (date.getDate())).slice(-2)
//   let hr = ('0' + (date.getHours())).slice(-2)
//   let min = ('0' + (date.getMinutes())).slice(-2)

//   let data = y + '-' + m + '-' + d + ' ' + hr + ':' + min

//   socket.end(data)
// })

// server.listen(portNum)


// Solution
var net = require('net')

function zeroFill (i) {
  return (i < 10 ? '0' : '') + i
}

function now () {
  var d = new Date()
  
  return d.getFullYear() + '-'
    + zeroFill(d.getMonth() + 1) + '-'
    + zeroFill(d.getDate()) + ' '
    + zeroFill(d.getHours()) + ':'
    + zeroFill(d.getMinutes())
}

var server = net.createServer((socket) => {
  socket.end(now() + '\n')
})

server.listen(Number(process.argv[2]))