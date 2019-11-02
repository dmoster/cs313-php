// Compare passwords
function comparePw() {
  let pwField1 = document.getElementById('password');
  let pwField2 = document.getElementById('pw_verify');
  let signUpBtn = document.getElementById('sign_up_btn');

  const pw1 = pwField1.value;
  const pw2 = pwField2.value;

  if (pw1 === pw2) {
    pwField2.style.color = 'mediumseagreen';
    signUpBtn.style.display = 'block';
  }
  else {
    pwField2.style.color = 'tomato';
  }
}