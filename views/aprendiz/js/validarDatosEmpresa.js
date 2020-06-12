function validarDatosEmpresa(){
    var nit, nombre_empresa, direccion, tel, email, nombre_jefe, expresion;

    nit = document.getElementById('nit').value;
    nombre_empresa = document.getElementById('nombre_empresa').value;
    direccion = document.getElementById('direccion').value;
    tel = document.getElementById('tel').value;
    email = document.getElementById('email').value;
    nombre_jefe = document.getElementById('nombre_jefe').value;

    expresion = /\w+@\w+\.+[a-z]/;

    if(nit === "" || nombre_empresa === "" || direccion === "" || tel === "" || email === "" || nombre_jefe === ""){
        Swal.fire(
            "Ups!",
            "No puedes dejar campos vacios", 
            "question"
        );
        return false;
    }else if (nit.length < 3 || nit.length > 50){
        Swal.fire(
            "Ups!",
            "Ingresa un NIT válido", 
            "error"
        );
        return false;
    }else if (nombre_empresa.length < 3 || nombre_empresa.length > 50){
        Swal.fire(
            "Ups!",
            "Ingresa un nombre válido", 
            "error"
        );
        return false;
    }else if (direccion.length < 3 || direccion.length > 50){
        Swal.fire(
            "Ups!",
            "Ingresa una dirección válida", 
            "error"
        );
        return false;
    }else if (isNaN(tel)){
        Swal.fire(
            "Ups!",
            "Ingresa un teléfono válido", 
            "error"
        );
        return false;
    }else if (tel.length < 7 || tel.length > 20){
        Swal.fire(
            "Ups!",
            "Ingresa un teléfono válido", 
            "error"
        );
        return false;
    }else if(!expresion.test(email)){
        Swal.fire(
            "Ups!",
            "Ingresa un email válido", 
            "error"
        );
        return false;
    }else if(nombre_jefe.length < 3 || nombre_jefe.length > 50){
        Swal.fire(
            "Ups!",
            "Ingresa el nombre del jefe correctamente", 
            "error"
        );
        return false;
    }

}