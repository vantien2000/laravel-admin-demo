//khởi tạo socket.io
const io = require('socket.io')(8000);
console.log('listen ti port 8000');
//kiểm tra kết nối
io.on('errors',function(socket){
    console.log('errors connect');
});

io.on('connection',function(socket){
    console.log('a user connected '+socket.id);
});

//tạo kết nối redis để lắng nghe sự kiện
const Redis = require('ioredis');
const redis = new Redis(1000);

//đăng ký sự kiện
redis.psubscribe("*",function(err,count){

});

//bắt sự kiện gửi tin nhắn
redis.on('pmessage',function(partner,channel,message){
    console.log(partner);
    console.log(channel);
    console.log(message);
    //convert message sang kiểu JSON
    message = JSON.parse(message);
    //gửi tin nhắn
    io.emit(channel,message.data.message);
    //thông báo khi gửi thành công
    console.log('Send');
})

