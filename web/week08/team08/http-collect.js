'use strict'
const url = process.argv[2]
const http = require('http')
const bl = require('bl')

http.get(url, (response) => {
  response.pipe(bl((err, data) => {
    if (err) {
      console.log(err.toString())
    }
    else {
      console.log(data.toString().length)
      console.log(data.toString())
    }
  }))
  
}).on('error', console.error)


// Solution
// 'use strict'
// const http = require('http')
// const bl = require('bl')

// http.get(process.argv[2], function (response) {
//   response.pipe(bl(function (err, data) {
//     if (err) {
//       return console.error(err)
//     }
//     data = data.toString()
//     console.log(data.length)
//     console.log(data)
//   }))
// })