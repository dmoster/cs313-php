$(document).ready(function() {
  $('#alert-btn').click(function() {
    alert("Clicked!");
  });
  
  $('#color-setter').click(function() {
    $('#div1').css('background-color', $('#div1-color').val());
  });

  $('#div3-toggle').click(function() {
    $('#div3').fadeToggle();
  });
});
