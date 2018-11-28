const SERVER_PORT = 6001
var io = require('socket.io')(SERVER_PORT)
console.log("Connect"+SERVER_PORT);
io.on('connection',function(socket){
	console.log("Co nguoi ket noi" + socket.id);
})
var Redis = require('ioredis')
var redis = new Redis(1000)
redis.psubscribe('*',function(error,count){
	
})
redis.on('pmessage',function(partner,channel,message){
	message = JSON.parse(message)
	io.emit(channel+":"+message.event,message.data.message)
	console.log("Send");
})
