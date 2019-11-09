'use strict'
const http = require('http')
const port = 8888

const server = http.createServer(onRequest)

function onRequest(req, res) {
  const url = new URL(req.url, 'http://localhost:' + port)
  const urlPath = url.pathname
  
  const style = '<style>' +
    '* { box-sizing: border-box; margin: 0; padding: 0; }' +
    'body { min-height: 100vh; padding: 10px; background-color: slateblue; color: whitesmoke; display: flex; flex-direction: column; align-items: center; justify-content: space-around; font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; }' +
    'main { max-width: 400px; margin: 30px 0; }' +
    'main * { margin: 20px 0; }' +
    'code { color: orange; }' +
    'a { color: dodgerblue; }' +
    '</style>'
  
  let result

  if (urlPath === '/home') {
    const user = url.searchParams.get('user')
    let heading

    if (user) {
      heading = '  <h1>Welcome to the Home Page, ' + user + '!</h1>'
    }
    else {
      heading = '  <h1>Welcome to the Home Page</h1>'
    }

    result =  '<!DOCTYPE html>' +
    '<html lang="en">' +
    '<head>' +
    '  <meta charset="UTF-8">' +
    '  <meta name="viewport" content="width=device-width, initial-scale=1.0">' +
    '  <meta http-equiv="X-UA-Compatible" content="ie=edge">' +
    style +
    '  <title>Home</title>' +
    '</head>' +
    '<body>' +
    '<main>' +
    heading +
    '  <p>If you\'d like to personalize your experience a bit more, try adding <code>?user=[your name]</code> to the URL and see what happens!</p>' +
    '  <a href="/getData">/getData</a>' +
    '</main>' +
    '</body>' +
    '</html>'

    res.writeHead(200, { "Content-Type": "text/html" })
  }
  else if (urlPath === '/getData') {
    result =  {
      name: "Daniel Moster",
      class: "cs313"
    }
    result = JSON.stringify(result)

    res.writeHead(200, { "Content-Type": "application/json" })
  }
  else {
    result =  '<!DOCTYPE html>' +
    '<html lang="en">' +
    '<head>' +
    '  <meta charset="UTF-8">' +
    '  <meta name="viewport" content="width=device-width, initial-scale=1.0">' +
    '  <meta http-equiv="X-UA-Compatible" content="ie=edge">' +
    style +
    '  <title>404 Error</title>' +
    '</head>' +
    '<body>' +
    '<main>' +
    '  <h1>Page Not Found</h1>' +
    '  <p>Try visiting <a href="/home">/home</a> or <a href="/getData">/getData</a> if you\'d like to look around.</p>' +
    '</main>' +
    '</body>' +
    '</html>'    

    res.writeHead(404, { "Content-Type": "text/html" })
  }

  res.end(result)
}

server.listen(port)