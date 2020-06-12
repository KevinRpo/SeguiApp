function validarDatos() {
    var id_aprendiz,
        nombre_aprendiz,
        apellidos_aprendiz,
        ficha_aprendiz,
        direccion_empresa,
        id_instructor,
        nombre_instructor,
        apellidos_instructor,
        telefono_instructor,
        expresion;

    //Datos del aprendiz
    id_aprendiz = document.getElementById("id_aprendiz").value;
    nombre_aprendiz = document.getElementById("nombre_aprendiz").value;
    apellidos_aprendiz = document.getElementById("apellidos_aprendiz").value;
    ficha_aprendiz = document.getElementById("ficha_aprendiz").value;
    direccion_empresa = document.getElementById("direccion_aprendiz").value;

    //Datos del instructor
    id_instructor = document.getElementById("id_instructor").value;
    nombre_instructor = document.getElementById("nombre_instructor").value;
    apellidos_instructor = document.getElementById("apellidos_instructor").value;
    telefono_instructor = document.getElementById("telefono_instructor").value;
    email = document.getElementById("correo_instructor").value;

    //Expresión regular
    expresion = /\w+@\w+\.+[a-z]/;

    //Comprobar si el campo de texto está vacio
    if (
        id_aprendiz === "" ||
        nombre_aprendiz === "" ||
        apellidos_aprendiz === "" ||
        ficha_aprendiz === "" ||
        direccion_empresa === "" ||
        id_instructor === "" ||
        nombre_instructor === "" ||
        apellidos_instructor === "" ||
        telefono_instructor === "" ||
        email === ""
    ) {
        Swal.fire("Ups!", "No puedes dejar campos vacios", "question");
        return false;
    }
    //Comprobar las longitudes de los campos de texto
    else if (
        nombre_aprendiz.length < 3 ||
        nombre_aprendiz.length > 30 ||
        nombre_instructor < 4 ||
        nombre_instructor > 100
    ) {
        Swal.fire("Ups!", "Ingresa un nombre válido", "error");
        return false;
    } else if (
        apellidos_aprendiz.length < 5 ||
        apellidos_aprendiz.length > 50 ||
        apellidos_instructor < 4 ||
        apellidos_instructor > 100
    ) {
        Swal.fire("Ups!", "Ingrese apellidos válidos", "error");
        return false;
    } else if (!expresion.test(email)) {
        Swal.fire("Ups!", "El email no es válido", "error");
        return false;
    } else if (telefono_instructor.length < 7 || telefono_instructor.lenth > 20) {
        Swal.fire("Ups!", "Ingresa un número válido", "error");
        return false;
    } else if (ficha_aprendiz.length < 2 || ficha_aprendiz.length > 20) {
        Swal.fire("Ups!", "Ingresa una ficha válida", "error");
        return false;
    } else if (direccion_empresa < 5 || direccion_empresa > 100) {
        Swal.fire("Ups!", "Ingresa una dirección válida", "error");
        return false;
    }
    //Comprobar si el campo de texto del teléfono o la identificacion son un números
    else if (
        isNaN(telefono_instructor) ||
        isNaN(id_instructor) ||
        isNaN(id_aprendiz)
    ) {
        Swal.fire(
            "Ups!",
            "El campo telefono e identificación deben ser números",
            "error"
        );
        return false;
    }
}
