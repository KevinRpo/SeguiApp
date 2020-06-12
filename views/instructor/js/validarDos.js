function validar() {
    
    var correo, mensaje, fecha, expresion;
    var date = new Date();
    var fecha_actual = date.getDay() + '-' + date.getMonth() + '-' + date.getFullYear();

    //Recogemos los datos de los campos 
    correo = document.getElementById('correo_jefe').value;
    mensaje = document.getElementById('mensaje').value;
    fecha = document.getElementById('fecha').value;
    expresion = /\w+@\w+\.+[a-z]/;

    if(!expresion.test(correo)){
        Swal.fire(
            "Ups!",
            "Ingresa un email válido", 
            "error"
        );
        return false;
    }else if(mensaje.length < 5){
        Swal.fire(
            "Ups!",
            "El campo del mensaje debe tener más de cinco caracteres", 
            "error"
        );
        return false;
    }else if(fecha < fecha_actual){
        Swal.fire(
            "Ups!",
            "La fecha establecida no es correcta", 
            "error"
        );
        return false;
    }

}