var http = require("http");
var express = require("express");
var app = express();
var server = http.createServer(app);
var io = require('socket.io').listen(server);
var path = require('path');
var usernames = [];



app.get('/', function(req, res){
  res.sendFile(__dirname + '/TarHeelSettlers_Mockup.html');
  app.use(express.static(path.join(__dirname, 'public')));
  
});

io.on('connection', function(socket){
	console.log('a user was added');
  socket.on('chat message', function(msg){
  	console.log('message: ' + msg);
    io.emit('chat message', msg);

  });
   socket.on('turn event', function (msg) {
        console.log("Turn Over Button Pressed!");
    });
});

server.listen(process.env.PORT || 3000, function(){
  console.log('listening on *:3000');
});
