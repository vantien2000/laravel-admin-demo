@extends('layout.dashboard')
@section('section')
<!-- DIRECT CHAT -->
<div class="content-wrapper" id="page">
  <div class="card direct-chat direct-chat-primary">
      <div class="card-header">
        <h3 class="card-title">Direct Chat</h3>

        {{-- <div class="card-tools">
          <span title="3 New Messages" class="badge badge-primary">3</span>
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
            <i class="fas fa-comments"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div> --}}
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

        {{-- <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts">
          <ul class="contacts-list">
            <li>
              <a href="#">
                <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Count Dracula
                    <small class="contacts-list-date float-right">2/28/2015</small>
                  </span>
                  <span class="contacts-list-msg">How have you been? I was...</span>
                </div>
                <!-- /.contacts-list-info -->
              </a>
            </li>
            <!-- End Contact Item -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Sarah Doe
                    <small class="contacts-list-date float-right">2/23/2015</small>
                  </span>
                  <span class="contacts-list-msg">I will be waiting for...</span>
                </div>
                <!-- /.contacts-list-info -->
              </a>
            </li>
            <!-- End Contact Item -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Nadia Jolie
                    <small class="contacts-list-date float-right">2/20/2015</small>
                  </span>
                  <span class="contacts-list-msg">I'll call you back at...</span>
                </div>
                <!-- /.contacts-list-info -->
              </a>
            </li>
            <!-- End Contact Item -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Nora S. Vans
                    <small class="contacts-list-date float-right">2/10/2015</small>
                  </span>
                  <span class="contacts-list-msg">Where is your new...</span>
                </div>
                <!-- /.contacts-list-info -->
              </a>
            </li>
            <!-- End Contact Item -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    John K.
                    <small class="contacts-list-date float-right">1/27/2015</small>
                  </span>
                  <span class="contacts-list-msg">Can I take a look at...</span>
                </div>
                <!-- /.contacts-list-info -->
              </a>
            </li>
            <!-- End Contact Item -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Kenneth M.
                    <small class="contacts-list-date float-right">1/4/2015</small>
                  </span>
                  <span class="contacts-list-msg">Never mind I found...</span>
                </div>
                <!-- /.contacts-list-info -->
              </a>
            </li>
            <!-- End Contact Item -->
          </ul>
          <!-- /.contacts-list -->
        </div>
        <!-- /.direct-chat-pane --> --}}
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
    var socket = io('http://localhost:8000',{ transports: ['websocket', 'polling', 'flashsocket'] });
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