var username = document.getElementById("username");
var pwd = document.getElementById("pwd");
var pwdrp = document.getElementById("pwdrp");
var form = document.getElementById("signup-form");

function checkC() {
    if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/.test(username.value)) {
        window.location.href = "signup.customers.php?error=invalidUsername";
        return false;
    } else if (
        !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(
            pwd.value
        )
    ) {
        window.location.href = "signup.customers.php?error=invalidPassword";
        return false;
    } else if (pwd.value !== pwdrp.value) {
        window.location.href = "signup.customers.php?error=passwordDontMatch";
        return false;
    }
    return true;
}

function checkV() {
    if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/.test(username.value)) {
        window.location.href = "signup.vendors.php?error=invalidUsername";
        return false;
    } else if (
        !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(
            pwd.value
        )
    ) {
        window.location.href = "signup.vendors.php?error=invalidPassword";
        return false;
    } else if (pwd.value !== pwdrp.value) {
        window.location.href = "signup.vendors.php?error=passwordDontMatch";
        return false;
    }
    return true;
}

function checkS() {
    if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,15}$/.test(username.value)) {
        window.location.href = "signup.shippers.php?error=invalidUsername";
        return false;
    } else if (
        !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(
            pwd.value
        )
    ) {
        window.location.href = "signup.shippers.php?error=invalidPassword";
        return false;
    } else if (pwd.value !== pwdrp.value) {
        window.location.href = "signup.shippers.php?error=passwordDontMatch";
        return false;
    }
    return true;
}
