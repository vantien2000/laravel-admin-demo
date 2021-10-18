@extends('Admin.layout.dashboard')
@section('section')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="page">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Slides Manage</h1>
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
                <a data-pjax href="{{ url('admin/add-slide') }}" class="btn btn-success btn-lm btn-add">Add New</a>
                <thead>
                <tr>
                  <th>Sub Title</th>
                  <th>Title</th>
                  <th>Background</th>
                  <th>Old Price</th>
                  <th>New Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($slides as $slide)
                  <tr>
                    <td>{{ $slide->subtitle }}</td>
                    <td>{{ $slide->title }}
                    </td>
                    <td><img class="thumbnail" height="30" src="{{ asset('UI/assets/images/demos/demo-4/slider/'.$slide->background) }}" alt=""></td>
                    <td>${{ $slide->old_price }}</td>
                    <td>${{ $slide->new_price }}</td>
                    <td><a data-pjax href="{{ url('admin/slides/'.$slide->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                      <a href="{{ url('admin/delete-slide/'.$slide->id) }}" class="btn btn-danger btn-delete btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

              {{-- {{ $slides->links("pagination::bootstrap-4") }} --}}
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