// Stretch main app to fill remainder of viewport
function setView() {
  const windowHt = $(window).outerHeight(true)
  const headerHt = $('#header').outerHeight(true)
  const mainHt = $('#main').outerHeight(true)
  const footerHt = $('#footer').outerHeight(true)

  if (mainHt < (windowHt - headerHt - footerHt)) {
    $('#main').outerHeight(windowHt - headerHt - footerHt)
  }
}

// Set up main header
let header = $('#header')
let nav = $('#nav')
let main = $('#main')
let footer = $('#footer')

header.html('<span>Y</span>' + header.html())


// Update view
function update() {

}

setView()