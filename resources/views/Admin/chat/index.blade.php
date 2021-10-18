@extends('Admin.layout.dashboard')
@section('section')
<!-- DIRECT CHAT -->
<div class="content-wrapper" id="page">
  <div class="card direct-chat direct-chat-primary">
      <div class="card-header">
        <h3 class="card-title">Direct Chat</h3>

        <div class="card-tools">
          <span title="3 New Messages" class="badge badge-primary">{{ session('count') }}</span>
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <!-- Conversations are loaded here -->
        <div id="data" class="direct-chat-messages">
          <!-- Message. Default to the left -->
          @foreach($messages as $message)
              @if($message->users->id != Auth::user()->id)
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">{{ $message->users->name }}</span>
                    <span class="direct-chat-timestamp float-right">{{ $message->created_at }}</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="admin/dist/img/{{ $message->users->avatar }}" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    {{ $message->body }}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
              @else
                <!-- Message to the right -->
                <div id="{{ $message->id }}" class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">{{ $message->users->name }}</span>
                    <span class="direct-chat-timestamp float-left">{{ $message->created_at }}</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="admin/dist/img/{{ $message->users->avatar }}" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    {{ $message->body }}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
              @endif
            <!-- /.direct-chat-msg -->

            
          @endforeach
          <!-- /.direct-chat-msg -->
        </div>
        <!--/.direct-chat-messages-->
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <form action="{{ URL('send-message') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="input-group">
            <input type="text" name="body" placeholder="Type Message ..." class="form-control">
            <span class="input-group-append">
              <button id="sbm" data-id="{{ Auth::user()->id }}" type="submit" class="btn btn-primary">Send</button>
            </span>
          </div>
        </form>
      </div>
      <!-- /.card-footer-->
  </div>
  <!--/.direct-chat -->
</div>
@stop

@push('chatbox')
  <script>
    //bắt sự kiện sau khi gửi tin nhắn
    var socket = io('http://localhost:8000/admin',{ transports: ['websocket', 'polling', 'flashsocket'] });
    //xử lý thông tin sau khi gửi  
    socket.on('laravel_database_chat',function(data){
      console.log(data.users.name);
        if($('#'+data.id).length == 0)
        {
          $("#data").append('<div class="direct-chat-msg">'+
          '<div class="direct-chat-infos clearfix">'+
          '<span class="direct-chat-name float-right">'+data.users.name+'</span>'+
            '<span class="direct-chat-timestamp float-left">'+data.created_at+'</span></div>'+
          '<img class="direct-chat-img" src="admin/dist/img/'+data.users.avatar+'" alt="message user image">'+
          '<div class="direct-chat-text">'+data.body+'</div></div>');
        }else{
          console.log('Đã có tin nhắn!!')
        }

        // window.location.reload();
    });
  </script>
@endpush