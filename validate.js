const username = document.getElementById('username')
const pwd = document.getElementById('pwd')
const pwdrp = document.getElementById('pwdrp')
const form = document.getElementById('signup-form')

form.addEventListener('submit',(e)=> {
  if(!(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/.test(username.value))) {
    window.location.href = "signup.customers.php?error=invalidUsername"
  }
  if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(pwd.value))) {
    window.location.href = "signup.customers.php?error=invalidPassword"
  }
  if(!(pwd!==pwdrp)) {
    window.location.href = "signup.customers.php?error=passwordDontMatch"
  }


})