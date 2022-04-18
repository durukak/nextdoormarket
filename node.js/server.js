var express = require('express');
var app = express();
var http = require('http').Server(app); 
var io = require('socket.io')(http);  

app.get('/',function(req, res){  
  res.sendFile(__dirname + '/client.html');
});

var count=1;
io.on('connection', function(socket){ 
  console.log('user connected: ', socket.id); 
  var name = "user" + count++;                
  io.to(socket.id).emit('change name',name);  

  socket.on('disconnect', function(){ 
    console.log('user disconnected: ', socket.id);
  });

  socket.on('send message', function(name,text){
    var msg = name + ' : ' + text;5
    io.emit('receive message', msg);
  });
});

http.listen(8080, function(){
  console.log('localhost:8080 server started...');
});

const options = {
    url: 'http://localhost:80/ItemsInfo.php',
    method: 'POST',
    json: true
  };