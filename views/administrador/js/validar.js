//Comprobar si estamos en la vista correspondiente
if(window.location.href.indexOf('perfil') > -1){
    function validar() {
        //Capturamos por medio del id el valor que tiene el campo del texto
        var nombre, apellidos, email, tel, clave, confirmarClave, expresion;
        nombre = document.getElementById('nombre').value;
        apellidos = document.getElementById('apellidos').value;
        email = document.getElementById('email').value;
        tel = document.getElementById('tel').value;
        clave = document.getElementById('clave').value;
        confirmarClave = document.getElementById('confirmar_clave').value;

        //Expresión regular 
        expresion = /\w+@\w+\.+[a-z]/;

        //Comprobar si el campo de texto está vacio
        if(nombre === "" || apellidos === "" || email === "" || tel === "" || clave === "" || confirmarClave === ""){
            Swal.fire(
                'Ups!',
                'No puedes dejar campos vacios',
                'question'
            )
            return false;
        }
        //Comprobar las longitudes de los campos de texto 
        else if (nombre.length<4 || nombre.length>30){
            Swal.fire(
                'Ups!',
                'El nombre es muy largo',
                'error'
            )
            return false;
        }else if(apellidos.length<5 || apellidos.length>50){
            Swal.fire(
                'Ups!',
                'Los apellidos son muy largos',
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
            }
            //Comprobar si las claves coinciden 
            else if (clave != confirmarClave){
            Swal.fire(
                'Ups!',
                'Las contraseñas no coinciden',
                'error'
            )
            return false;
        }
        //Comprobar si el campo de texto del teléfono es un número
        else if (isNaN(tel)){
            Swal.fire(
                'Ups!',
                'El telefono debe ser un número',
                'error'
            )
            return false;
        }

    }
}

//Comprobar si estamos en la vista correspondiente
if(window.location.href.indexOf('agregarAprendiz') > -1 ){
    function validarDatos(){
        var  id, nombre, apellidos, email, tel, ficha, nit, expresion;
        id = document.getElementById('id').value;
        nombre = document.getElementById('nombre').value;
        apellidos = document.getElementById('apellidos').value;
        email = document.getElementById('email').value;
        tel = document.getElementById('tel').value;
        ficha = document.getElementById('numero_ficha').value;
        nit = document.getElementById('nit').value;

        //Expresión regular 
        expresion = /\w+@\w+\.+[a-z]/;

          //Comprobar si el campo de texto está vacio
        if(id === "" || nombre === "" || apellidos === "" || email === "" || tel === "" || ficha === "" || nit === ""){
            Swal.fire(
                'Ups!',
                'No puedes dejar campos vacios',
                'question'
            )
            return false;
        }
        //Comprobar las longitudes de los campos de texto 
        else if (nombre.length<4 || nombre.length>30){
            Swal.fire(
                'Ups!',
                'Ingresa un nombre válido',
                'error'
            )
            return false;
        }else if(apellidos.length<5 || apellidos.length>50){
            Swal.fire(
                'Ups!',
                'Ingresa apellidos válidos',
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
        }else if(tel.length<7 || tel.lenth>20){
            Swal.fire(
                'Ups!',
                'Ingresa un número válido',
                'error'
             )
            return false;
        }else if(ficha.length<2 || ficha.length>20){
            Swal.fire(
                'Ups!',
                'Ingresa una ficha válida',
                'error'
             )
            return false;
        }
        //Comprobar si el campo de texto del teléfono, identificacion, ficha o nit no son un números
        else if (isNaN(tel) || isNaN(id) || isNaN(ficha) || isNaN(nit)){
            Swal.fire(
                'Ups!',
                'El campo telefono, identificación, ficha y/o NIT deben ser números',
                'error'
            )
            return false;
        }
    }
}

if(window.location.href.indexOf('agregarInstructor') > -1 ){
    function validarDatosInstructor(){
        var  id, nombre, apellidos, email, tel, programa, expresion;
        id = document.getElementById('id').value;
        nombre = document.getElementById('nombre').value;
        apellidos = document.getElementById('apellidos').value;
        email = document.getElementById('email').value;
        tel = document.getElementById('tel').value;
        programa = document.getElementById('programa').value;

        //Expresión regular 
        expresion = /\w+@\w+\.+[a-z]/;

          //Comprobar si el campo de texto está vacio
        if(id === "" || nombre === "" || apellidos === "" || email === "" || tel === "" || programa === "" ){
            Swal.fire(
                'Ups!',
                'No puedes dejar campos vacios',
                'question'
            )
            return false;
        }
        //Comprobar las longitudes de los campos de texto 
        else if (nombre.length<4 || nombre.length>30){
            Swal.fire(
                'Ups!',
                'Ingresa un nombre válido',
                'error'
            )
            return false;
        }else if(apellidos.length<5 || apellidos.length>50){
            Swal.fire(
                'Ups!',
                'Ingrese apellidos válidos',
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
        }else if(tel.length<7 || tel.lenth>20){
            Swal.fire(
                'Ups!',
                'Ingresa un número válido',
                'error'
             )
            return false;
        }else if(programa.length<2 || programa.length>100){
            Swal.fire(
                'Ups!',
                'Ingresa una programa válido',
                'error'
             )
            return false;
        }
        //Comprobar si el campo de texto del teléfono o la identificacion son un números
        else if (isNaN(tel) || isNaN(id)){
            Swal.fire(
                'Ups!',
                'El campo telefono e identificación deben ser números',
                'error'
            )
            return false;
        }
    }
}

