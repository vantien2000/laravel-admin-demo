<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="" id="data">
        @foreach ($messages as $message)
            <p id="{{ $message->id }}"><strong>{{ $message->author }}</strong>: {{ $message->body }}</p>
        @endforeach
    </div>
    <div class="">
        {{-- <form action="send-message" method="POST"> --}}
            @csrf
            Name: <input name="author" type="text">
            <br>
            <br>
            Content: <textarea name="body" id="" cols="30" rows="10"></textarea>
            <br>
            <button type="submit" name="send">Gửi</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.min.js"></script>
    
    <script>
        //bắt xự kiện gửi tin nhắn
        var socket = io('http://localhost:8000',{ transports: ['websocket', 'polling', 'flashsocket'] });
        //bắt dữ liệu từ emit
        socket.on('laravel_database_chat:message',function(data){//tham số thứ nhất là event đc gửi sang
            // console.log(data)
            // kiểm tra nếu id đã có thì ko thêm tin nhắn
            if($("#"+data.id).length == 0){
                $("#data").append('<p><strong>'+data.author+'</strong>: '+data.body+'</p>')
            }else{
                console.log('Đã có tin nhắn!!')
            }
            
        })
    </script>
</body>
</html>