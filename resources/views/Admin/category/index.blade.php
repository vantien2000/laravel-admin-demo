@extends('Admin.layout.dashboard')
@section('section')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="page">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category Manage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Home</a></li>
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
                
                    <a data-pjax href="{{ url('admin/add-category') }}" class="btn btn-success btn-lm btn-add">Add New</a>
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $cat)
                      <tr>
                        <td>{{ $cat->name }}</td>
                        <td><img class="thumbnail" height="30" src="{{ asset('UI/assets/images/demos/demo-4/cats/'.$cat->image) }}" alt=""></td>
                        <td><a data-pjax href="{{ url('admin/categories/'.$cat->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                          <a href="{{ url('admin/delete-category/'.$cat->id) }}" data-id="{{ $cat->id }}" id="sbm" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
    
                  {{-- {{ $categories->links("pagination::bootstrap-4") }} --}}
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

