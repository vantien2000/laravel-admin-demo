<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
   <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button{
      padding: 0px;
    }
   </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  @yield('body')
  
  @if (session('message'))
      <script>alert('<?php echo session('message'); ?>');</script>
  @endif
  <!-- jQuery -->
  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
  <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('backend/dist/js/upload.js') }}"></script>
 
  {{-- Socket.io --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.min.js"></script>
  <!-- summernote -->
  <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
  
  <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
  @stack('scripts')
  <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
  <script>
    $('#summernote').summernote()
    $('#example1').DataTable({"pageLength": 3,"bDestroy": true});
    $("#example1_length").replaceWith($(".btn-add"));
    $('#lfm').filemanager('image');
  </script>
  @stack('chatbox')
  <script src="{{ asset('jquery.pjax.js') }}"></script>
  <script src="{{ asset('pjax.js') }}"></script>
  
</body>
</html>