//Importamos las libreria y dependencias 
var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(server);

//Vista
app.use(express.static('client'));

//Rutas
app.get('/hola-mundo', function(req, res){
   res.status(200).send('Hola Mundo');
});

//Mensaje de bienvenda a los usuarios
var messages = [{
    id: 1,
    text: 'Esperamos te sea de mucha utilidad.',
    identificacion: 'SeguiApp'
}];

//Usuarios
io.on('connection', function(socket){
    console.log("El usuario con IP: " + socket.handshake.address + " se ha conectado.");

    //Enviar o emitir mensaje a todos los clientes cuando se conecten 
    socket.emit('messages', messages);

    socket.on('add-message', function(data){
        messages.push(data);

        io.sockets.emit('messages', messages);
    });
});

//Servidor de Express
server.listen(6677, function(){
    console.log("Funciona");
});