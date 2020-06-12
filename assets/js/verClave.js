//Cambiar el tipo del input de password a text
function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

//Cambiar el tipo del input de text a password 
function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

//Función para ver contraseña 
document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);
