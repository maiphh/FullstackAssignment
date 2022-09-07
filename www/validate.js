// const username = document.getElementById('username')
// const pwd = document.getElementById('pwd')
// const pwdrp = document.getElementById('pwdrp')
// const form = document.getElementById('signup-form')
//
// form.addEventListener('submit',(e)=> {
//   if(!(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/.test(username.value))) {
//     window.location.href = "signup.customers.php?error=invalidUsername"
//   }
//   if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(pwd.value))) {
//     window.location.href = "signup.customers.php?error=invalidPassword"
//   }
//   if(!(pwd!==pwdrp)) {
//     window.location.href = "signup.customers.php?error=passwordDontMatch"
//   }
//
//
// })

var username = document.getElementById('username')
var pwd = document.getElementById('pwd')
var pwdrp = document.getElementById('pwdrp')
var form = document.getElementById('signup-form')


function check() {
  if(!(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/.test(username.value))) {
    window.location.href = "signup.customers.php?error=invalidUsername"
    return false;
  }
  else if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(pwd.value))) {
    window.location.href = "signup.customers.php?error=invalidPassword"
    return false;
  }
  else if(pwd.value!==pwdrp.value) {
    window.location.href = "signup.customers.php?error=passwordDontMatch"
    return false;
  }
  return true;
}
