var socket = io.connect('http://192.168.0.2:6677', { 'forceNew': true });

//Ribimos lo que emite el envento socket 
socket.on('messages', function(data){
    console.log(data);
    render(data);
});

//Mostramos los datos en la pantalla
function render(data){
    var html = data.map(function(message, index){
        return `
            <div class="message">
                <strong>${message.identificacion}</strong>dice: 
                <p>${message.text}</p>
            </div>`
        ;
    }).join(' ');

    //Mostrar en el index el mensaje dado en la funcion anterior
    var div_mssg = document.getElementById("messages")
    div_mssg.innerHTML = html;

    //Mostrar los últimos mensajes enviados con el scroll
    div_mssg.scrollTop = div_mssg.scrollHeight;

}

//Mostramos los mensajes de los usuarios
function addMessage(e){
    var message = {
        identificacion: document.getElementById('id').value,
        text: document.getElementById('text').value
    }

    //Quitamos el input del id para no volver a repetir el proceso 
    document.getElementById('id').style.display = 'none';
    socket.emit('add-message', message);

    return false;
}