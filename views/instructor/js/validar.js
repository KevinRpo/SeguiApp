function validar() {
    var id, nombre, apellidos, email, tel, clave, confirmarClave, expresion;
    nombre = document.getElementById('nombre').value;
    apellidos = document.getElementById('apellidos').value;
    email = document.getElementById('email').value;
    tel = document.getElementById('tel').value;
    clave = document.getElementById('clave').value;
    confirmarClave = document.getElementById('confirmar_clave').value;

    expresion = /\w+@\w+\.+[a-z]/;

    if(nombre === "" || apellidos === "" || email === "" || tel === "" || clave === "" || confirmarClave === ""){
        Swal.fire(
            'Ups!',
            'No puedes dejar campos vacios',
            'question'
        )
        return false;
    }else if (nombre.length>30){
        Swal.fire(
            'Ups!',
            'El nombre es muy largo',
            'error'
        )
        return false;
    }else if(nombre.length<4){
        Swal.fire(
            'Ups!',
            'El nombre es muy corto',
            'error'
        )
        return false;
    }else if(apellidos.length>50){
        Swal.fire(
            'Ups!',
            'Los apellidos son muy largos',
            'error'
        )
        return false;
    }else if(apellidos.length<5){
        Swal.fire(
            'Ups!',
            'Los apellidos son muy cortos',
            'error'
        )
        return false;
    }else if(!expresion.test(email)){
        Swal.fire(
            'Ups!',
            'El email no es válido',
            'error'
        )
        return false;
        }else if (clave != confirmarClave){
        Swal.fire(
            'Ups!',
            'Las contraseñas no coinciden',
            'error'
        )
        return false;
    }else if (isNaN(tel)){
        Swal.fire(
            'Ups!',
            'El telefono y la ficha debe ser un número',
            'error'
        )
        return false;
    }
}