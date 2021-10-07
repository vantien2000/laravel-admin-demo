@extends('layout.dashboard')
@section('section')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="page">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users Manage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ asset('/') }}">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <a data-pjax href="{{ url('add-user') }}" class="btn btn-success btn-lm btn-add">Add New</a>

                  
                <thead>
                <tr>
                  <th>User name</th>
                  <th>Email</th>
                  <th>Avatar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}
                    </td>
                    <td><img class="thumbnail" width="30" src="admin/dist/img/{{ $user->avatar }}" alt=""></td>
                    <td><a data-pjax href="{{ url('users/'.$user->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                      <a href="" data-id="{{ $user->id }}" id="sbm" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

              {{ $users->links("pagination::bootstrap-4") }}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop

