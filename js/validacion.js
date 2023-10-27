function validarUser(user) {
    const regex = /^[a-zA-Z]*$/;
    return regex.test(user);
}

document.addEventListener("DOMContentLoaded", function () {
    const userF = document.getElementById('user');
    const passF = document.getElementById('pass');

    userF.addEventListener('input', function () {
        const user = document.getElementById('user');
        const alertauser = document.getElementById('alertauser');

        if (validarUser(user.value)) {
            alertauser.style.display = 'none';
        } else if (user.value.length < 1) {
            alertauser.style.display = 'none';
        } else {
            alertauser.style.display = 'block';
        }
    });

    passF.addEventListener('input', function () {
        const pass = document.getElementById('pass');
        const alertapass = document.getElementById('alertapass');

        if (pass.value.length < 1) {
            alertapass.style.display = 'none';
        } else if (pass.value.length < 9) {
            alertapass.style.display = 'block';
        } else {
            alertapass.style.display = 'none';
        }
    });
});


