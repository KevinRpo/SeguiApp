function validar() {
    //Recibir datos del formulario por medio del id
    var id, nombre, apellidos, email, tel, clave, confirmarClave, expresion;
    id = document.getElementById('id').value;
    nombre = document.getElementById('nombre').value;
    apellidos = document.getElementById('apellidos').value;
    email = document.getElementById('email').value;
    tel = document.getElementById('tel').value;
    clave = document.getElementById('clave').value;
    confirmarClave = document.getElementById('confirmarClave').value;

    //Expresión regular 
    expresion = /\w+@\w+\.+[a-z]/;

    //Comprobar si el campo está vacio
    if(id === "" || nombre === "" || apellidos === "" || email === "" || tel === "" || clave === "" || confirmarClave === ""){
        Swal.fire(
            'Ups!',
            'Todos los campos son obligatorios',
            'question'
        )
        return false;
    }
        //Comprobar cantidad de carácteres de los campos de texto del formulario
    else if (nombre.length>30){
        Swal.fire(
            'Ups!',
            'El nombre es muy largo',
            'error'
        )
        return false;
    } else if(nombre.length<4){
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
    } 
        //Comprobar que el la expresión se cumpla
    else if(!expresion.test(email)){
        Swal.fire(
            'Ups!',
            'El email no es válido',
            'error'
        )
        return false;
    } 
        //Comprobar que el campo de texto de la identificación sea un número
    else if(isNaN(id)){
        Swal.fire(
            'Ups!',
            'Tu identificación debe ser un número',
            'error'
        )
        return false;
    }
         //Comprobar que el campo de texto del teléfono sea un número
    else if(isNaN(tel)){
        Swal.fire(
            'Ups!',
            'El telefono debe ser un número',
            'error'
        )
        return false;
    }
        //Tamaño minimo del campo del texto del telefono
    else if(tel.length<7){
        Swal.fire(
            'Ups!',
            'Ingresa un número válido',
            'error'
        )
        return false;
    }
        //Comprobar que las contraseñas coincidan
    else if(clave != confirmarClave){
        Swal.fire(
            'Ups!',
            'Las contraseñas no coinciden',
            'error'
        )
        return false;
    }
    
}

function validarClave(){
    clave = document.getElementById('pass').value;
    confirmarClave = document.getElementById('pass_confirm').value;

    //Comprobar que las contraseñas coincidan
    if(clave != confirmarClave){
        Swal.fire(
            'Ups!',
            'Las contraseñas no coinciden',
            'error'
        )
        return false;
    }
}